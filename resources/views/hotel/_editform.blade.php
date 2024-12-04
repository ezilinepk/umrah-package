<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="form-group">
    <div class="row">
        <!-- Hotel Name -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_name">Hotel Name <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('hotel_name') is-invalid state-invalid @enderror" name="hotel_name" id="hotel_name" placeholder="Enter Hotel Name..." value="{{ old('hotel_name', $hotel->hotel_name) }}" required>
            <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel City -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_city">Hotel City <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('hotel_city') is-invalid state-invalid @enderror" name="hotel_city" id="hotel_city" placeholder="Enter Hotel City..." value="{{ old('hotel_city', $hotel->hotel_city) }}" required>
            <div id="validationServerHotelCityFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel Google Maps Link -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_google_map">Hotel Google Maps Link</label>
            <input type="url" class="form-control @error('hotel_google_map') is-invalid state-invalid @enderror" name="hotel_google_map" id="hotel_google_map" placeholder="Enter Google Maps Link..." value="{{ old('hotel_google_map', $hotel->hotel_google_map) }}">
            <div id="validationServerHotelGoogleMapFeedback" class="invalid-feedback">Please enter a valid URL.</div>
            @error('hotel_google_map')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <!-- Hotel Star Rating -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_star">Hotel Star Rating <b class="text-danger">*</b></label>
            <select class="form-control @error('hotel_star') is-invalid state-invalid @enderror" name="hotel_star" id="hotel_star" required>
                <option value="" disabled>Select Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ (old('hotel_star', $hotel->hotel_star) == $i) ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            <div id="validationServerHotelStarFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_star')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel Distance -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_distance">Hotel Distance (in km) <b class="text-danger">*</b></label>
            <input type="number" step="0.1" class="form-control @error('hotel_distance') is-invalid state-invalid @enderror" name="hotel_distance" id="hotel_distance" placeholder="Enter Distance..." value="{{ old('hotel_distance', $hotel->hotel_distance) }}" required>
            <div id="validationServerHotelDistanceFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_distance')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel Picture -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_picture">Hotel Picture</label>
            <input type="file" class="form-control @error('hotel_picture') is-invalid state-invalid @enderror" name="hotel_picture" id="hotel_picture" accept="image/*">
            <div id="validationServerHotelPictureFeedback" class="invalid-feedback">Please upload a valid image.</div>
            @error('hotel_picture')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-3">
    <label class="form-label" for="address">Address <b class="text-danger">*</b></label>
    <input type="text" class="form-control @error('address') is-invalid state-invalid @enderror" name="address[]" id="addresses" placeholder="Enter Address..." required value="{{ old('addresses', $hotel->addresses) }}">
    <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


</div>



<div class="row mb-12">
    <div class="col-md-6">
                <label class="form-label" for="room_price_quad">Quad Room Price <b class="text-danger">*</b></label>
                <div class="input-group mb-2">
                        <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quad" id="autofill_quad" name="autofill_quad" {{ old('autofill_quad', $hotel->autofill_quad) ? 'checked' : '' }}>
                            <label class="form-check-label" for="autofill_quad">Autofill</label>
                        </div>
                </div>
                <div class="input-group">
                    <label class="form-label"></label>
                    <select class="form-select mb-3 month-selector" id="monthSelectorQuad" name="room_price_quad">
                        <option value="" disabled>Select Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}"
                                {{ old('room_price_quad', $hotel->room_price_quad) == $month ? 'selected' : '' }}>
                                {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div id="calendarDaysQuad"></div>
                <div id="validationServerRoomPriceQuadFeedback" class="invalid-feedback">This Field is Required.</div>
                @error('room_price_quad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="room_price_double">Double Room Price <b class="text-danger">*</b></label>
                <div class="input-group mb-2">
                    <div style="margin-left: 20px">
                    <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_double" id="autofill_double">
                    <label class="form-check-label" for="autofill_double">Autofill</label>
                    </div>
                </div>
                <div class="input-group">
                    <select class="form-select mb-3 month-selector" id="monthSelectorDouble" name="room_price_double">
                        <option value="" disabled>Select Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}"
                                {{ old('room_price_double', $hotel->room_price_double) == $month ? 'selected' : '' }}>
                                {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div id="calendarDaysDouble"></div>
                <div id="validationServerRoomPriceDoubleFeedback" class="invalid-feedback">This Field is Required.</div>
                @error('room_price_double')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    </div>



    <div class="row mb-12">
        <div class="col-md-6">
            <label class="form-label" for="room_price_sharing">
                Sharing Room Price <b class="text-danger">*</b>
            </label>
            <div class="input-group mb-2">
                <div style="margin-left: 20px">
                    <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_sharing" id="autofill_sharing">
                    <label class="form-check-label" for="autofill_sharing">Autofill</label>
                </div>
            </div>
            <div class="input-group">

                <select class="form-select mb-3 month-selector" id="monthSelectorSharing" name="room_price_sharing">
                    <option value="" disabled>Select Month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}"
                            {{ old('room_price_sharing', $hotel->room_price_sharing) == $month ? 'selected' : '' }}>
                            {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="calendarDaysSharing"></div>
            <div id="validationServerRoomPriceSharingFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('room_price_sharing')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-md-6">
            <label class="form-label" for="room_price_triple">
                Triple Room Price <b class="text-danger">*</b>
            </label>
            <div class="input-group mb-2">
                <div style="margin-left: 20px">
                    <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_triple" id="autofill_triple">
                    <label class="form-check-label" for="autofill_triple">Autofill</label>
                </div>
            </div>
            <div class="input-group">

                <select class="form-select mb-3 month-selector" id="monthSelectorTriple" name="room_price_triple">
                    <option value="" disabled>Select Month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}"
                            {{ old('room_price_triple', $hotel->room_price_triple) == $month ? 'selected' : '' }}>
                            {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="validationServerRoomPriceTripleFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('room_price_triple')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Move this inside the col-md-6 -->
            <div id="calendarDaysTriple" class="form-row mb-3"></div>
        </div>
    </div>







    <div class="col-md-6">
        <label class="form-label" for="room_price_quint">
            Quint Room Price <b class="text-danger">*</b>
        </label>
        <div class="input-group mb-2">
            <div style="margin-left: 20px">
            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quint" id="autofill_quint">
            <label class="form-check-label ms-2" for="autofill_quint">Autofill</label>
            </div>
        </div>
        <div class="input-group">

            <select class="form-select mb-3 month-selector" id="monthSelectorQuint" name="room_price_quint">
                <option value="" disabled>Select Month</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}"
                        {{ old('room_price_quint', $hotel->room_price_quint) == $month ? 'selected' : '' }}>
                        {{ date("F", mktime(0, 0, 0, $month, 1)) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div id="calendarDaysquint"></div>
        <div id="validationServerRoomPricequintFeedback" class="invalid-feedback">
            This Field is Required.
        </div>
        @error('room_price_quint')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>





</div>

<div class="form-row mb-3">


    <div class="col-md-9">

        <div id="calendarDays"></div>
        <div class="calendar-input calendar-days"></div>

        {{-- <button class="btn btn-sm btn-primary" id="addcalenderButton" type="button">
            <i class="fa fa-plus"></i>
        </button> --}}
    </div>



    <div class="form-group col-md-1 col-sm-6 col-12 d-flex align-items-end">
        {{-- <button class="btn btn-sm btn-primary" id="addRowButton" type="button">
            <i class="fa fa-plus"></i>
        </button> --}}
    </div>
</div>

<div id="additionalRowsContainer"></div>
<div id="additionalRowsCalender"></div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function() {
    // Trigger the change event on page load for the pre-selected month
    const selectedMonth = $('#monthSelectorQuad').val();
    if (selectedMonth) {
        $('#monthSelectorQuad').trigger('change');
    }
});

$('#monthSelectorQuad').on('change', function() {
    var roomPriceQuadData = @json($roomPriceQuad);
    console.log("Room Price Data:", roomPriceQuadData); // Check the entire data structure

    const month = parseInt(this.value) - 1; // Adjust for 0-based month indexing (January is 0, December is 11)
    console.log("Selected Month:", month); // Debugging

    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month
    let daysHTML = '';
    const monthData = roomPriceQuadData[month + 1] || {}; // Get data for the selected month

    console.log("Month Data:", monthData); // Debugging: Check if we got the correct data for the selected month

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day); // 0-based month
        const weekday = date.toLocaleString('default', { weekday: 'long' });
        const price = monthData[day] || ''; // Get price for the day, default to empty if not available

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_quad[${month + 1}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quad" name="room_price_quad[${month + 1}][${day}]"
                    id="room_price_quad[${month + 1}][${day}]" placeholder="Enter price for ${weekday}"
                    value="${price}">
            </div>
        `;
    }

    console.log("Generated Days HTML:", daysHTML);
    $('#calendarDaysQuad').html(`<div class="row">${daysHTML}</div>`);
});

$(document).ready(function() {
    const selectedMonth = $('#monthSelectorDouble').val();
if (selectedMonth && selectedMonth != "0") {
    $('#monthSelectorDouble').trigger('change');
} else {
    console.error("Invalid or no month selected");
}

});

$('#monthSelectorDouble').on('change', function() {
    var roomPriceDouble = @json($roomPriceDouble);
    console.log("Room Price Data:", roomPriceDouble); // Check the entire data structure

    const month = parseInt(this.value) - 1; // Adjust for 0-based month indexing (January is 0, December is 11)
    console.log("Selected Month:", month); // Debugging

    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month
    let daysHTML = '';
    const monthData = roomPriceDouble[month + 1] || {}; // Get data for the selected month

    console.log("Month Data:", monthData); // Debugging: Check if we got the correct data for the selected month

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day); // 0-based month
        const weekday = date.toLocaleString('default', { weekday: 'long' });
        const price = monthData[day] || ''; // Get price for the day, default to empty if not available

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_double[${month + 1}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quad" name="room_price_double[${month + 1}][${day}]"
                    id="room_price_double[${month + 1}][${day}]" placeholder="Enter price for ${weekday}"
                    value="${price}">
            </div>
        `;
    }

    console.log("Generated Days HTML:", daysHTML);
$('#calendarDaysDouble').html(`<div class="row">${daysHTML}</div>`);

});


$(document).ready(function() {
    // Trigger the change event on page load for the pre-selected month
    const selectedMonth = $('#monthSelectorSharing').val();
    if (selectedMonth) {
        $('#monthSelectorSharing').trigger('change');
    }
});

$('#monthSelectorSharing').on('change', function() {
    var roomPriceQuadData = @json($roomPriceQuad);
    console.log("Room Price Data:", roomPriceQuadData); // Check the entire data structure

    const month = parseInt(this.value) - 1; // Adjust for 0-based month indexing (January is 0, December is 11)
    console.log("Selected Month:", month); // Debugging

    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month
    let daysHTML = '';
    const monthData = roomPriceQuadData[month + 1] || {}; // Get data for the selected month

    console.log("Month Data:", monthData); // Debugging: Check if we got the correct data for the selected month

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day); // 0-based month
        const weekday = date.toLocaleString('default', { weekday: 'long' });
        const price = monthData[day] || ''; // Get price for the day, default to empty if not available

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_sharing[${month + 1}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quad" name="room_price_sharing[${month + 1}][${day}]"
                    id="room_price_sharing[${month + 1}][${day}]" placeholder="Enter price for ${weekday}"
                    value="${price}">
            </div>
        `;
    }

    console.log("Generated Days HTML:", daysHTML);
    $('#calendarDaysSharing').html(`<div class="row">${daysHTML}</div>`);
});







$(document).ready(function() {
    // Trigger the change event on page load for the pre-selected month
    const selectedMonth = $('#monthSelectorTriple').val();
    if (selectedMonth) {
        $('#monthSelectorTriple').trigger('change');
    }
});

$('#monthSelectorTriple').on('change', function() {
    var roomPriceTripleData = @json($roomPriceTriple);
    console.log("Room Price Data:", roomPriceTripleData); // Check the entire data structure

    const month = parseInt(this.value) - 1; // Adjust for 0-based month indexing (January is 0, December is 11)
    console.log("Selected Month:", month); // Debugging

    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month
    let daysHTML = '';
    const monthData = roomPriceTripleData[month + 1] || {}; // Get data for the selected month

    console.log("Month Data:", monthData); // Debugging: Check if we got the correct data for the selected month

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day); // 0-based month
        const weekday = date.toLocaleString('default', { weekday: 'long' });
        const price = monthData[day] || ''; // Get price for the day, default to empty if not available

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_triple[${month + 1}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quad" name="room_price_triple[${month + 1}][${day}]"
                    id="room_price_triple[${month + 1}][${day}]" placeholder="Enter price for ${weekday}"
                    value="${price}">
            </div>
        `;
    }

    console.log("Generated Days HTML:", daysHTML);
    $('#calendarDaysTriple').html(`<div class="row">${daysHTML}</div>`);
});





$(document).ready(function() {
    // Trigger the change event on page load for the pre-selected month
    const selectedMonth = $('#monthSelectorQuint').val();
    if (selectedMonth) {
        $('#monthSelectorQuint').trigger('change');
    }
});

$('#monthSelectorQuint').on('change', function() {
    var roomPriceQuintData = @json($roomPriceQuint);
    console.log("Room Price Data:", roomPriceQuintData); // Check the entire data structure

    const month = parseInt(this.value) - 1; // Adjust for 0-based month indexing (January is 0, December is 11)
    console.log("Selected Month:", month); // Debugging

    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in the month
    let daysHTML = '';
    const monthData = roomPriceQuintData[month + 1] || {}; // Get data for the selected month

    console.log("Month Data:", monthData); // Debugging: Check if we got the correct data for the selected month

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day); // 0-based month
        const weekday = date.toLocaleString('default', { weekday: 'long' });
        const price = monthData[day] || ''; // Get price for the day, default to empty if not available

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_quint[${month + 1}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quad" name="room_price_quint[${month + 1}][${day}]"
                    id="room_price_quint[${month + 1}][${day}]" placeholder="Enter price for ${weekday}"
                    value="${price}">
            </div>
        `;
    }

    console.log("Generated Days HTML:", daysHTML);
    $('#calendarDaysQuint').html(`<div class="row">${daysHTML}</div>`);
});























$(document).ready(function() {



    // Check if #room_price_sharing and #calendarDaysSharing elements exist
    if ($('#room_price_sharing').length === 0 || $('#calendarDaysSharing').length === 0) {
        console.error('Required elements not found in the DOM.');
        return;
    }

    // Handle month selection and generate calendar days
    $('#room_price_sharing').on('change', function() {
        const month = this.value;
        if (!month) {
            console.error('Invalid month value selected.');
            return;
        }

        const year = new Date().getFullYear();
        const daysInMonth = new Date(year, month, 0).getDate();
        let daysHTML = '';

        // Loop through the days of the month and get the prices for each day
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month - 1, day);
            const weekday = date.toLocaleString('default', { weekday: 'long' });

            // Fetch the price for the current day, if available
            const price = $roomPriceSharing && $roomPriceSharing[month] ? $roomPriceSharing[month][day] : '';

            // Append the input fields for each day
            daysHTML += `
                <div class="col-md-2 mb-2">
                    <label for="room_price_sharing[${month}][${day}]">${weekday} - ${day}</label>
                    <input type="text" class="form-control day-input" name="room_price_sharing[${month}][${day}]"
                        id="room_price_sharing[${month}][${day}]" placeholder="Enter price for ${weekday}"
                        value="${price}">
                </div>
            `;
        }

        // Ensure the calendar container is updated
        $('#calendarDaysSharing').html(`<div class="row day-inputs">${daysHTML}</div>`);
    });
});



$('#autofill_sharing').on('change', function() {
    const dayInputs = $('.day-input');
    if (this.checked) {
        const firstDayValue = dayInputs.first().val();
        dayInputs.each(function() {
            $(this).val(firstDayValue);
        });
    } else {
        dayInputs.each(function() {
            $(this).val('');
        });
    }
});



$('#autofill_sharing').on('change', function() {
const dayInputs = $('.day-input');
if (this.checked) {
const firstDayValue = dayInputs.first().val();
dayInputs.each(function() {
    $(this).val(firstDayValue);
});
} else {
dayInputs.each(function() {
    $(this).val('');
});
}
});

$('#room_price_triple').on('change', function() {
const month = this.value;
const year = new Date().getFullYear();
const daysInMonth = new Date(year, month, 0).getDate();
let daysHTML = '';

for (let day = 1; day <= daysInMonth; day++) {
const date = new Date(year, month - 1, day);
const weekday = date.toLocaleString('default', { weekday: 'long' });

daysHTML += `
    <div class="col-md-2 mb-2">
        <label for="room_price_triple[${month}][${day}]">${weekday} - ${day}</label>
        <input type="text" class="form-control day-input-triple" name="room_price_triple[${month}][${day}]"
               id="room_price_triple[${month}][${day}]" placeholder="Enter price for ${weekday}">
    </div>
`;
}

$('#calendarDaysTriple').html(`<div class="row day-inputs">${daysHTML}</div>`);
});

$('#autofill_triple').on('change', function() {
const dayInputsTriple = $('.day-input-triple');
if (this.checked) {
const firstDayValue = dayInputsTriple.first().val();
dayInputsTriple.each(function() {
    $(this).val(firstDayValue);
});
} else {
dayInputsTriple.each(function() {
    $(this).val('');
});
}
});





    $('#autofill_quad').on('change', function() {
const dayInputsTriple = $('.day-input-quad');
if (this.checked) {
const firstDayValue = dayInputsTriple.first().val();
dayInputsTriple.each(function() {
    $(this).val(firstDayValue);
});
} else {
dayInputsTriple.each(function() {
    $(this).val('');
});
}
});

$('#autofill_double').on('change', function() {
const dayInputsTriple = $('.day-input-double');
if (this.checked) {
const firstDayValue = dayInputsTriple.first().val();
dayInputsTriple.each(function() {
    $(this).val(firstDayValue);
});
} else {
dayInputsTriple.each(function() {
    $(this).val('');
});
}
});
;

$('#monthSelectorquint').on('change', function() {
    const month = this.value;
    const year = new Date().getFullYear();
    const daysInMonth = new Date(year, month, 0).getDate();
    let daysHTML = '';

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month - 1, day);
        const weekday = date.toLocaleString('default', { weekday: 'long' });

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="room_price_quint[${month}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input-quint" name="room_price_quint[${month}][${day}]"
                    id="room_price_quint[${month}][${day}]" placeholder="Enter price for ${weekday}">
            </div>
        `;
    }

    $('#calendarDaysquint').html(`<div class="row day-inputs">${daysHTML}</div>`);
});

$('#autofill_quint').on('change', function() {
    const dayInputsQuint = $('.day-input-quint');
    if (this.checked) {
        const firstDayValue = dayInputsQuint.first().val();
        dayInputsQuint.each(function() {
            $(this).val(firstDayValue);
        });
    } else {
        dayInputsQuint.each(function() {
            $(this).val('');
        });
    }
});





</script>
