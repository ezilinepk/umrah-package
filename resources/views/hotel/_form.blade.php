<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                            <label class="form-label" for="room_price_quad">Quad Room Price <b class="text-danger">*</b></label>
                            <div class="input-group mb-2">
                                    <div style="margin-left: 20px">
                                <input type="checkbox" class="form-check-input autofill-checkbox" data-target="room_price_quad" id="autofill_quad">
                                <label class="form-check-label" for="autofill_quad">Autofill</label>
                                    </div>
                            </div>
                            <div class="input-group">
                                <label class="form-label"></label>
                                <select class="form-select mb-3 month-selector" id="monthSelectorQuad">
                                    <option value="" disabled selected>Select Month</option>
                                    @foreach(range(1, 12) as $month)
                                        <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
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
                                <select class="form-select mb-3 month-selector" id="monthSelectorDouble">
                                    <option value="" disabled selected>Select Month</option>
                                    @foreach(range(1, 12) as $month)
                                        <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
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
                            <select class="form-select mb-3 room_price_sharing" id="room_price_sharing">
                                <option value="" disabled selected>Select Month</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="validationServerRoomPriceSharingFeedback" class="invalid-feedback">
                            This Field is Required.
                        </div>
                        @error('room_price_sharing')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Move this inside the col-md-6 -->
                        <div id="calendarDaysSharing" class="form-row mb-3"></div>
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
                            <select class="form-select mb-3" id="room_price_triple">
                                <option value="" disabled selected>Select Month</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
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
                        <select class="form-select mb-3 month-selector" id="monthSelectorquint">
                            <option value="" disabled selected>Select Month</option>
                            @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
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
    $('#room_price_sharing').on('change', function() {
        const month = this.value;
        const year = new Date().getFullYear();
        const daysInMonth = new Date(year, month, 0).getDate();
        let daysHTML = '';

        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month - 1, day);
            const weekday = date.toLocaleString('default', { weekday: 'long' });

            daysHTML += `
                <div class="col-md-2 mb-2">
                    <label for="room_price_sharing[${month}][${day}]">${weekday} - ${day}</label>
                    <input type="text" class="form-control day-input" name="room_price_sharing[${month}][${day}]"
                           id="room_price_sharing[${month}][${day}]" placeholder="Enter price for ${weekday}">
                </div>
            `;
        }

        $('#calendarDaysSharing').html(`<div class="row day-inputs">${daysHTML}</div>`);
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

                $('#monthSelectorQuad').on('change', function() {
                    const month = this.value;
                    const year = new Date().getFullYear();
                    const daysInMonth = new Date(year, month, 0).getDate();
                    let daysHTML = '';

                    for (let day = 1; day <= daysInMonth; day++) {
                        const date = new Date(year, month - 1, day);
                        const weekday = date.toLocaleString('default', { weekday: 'long' });

                        daysHTML += `
                            <div class="col-md-2 mb-2">
                                <label for="room_price_quad[${month}][${day}]">${weekday} - ${day}</label>
                                <input type="text" class="form-control day-input-quad" name="room_price_quad[${month}][${day}]"
                                    id="room_price_quad[${month}][${day}]" placeholder="Enter price for ${weekday}">
                            </div>
                        `;
                    }

                    $('#calendarDaysQuad').html(`<div class="row">${daysHTML}</div>`);
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


                $('#monthSelectorDouble').on('change', function() {
                    const month = this.value;
                    const year = new Date().getFullYear();
                    const daysInMonth = new Date(year, month, 0).getDate();
                    let daysHTML = '';

                    for (let day = 1; day <= daysInMonth; day++) {
                        const date = new Date(year, month - 1, day);
                        const weekday = date.toLocaleString('default', { weekday: 'long' });

                        daysHTML += `
                            <div class="col-md-2 mb-2">
                                <label for="room_price_double[${month}][${day}]">${weekday} - ${day}</label>
                                <input type="text" class="form-control day-input-double" name="room_price_double[${month}][${day}]"
                                    id="room_price_double[${month}][${day}]" placeholder="Enter price for ${weekday}">
                            </div>
                        `;
                    }

                    $('#calendarDaysDouble').html(`<div class="row">${daysHTML}</div>`);
                });
            })
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






<script>
     $(document).ready(function() {
    function addNewRow() {
        var uniqueSuffix = Date.now();
        var selectedPackage = $('#package_name').val();
        var newRow = `
          <div class="card mb-2" data-row-id="${uniqueSuffix}" id="row-${uniqueSuffix}">
            <div class="card-header">
              <h5 class="card-title">Package Details</h5>
            </div>
            <div class="card-body">



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

              <div class="form-row mt-2">
                <div class="col-md-3">
                  <label class="form-label" for="hotel_distance_${uniqueSuffix}">Hotel Distance (in km) <b class="text-danger">*</b></label>
                  <input type="number" step="0.1" class="form-control" name="hotel_distance[]" id="hotel_distance_${uniqueSuffix}" placeholder="Enter Distance..." required>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="hotel_picture_${uniqueSuffix}">Hotel Main Picture</label>
                  <input type="file" class="form-control" name="hotel_picture_${uniqueSuffix}" id="hotel_picture_${uniqueSuffix}" accept="image/*">
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="hotel_images_${uniqueSuffix}">Additional Pictures</label>
                  <input type="file" class="form-control" name="hotel_images_${uniqueSuffix}[]" id="hotel_images_${uniqueSuffix}" accept="image/*" multiple>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="room_price_sharing_${uniqueSuffix}">Sharing Room Price <b class="text-danger">*</b></label>
                  <input type="number" step="0.01" class="form-control" name="room_price_sharing_${uniqueSuffix}" id="room_price_sharing_${uniqueSuffix}" placeholder="Enter Sharing Room Price..." required>
                </div>
              </div>

              <div class="form-row mt-2">
                <div class="col-md-3">
                  <label class="form-label" for="room_price_quint_${uniqueSuffix}">Quint Room Price <b class="text-danger">*</b></label>
                  <input type="number" step="0.01" class="form-control" name="room_price_quint_${uniqueSuffix}" id="room_price_quint_${uniqueSuffix}" placeholder="Enter Quint Room Price..." required>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="room_price_triple_${uniqueSuffix}">Triple Room Price <b class="text-danger">*</b></label>
                  <input type="number" step="0.01" class="form-control" name="room_price_triple_${uniqueSuffix}" id="room_price_triple_${uniqueSuffix}" placeholder="Enter Triple Room Price..." required>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="room_price_quad_${uniqueSuffix}">Quad Room Price <b class="text-danger">*</b></label>
                  <input type="number" step="0.01" class="form-control" name="room_price_quad_${uniqueSuffix}" id="room_price_quad_${uniqueSuffix}" placeholder="Enter Quad Room Price..." required>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="room_price_double_${uniqueSuffix}">Double Room Price <b class="text-danger">*</b></label>
                  <input type="number" step="0.01" class="form-control" name="room_price_double_${uniqueSuffix}" id="room_price_double_${uniqueSuffix}" placeholder="Enter Double Room Price..." required>
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

        $(`#removeRowButton-${uniqueSuffix}`).on('click', function() {
            $(`#row-${uniqueSuffix}`).remove();
        });
    }

    $('#addRowButton').click(function(e) {
        e.preventDefault();
        addNewRow();
    });

    $('#package_name').change(function() {
        var selectedValue = $(this).val();
        $('#additionalRowsContainer .card select[name="package_name[]"]').each(function() {
            $(this).val(selectedValue);
        });
    });

    $('#additionalRowsContainer').on('click', '.removeRowButton', function() {
        $(this).closest('.card').remove();
    });
});



</script>
