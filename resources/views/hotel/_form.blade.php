<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">Hotel Packages</h5>
        </div>

        <div class="card-body">
            <div class="form-row mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="package_name">Packages <b class="text-danger">*</b></label>
                    <select class="form-control @error('package_name') is-invalid state-invalid @enderror" name="package_name[]" id="package_name" required>
                        <option value="" selected disabled>Select Package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>
                    <div id="validationServerHotelPackageFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('package_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

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
                    <label class="form-label" for="hotel_city">Hotel City <b class="text-danger">*</b></label>
                    <input type="text" class="form-control @error('hotel_city') is-invalid state-invalid @enderror" name="hotel_city[]" id="hotel_city" placeholder="Enter Hotel City..." required>
                    <div id="validationServerHotelCityFeedback" class="invalid-feedback">This Field is Required.</div>
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
                    <label class="form-label" for="room_price_sharing">Sharing Room Price <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('room_price_sharing') is-invalid state-invalid @enderror" name="room_price_sharing[]" id="room_price_sharing" placeholder="Enter Sharing Room Price..." required>
                    </div>
                    <div id="validationServerRoomPriceSharingFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('room_price_sharing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="room_price_quint">Quint Room Price <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('room_price_quint') is-invalid state-invalid @enderror" name="room_price_quint[]" id="room_price_quint" placeholder="Enter Quint Room Price..." required>
                    </div>
                    <div id="validationServerRoomPriceQuintFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('room_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="room_price_triple">Triple Room Price <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('room_price_triple') is-invalid state-invalid @enderror" name="room_price_triple[]" id="room_price_triple" placeholder="Enter Triple Room Price..." required>
                    </div>
                    <div id="validationServerRoomPriceTripleFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('room_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="room_price_quad">Quad Room Price <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('room_price_quad') is-invalid state-invalid @enderror" name="room_price_quad[]" id="room_price_quad" placeholder="Enter Quad Room Price..." required>
                    </div>
                    <div id="validationServerRoomPriceQuadFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('room_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="room_price_double">Double Room Price <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('room_price_double') is-invalid state-invalid @enderror" name="room_price_double[]" id="room_price_double" placeholder="Enter Double Room Price..." required>
                    </div>
                    <div id="validationServerRoomPriceDoubleFeedback" class="invalid-feedback">This Field is Required.</div>
                    @error('room_price_double')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div id="additionalRowsContainer"></div>

            <div class="form-group col-md-1 col-sm-6 col-12 d-flex align-items-end">
                <button class="btn btn-sm btn-primary" id="addRowButton" type="button">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                  <div class="form-row mb-3">
                      <div class="col-md-3">
                          <label class="form-label" for="package_name_${uniqueSuffix}">Packages <b class="text-danger">*</b></label>
                          <select class="form-control" name="package_name[]" id="package_name_${uniqueSuffix}" required>
                              <option value="" disabled>Select Package</option>
                              @foreach($packages as $package)
                                  <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">This Field is Required.</div>
                      </div>
                  </div>
                        <div class="form-row mb-3">
                <div class="col-md-3">
                  <label class="form-label" for="hotel_name_${uniqueSuffix}">Hotel Name <b class="text-danger">*</b></label>
                  <input type="text" class="form-control" name="hotel_name[]" id="hotel_name_${uniqueSuffix}" placeholder="Enter Hotel Name..." required>
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="hotel_city_${uniqueSuffix}">Hotel City <b class="text-danger">*</b></label>
                  <input type="text" class="form-control" name="hotel_city[]" id="hotel_city_${uniqueSuffix}" placeholder="Enter Hotel City..." required>
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
