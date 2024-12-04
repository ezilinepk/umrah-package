

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    .calendar-container {
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping */
    overflow-x: auto; /* Enable horizontal scrolling */
    padding: 10px;
    border: 0px solid #ddd;
    border-radius: 5px;
    max-width: 100%; /* Adjust as needed */
}

.calendar-container .col-md-1 {
    flex: 0 0 auto; /* Prevent columns from resizing */
    width: 80px; /* Fixed width for inputs */
    margin-right: 10px; /* Add spacing between inputs */
}

/* Transition effect for smooth resizing */
.day-container .form-control {
    transition: transform 0.4s ease, box-shadow 0.2s ease;
    z-index: 1; /* Ensure it's at the correct stacking level */
}

/* Apply hover effect to the input field only */
.day-container .form-control:hover {
    transform: scale(1.6);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Add shadow effect */
    z-index: 10; /* Bring the hovered input above others */
}



</style>
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">Hotel Packages</h5>
        </div>

        <div class="card-body">


            <!-- Hotel Details Rows -->
            <div class="form-row mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="hotel_name">Hotel Name <b class="text-danger">*</b></label>
                    <input type="text" class="form-control @error('hotel_name') is-invalid state-invalid @enderror" name="hotel_name[]" id="hotel_name" placeholder="Enter Hotel Name..." required>
                    <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('hotel_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_city">Hotel City</label>
                    <select class="form-control @error('hotel_city') is-invalid state-invalid @enderror" name="hotel_city[]" id="hotel_city">
                        <option value="" selected>Select City </option>
                        <option value="makkah">Makkah</option>
                        <option value="madina">Madina</option>
                    </select>
                    @error('hotel_city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-3">
                    <label class="form-label" for="hotel_google_map">Hotel Google Maps Link</label>
                    <input type="url" class="form-control @error('hotel_google_map') is-invalid state-invalid @enderror" name="hotel_google_map[]" id="hotel_google_map" placeholder="Enter Google Maps Link...">
                    <div id="validationServerHotelGoogleMapFeedback" class="invalid-feedback">Please enter a valid URL.</div>
                    @error('hotel_google_map')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_star">Hotel Star Rating <b class="text-danger">*</b></label>
                    <select class="form-control @error('hotel_star') is-invalid state-invalid @enderror" name="hotel_star[]" id="hotel_star" required>
                        <option value="" selected disabled>Select Rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                    <div id="validationServerHotelStarFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('hotel_star')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="hotel_distance">Hotel Distance (in km) <b class="text-danger">*</b></label>
                    <input type="number" step="0.1" class="form-control @error('hotel_distance') is-invalid state-invalid @enderror" name="hotel_distance[]" id="hotel_distance" placeholder="Enter Distance..." required>
                    <div id="validationServerHotelDistanceFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('hotel_distance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_picture">Hotel Main Picture</label>
                    <input type="file" class="form-control @error('hotel_picture') is-invalid state-invalid @enderror" name="hotel_picture[]" id="hotel_picture" accept="image/*">
                    <div id="validationServerHotelPictureFeedback" class="invalid-feedback">Please upload a valid image.</div>
                    @error('hotel_picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_images">Additional Pictures</label>
                    <input type="file" class="form-control @error('hotel_images') is-invalid state-invalid @enderror" name="hotel_images[]" id="hotel_images" accept="image/*" multiple>
                    @error('hotel_images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="address">Address <b class="text-danger">*</b></label>
                    <input type="text" class="form-control @error('address') is-invalid state-invalid @enderror" name="address[]" id="address" placeholder="Enter Address..." required>
                    <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>



            <div class="col-md-4">
                <label class="form-label" for="package_name">Packages <b class="text-danger">*</b></label>
                <div class="input-group">
                    <select class="form-control @error('package_name') is-invalid state-invalid @enderror" name="package_name[]" id="package_name" required>
                        <option value="" selected disabled>Select Package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default bg-white"
                            onclick="window.location.href='{{ route('packag.create') }}'">
                            <i class="fa fa-plus-circle text-primary fa-lg"></i>
                        </button>
                    </span>
                </div>
                <div id="validationServerHotelPackageFeedback" class="invalid-feedback">This Field is Required.</div>
                @error('package_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-12">
                <div class="col-md-6">
                    <label class="form-label" for="monthSelectorMaster">
                        Select Month <b class="text-danger">*</b>
                    </label>
                    <select class="form-select mb-3 month-selector" id="monthSelectorMaster">
                        <option value="" disabled selected>Select Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-2">
                    <div style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quad" id="autofill_quad">
                        <label class="form-check-label" for="autofill_quad">Autofill</label>
                            </div>
                    <label class="form-label">Quad Room Price</label>
                </div>
                <div class="col-md-12">

                    <div id="calendarDaysQuad" class="row  calendar-container overflow-auto"></div>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-2">
                    <div style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_double" id="autofill_double">
                        <label class="form-check-label" for="autofill_double">Autofill</label>
                        </div>
                    <label class="form-label">Double Room Price</label>

                </div>
                <div class="col-md-12">
                    <div id="calendarDaysDouble" class="row calendar-container overflow-auto" ></div>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-2">
                    <div style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_sharing" id="autofill_sharing">
                        <label class="form-check-label" for="autofill_sharing">Autofill</label>
                    </div>
                    <label class="form-label">Sharing Room Price <b class="text-danger">*</b></label>
                </div>
                <div class="col-md-12">
                    <div id="calendarDaysSharing" class="row calendar-container overflow-auto"></div>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-md-2">
                    <div style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_triple" id="autofill_triple">
                        <label class="form-check-label" for="autofill_triple">Autofill</label>
                    </div>
                    <label class="form-label">Triple Room Price <b class="text-danger">*</b></label>
                </div>
                <div class="col-md-12">
                    <div id="calendarDaysTriple" class="row calendar-container overflow-auto"></div>
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-md-2">
                    <div style="margin-left: 20px">
                        <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quint" id="autofill_quint">
                        <label class="form-check-label ms-2" for="autofill_quint">Autofill</label>
                        </div>
                    <label class="form-label">Quint Room Price <b class="text-danger">*</b></label>
                </div>
                <div class="col-md-12">
                    <div id="calendarDaysQuint" class="row calendar-container overflow-auto"></div>
                </div>
            </div>
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



                {{-- <div class="form-group col-md-1 col-sm-6 col-12 d-flex align-items-end" style= "margin-left: 199px">
                    <button class="btn btn-sm btn-primary" id="addRowButton" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                </div> --}}
            </div>

            <div id="additionalRowsContainer"></div>
            <div id="additionalRowsCalender"></div>



        </div>



            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
document.addEventListener("DOMContentLoaded", () => {
    const monthSelectors = document.querySelectorAll(".month-selector");
    const allCalendars = {
        Quad: document.getElementById("calendarDaysQuad"),
        Double: document.getElementById("calendarDaysDouble"),
        Sharing: document.getElementById("calendarDaysSharing"),
        Triple: document.getElementById("calendarDaysTriple"),
        Quint: document.getElementById("calendarDaysQuint"),
    };

    monthSelectors.forEach(selector => {
        selector.addEventListener("change", function () {
            const month = this.value;
            const year = new Date().getFullYear();
            const daysInMonth = new Date(year, month, 0).getDate();

            // Generate days for all room types
            for (const [key, calendar] of Object.entries(allCalendars)) {
                calendar.innerHTML = generateDaysHTML(month, year, daysInMonth, key.toLowerCase());
            }

            // Update all dropdowns
            monthSelectors.forEach(otherSelector => {
                otherSelector.value = month;
            });
        });
    });

    function generateDaysHTML(month, year, daysInMonth, roomType) {
    let daysHTML = `<div class="d-flex flex-wrap align-items-center">`;

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month - 1, day);
        const weekday = date.toLocaleString("default", { weekday: "short" });

        daysHTML += `
<div class="me-1 mb-1 day-container" style="width: 31px;">
    <label for="${roomType}_room_price[${month}][${day}]" class="form-label"> ${day}  ${weekday}</label>
    <input type="text" class="form-control day-input day-input-${roomType} hover-effect"
           name="room_price_${roomType}[${month}][${day}]"
           id="room_price_${roomType}[${month}][${day}]"
           placeholder="Price">
</div>
 `;
    }

    daysHTML += `</div>`;
    return daysHTML;
}



    document.querySelectorAll('.autofill-checkbox').forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const roomType = this.dataset.target.replace("room_price_", ""); // Extract room type
            const inputs = document.querySelectorAll(`.day-input-${roomType}`);
            if (inputs.length > 0) {
                if (this.checked) {
                    const firstDayValue = inputs[0].value || ""; // Get the value of the first day's input
                    inputs.forEach(input => input.value = firstDayValue); // Set all inputs to the first day's value
                } else {
                    inputs.forEach(input => input.value = ""); // Clear all inputs
                }
            }
        });
    });
});

            </script>





<script>
    $(document).ready(function() {
        function addNewRow() {
            var uniqueSuffix = Date.now();
            var selectedPackage = $('#package_name').val();  // Get selected package

            var newRow = `
                <div class="card mb-2" data-row-id="${uniqueSuffix}" id="row-${uniqueSuffix}">
                    <div class="card-header">
                        <h5 class="card-title">Package Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- Hotel Details Rows -->
                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label class="form-label" for="hotel_name_${uniqueSuffix}">Hotel Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="hotel_name[]" id="hotel_name_${uniqueSuffix}" placeholder="Enter Hotel Name..." required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="hotel_city_${uniqueSuffix}">Hotel City</label>
                                <select class="form-control" name="hotel_city[]" id="hotel_city_${uniqueSuffix}">
                                    <option value="" selected>Select City</option>
                                    <option value="makkah">Makkah</option>
                                    <option value="madina">Madina</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="hotel_google_map_${uniqueSuffix}">Hotel Google Maps Link</label>
                                <input type="url" class="form-control" name="hotel_google_map[]" id="hotel_google_map_${uniqueSuffix}" placeholder="Enter Google Maps Link...">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="hotel_star_${uniqueSuffix}">Hotel Star Rating <b class="text-danger">*</b></label>
                                <select class="form-control" name="hotel_star[]" id="hotel_star_${uniqueSuffix}" required>
                                    <option value="" selected disabled>Select Rating</option>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                        </div>

                                                   <div class="form-row mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="hotel_distance_${uniqueSuffix}">Hotel Distance (in km) <b class="text-danger">*</b></label>
                    <input type="number" step="0.1" class="form-control @error('hotel_distance') is-invalid state-invalid @enderror" name="hotel_distance[]" id="hotel_distance_${uniqueSuffix}" placeholder="Enter Distance..." required>
                    <div id="validationServerHotelDistanceFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('hotel_distance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_picture_${uniqueSuffix}">Hotel Main Picture</label>
                    <input type="file" class="form-control @error('hotel_picture') is-invalid state-invalid @enderror" name="hotel_picture[]" id="hotel_picture_${uniqueSuffix}" accept="image/*">
                    <div id="validationServerHotelPictureFeedback" class="invalid-feedback">Please upload a valid image.</div>
                    @error('hotel_picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="hotel_images_${uniqueSuffix}">Additional Pictures</label>
                    <input type="file" class="form-control @error('hotel_images') is-invalid state-invalid @enderror" name="hotel_images[]" id="hotel_images_${uniqueSuffix}" accept="image/*" multiple>
                    @error('hotel_images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="address_${uniqueSuffix}">Address <b class="text-danger">*</b></label>
                    <input type="text" class="form-control @error('address') is-invalid state-invalid @enderror" name="address[]" id="address_${uniqueSuffix}" placeholder="Enter Address..." required>
                    <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>

                        <!-- Package Dropdown (Dynamically Added) -->
                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label class="form-label" for="package_name_${uniqueSuffix}">Package Name <b class="text-danger">*</b></label>
                                <select class="form-control" name="package_name[]" id="package_name_${uniqueSuffix}" required>
                                    <option value="" selected disabled>Select Package</option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

   <div class="row mb-12">
                        <div class="col-md-6">
                            <label class="form-label" for="monthSelector_${uniqueSuffix}">
                                Select Month <b class="text-danger">*</b>
                            </label>
                            <select class="form-select mb-3 month-selector" id="monthSelector_${uniqueSuffix}">
                                <option value="" disabled selected>Select Month</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Calendar Day Sections for Different Room Types -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                        <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quad" id="autofill_quad_${uniqueSuffix}">
                            <label class="form-check-label" for="autofill_quad_${uniqueSuffix}">Autofill</label>
                            <label class="form-label">Quad Room Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="calendarDaysQuad_${uniqueSuffix}" class="row"></div>
                        </div>
                    </div>

                      <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                             <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_double" id="autofill_double_${uniqueSuffix}">
                            <label class="form-check-label" for="autofill_quad_${uniqueSuffix}">Autofill</label>
                            <label class="form-label">Double Room Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="calendarDaysDouble_${uniqueSuffix}" class="row"></div>
                        </div>
                    </div>


                      <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                             <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_triple" id="autofill_triple_${uniqueSuffix}">
                            <label class="form-check-label" for="autofill_quad_${uniqueSuffix}">Autofill</label>
                            <label class="form-label">Triple Room Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="calendarDaysTriple_${uniqueSuffix}" class="row"></div>
                        </div>
                    </div>

                        <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                             <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_sharing" id="autofill_sharing_${uniqueSuffix}">
                            <label class="form-check-label" for="autofill_sharing_${uniqueSuffix}">Autofill</label>
                            <label class="form-label">Sharing Room Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="calendarDaysSharing_${uniqueSuffix}" class="row"></div>
                        </div>
                    </div>

                     <div class="row mb-3 align-items-center">
                        <div class="col-md-2">
                             <div style="margin-left: 20px">
                            <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quint" id="autofill_quint_${uniqueSuffix}">
                            <label class="form-check-label" for="autofill_quint_${uniqueSuffix}">Autofill</label>
                            <label class="form-label">Quint Room Price</label>
                        </div>
                        <div class="col-md-12">
                            <div id="calendarDaysQuint_${uniqueSuffix}" class="row"></div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                    <button class="btn btn-sm btn-danger removeRowButton" id="removeRowButton-${uniqueSuffix}">
                        <i class="fa fa-minus"></i> Remove
                    </button>
                </div>
            </div>
        `;

        $('#additionalRowsContainer').append(newRow);
        attachMonthSelectorEvent(uniqueSuffix); // Attach event listener to the new row's month selector

        $(`#removeRowButton-${uniqueSuffix}`).on('click', function() {
            $(`#row-${uniqueSuffix}`).remove();
        });
    }

    $('#addRowButton').click(function(e) {
        e.preventDefault();
        addNewRow();
    });
});

function attachMonthSelectorEvent(uniqueSuffix) {
    const monthSelector = document.getElementById(`monthSelector_${uniqueSuffix}`);
    const allCalendars = {
        Quad: document.getElementById(`calendarDaysQuad_${uniqueSuffix}`),
        Double: document.getElementById(`calendarDaysDouble_${uniqueSuffix}`),
        Sharing: document.getElementById(`calendarDaysSharing_${uniqueSuffix}`),
        Triple: document.getElementById(`calendarDaysTriple_${uniqueSuffix}`),
        Quint: document.getElementById(`calendarDaysQuint_${uniqueSuffix}`),
    };

    monthSelector.addEventListener("change", function () {
        const month = this.value;
        const year = new Date().getFullYear();
        const daysInMonth = new Date(year, month, 0).getDate();

        // Generate days for all room types
        for (const [key, calendar] of Object.entries(allCalendars)) {
            calendar.innerHTML = generateDaysHTML(month, year, daysInMonth, key.toLowerCase());
        }
    });
}

function generateDaysHTML(month, year, daysInMonth, roomType) {
    let daysHTML = "";

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month - 1, day);
        const weekday = date.toLocaleString("default", { weekday: "long" });

        daysHTML += `
            <div class="col-md-2 mb-2">
                <label for="${roomType}_room_price[${month}][${day}]">${weekday} - ${day}</label>
                <input type="text" class="form-control day-input day-input-${roomType}"
                       name="room_price_${roomType}[${month}][${day}]"
                       id="room_price_${roomType}[${month}][${day}]"
                       placeholder="Enter price for ${weekday}">
            </div>
        `;
    }

    return daysHTML;
}




</script>
<script>
    $(document).on("change", ".autofill-checkbox", function () {
    const roomType = $(this).data("target").replace("room_price_", ""); // Extract room type
    const inputs = $(`.day-input-${roomType}`);
    if (inputs.length > 0) {
        if ($(this).is(":checked")) {
            const firstDayValue = inputs.eq(0).val() || ""; // Get the value of the first day's input
            inputs.val(firstDayValue); // Set all inputs to the first day's value
        } else {
            inputs.val(""); // Clear all inputs
        }
    }
});

</script>
