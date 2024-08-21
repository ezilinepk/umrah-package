<div class="form-group">
    <div class="row">
        <!-- Hotel Name -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_name">Hotel Name <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('hotel_name') is-invalid state-invalid @enderror" name="hotel_name" id="hotel_name" placeholder="Enter Hotel Name..." required>
            <div id="validationServerHotelNameFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel City -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_city">Hotel City <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('hotel_city') is-invalid state-invalid @enderror" name="hotel_city" id="hotel_city" placeholder="Enter Hotel City..." required>
            <div id="validationServerHotelCityFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hotel Google Maps Link -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_google_map">Hotel Google Maps Link</label>
            <input type="url" class="form-control @error('hotel_google_map') is-invalid state-invalid @enderror" name="hotel_google_map" id="hotel_google_map" placeholder="Enter Google Maps Link...">
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
                <option value="" selected disabled >Select Rating</option>
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

        <!-- Hotel Distance -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_distance">Hotel Distance (in km) <b class="text-danger">*</b></label>
            <input type="number" step="0.1" class="form-control @error('hotel_distance') is-invalid state-invalid @enderror" name="hotel_distance" id="hotel_distance" placeholder="Enter Distance..." required>
            <div id="validationServerHotelDistanceFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('hotel_distance')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


</div>
<div class="form-group">
    <div class="row">
        <!-- Hotel Picture (Main Image) -->
        <div class="col-md-4">
            <label class="form-label" for="hotel_picture">Hotel Main Picture</label>
            <input type="file" class="form-control @error('hotel_picture') is-invalid state-invalid @enderror" name="hotel_picture" id="hotel_picture" accept="image/*">
            <div id="validationServerHotelPictureFeedback" class="invalid-feedback">Please upload a valid image.</div>
            @error('hotel_picture')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

<!-- Hotel Additional Pictures (Multiple Images) -->
<div class="col-md-4">
    <label class="form-label" for="hotel_images">Additional Pictures</label>
    <input type="file" class="form-control @error('hotel_images') is-invalid state-invalid @enderror" name="hotel_images[]" id="hotel_images" accept="image/*" multiple>
    @error('hotel_images.*')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <label class="form-label" for="room_price_sharing">Sharing Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_sharing') is-invalid state-invalid @enderror" name="room_price_sharing" id="room_price_sharing" placeholder="Enter Sharing Room Price..." required>
                <select class="form-control @error('room_price_sharing_currency') is-invalid state-invalid @enderror" name="room_price_sharing_currency" id="room_price_sharing_currency" required>
                    <option value="PKR" selected>PKR</option>
                    <option value="PKR">PKR</option>
                </select>
            </div>
            <div id="validationServerRoomPriceSharingFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('room_price_sharing')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">

                <div class="form-group">
                    <div class="row">
                        <!-- Daily Prices Header -->
                        <div class="col-md-12">
                            <label class="form-label">Sharing Prices</label>
                        </div>

                        <!-- Daily Prices Fields -->
                        <div class="col-md-2">
                            <label class="form-label" for="monday_price_sharing">Monday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('monday_price_sharing') is-invalid state-invalid @enderror" name="monday_price_sharing" id="monday_price_sharing" placeholder="Enter Monday Price...">
                                <select class="form-control @error('monday_price_sharing_currency') is-invalid state-invalid @enderror" name="monday_price_sharing_currency" id="monday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('monday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="tuesday_price_sharing">Tuesday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('tuesday_price_sharing') is-invalid state-invalid @enderror" name="tuesday_price_sharing" id="tuesday_price_sharing" placeholder="Enter Tuesday Price...">
                                <select class="form-control @error('tuesday_price_sharing_currency') is-invalid state-invalid @enderror" name="tuesday_price_sharing_currency" id="tuesday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('tuesday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="wednesday_price_sharing">Wednesday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('wednesday_price_sharing') is-invalid state-invalid @enderror" name="wednesday_price_sharing" id="wednesday_price_sharing" placeholder="Enter Wednesday Price...">
                                <select class="form-control @error('wednesday_price_sharing_currency') is-invalid state-invalid @enderror" name="wednesday_price_sharing_currency" id="wednesday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('wednesday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="thursday_price_sharing">Thursday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('thursday_price_sharing') is-invalid state-invalid @enderror" name="thursday_price_sharing" id="thursday_price_sharing" placeholder="Enter Thursday Price...">
                                <select class="form-control @error('thursday_price_sharing_currency') is-invalid state-invalid @enderror" name="thursday_price_sharing_currency" id="thursday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('thursday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="friday_price_sharing">Friday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('friday_price_sharing') is-invalid state-invalid @enderror" name="friday_price_sharing" id="friday_price_sharing" placeholder="Enter Friday Price...">
                                <select class="form-control @error('friday_price_sharing_currency') is-invalid state-invalid @enderror" name="friday_price_sharing_currency" id="friday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('friday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="saturday_price_sharing">Saturday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('saturday_price_sharing') is-invalid state-invalid @enderror" name="saturday_price_sharing" id="saturday_price_sharing" placeholder="Enter Saturday Price...">
                                <select class="form-control @error('saturday_price_sharing_currency') is-invalid state-invalid @enderror" name="saturday_price_sharing_currency" id="saturday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('saturday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="sunday_price_sharing">Sunday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('sunday_price_sharing') is-invalid state-invalid @enderror" name="sunday_price_sharing" id="sunday_price_sharing" placeholder="Enter Sunday Price...">
                                <select class="form-control @error('sunday_price_sharing_currency') is-invalid state-invalid @enderror" name="sunday_price_sharing_currency" id="sunday_price_sharing_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('sunday_price_sharing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <label class="form-label" for="room_price_quint">Quint Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_quint') is-invalid state-invalid @enderror" name="room_price_quint" id="room_price_quint" placeholder="Enter Quint Room Price..." required>
                <select class="form-control @error('room_price_quint_currency') is-invalid state-invalid @enderror" name="room_price_quint_currency" id="room_price_quint_currency" required>
                    <option value="PKR" selected>PKR</option>
                    <option value="PKR">PKR</option>
                </select>
            </div>
            <div id="validationServerRoomPriceQuintFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('room_price_quint')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <!-- Quint Room Price -->

                <!-- Daily Prices Header -->
                <div class="col-md-12 mt-3">
                    <label class="form-label">Quint Room Daily Prices</label>
                </div>

                <!-- Daily Prices Fields -->
                <div class="col-md-2">
                    <label class="form-label" for="monday_price_quint">Monday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('monday_price_quint') is-invalid state-invalid @enderror" name="monday_price_quint" id="monday_price_quint" placeholder="Enter Monday Price...">
                        <select class="form-control @error('monday_price_quint_currency') is-invalid state-invalid @enderror" name="monday_price_quint_currency" id="monday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('monday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="tuesday_price_quint">Tuesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('tuesday_price_quint') is-invalid state-invalid @enderror" name="tuesday_price_quint" id="tuesday_price_quint" placeholder="Enter Tuesday Price...">
                        <select class="form-control @error('tuesday_price_quint_currency') is-invalid state-invalid @enderror" name="tuesday_price_quint_currency" id="tuesday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('tuesday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="wednesday_price_quint">Wednesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('wednesday_price_quint') is-invalid state-invalid @enderror" name="wednesday_price_quint" id="wednesday_price_quint" placeholder="Enter Wednesday Price...">
                        <select class="form-control @error('wednesday_price_quint_currency') is-invalid state-invalid @enderror" name="wednesday_price_quint_currency" id="wednesday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('wednesday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="thursday_price_quint">Thursday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('thursday_price_quint') is-invalid state-invalid @enderror" name="thursday_price_quint" id="thursday_price_quint" placeholder="Enter Thursday Price...">
                        <select class="form-control @error('thursday_price_quint_currency') is-invalid state-invalid @enderror" name="thursday_price_quint_currency" id="thursday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('thursday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="friday_price_quint">Friday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('friday_price_quint') is-invalid state-invalid @enderror" name="friday_price_quint" id="friday_price_quint" placeholder="Enter Friday Price...">
                        <select class="form-control @error('friday_price_quint_currency') is-invalid state-invalid @enderror" name="friday_price_quint_currency" id="friday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('friday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="saturday_price_quint">Saturday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('saturday_price_quint') is-invalid state-invalid @enderror" name="saturday_price_quint" id="saturday_price_quint" placeholder="Enter Saturday Price...">
                        <select class="form-control @error('saturday_price_quint_currency') is-invalid state-invalid @enderror" name="saturday_price_quint_currency" id="saturday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('saturday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="sunday_price_quint">Sunday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('sunday_price_quint') is-invalid state-invalid @enderror" name="sunday_price_quint" id="sunday_price_quint" placeholder="Enter Sunday Price...">
                        <select class="form-control @error('sunday_price_quint_currency') is-invalid state-invalid @enderror" name="sunday_price_quint_currency" id="sunday_price_quint_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('sunday_price_quint')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <div class="col-md-4">
            <label class="form-label" for="room_price_triple">Triple Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_triple') is-invalid state-invalid @enderror" name="room_price_triple" id="room_price_triple" placeholder="Enter Triple Room Price..." required>
                <select class="form-control @error('room_price_triple_currency') is-invalid state-invalid @enderror" name="room_price_triple_currency" id="room_price_triple_currency" required>
                    <option value="PKR" selected>PKR</option>
                    <option value="PKR">PKR</option>
                </select>
            </div>
            <div id="validationServerRoomPriceTripleFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('room_price_triple')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <!-- Triple Room Price -->


                <!-- Daily Prices Header -->
                <div class="col-md-12 mt-3">
                    <label class="form-label">Triple Room Daily Prices</label>
                </div>

                <!-- Daily Prices Fields -->
                <div class="col-md-2">
                    <label class="form-label" for="monday_price_triple">Monday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('monday_price_triple') is-invalid state-invalid @enderror" name="monday_price_triple" id="monday_price_triple" placeholder="Enter Monday Price...">
                        <select class="form-control @error('monday_price_triple_currency') is-invalid state-invalid @enderror" name="monday_price_triple_currency" id="monday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('monday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="tuesday_price_triple">Tuesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('tuesday_price_triple') is-invalid state-invalid @enderror" name="tuesday_price_triple" id="tuesday_price_triple" placeholder="Enter Tuesday Price...">
                        <select class="form-control @error('tuesday_price_triple_currency') is-invalid state-invalid @enderror" name="tuesday_price_triple_currency" id="tuesday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('tuesday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="wednesday_price_triple">Wednesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('wednesday_price_triple') is-invalid state-invalid @enderror" name="wednesday_price_triple" id="wednesday_price_triple" placeholder="Enter Wednesday Price...">
                        <select class="form-control @error('wednesday_price_triple_currency') is-invalid state-invalid @enderror" name="wednesday_price_triple_currency" id="wednesday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('wednesday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="thursday_price_triple">Thursday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('thursday_price_triple') is-invalid state-invalid @enderror" name="thursday_price_triple" id="thursday_price_triple" placeholder="Enter Thursday Price...">
                        <select class="form-control @error('thursday_price_triple_currency') is-invalid state-invalid @enderror" name="thursday_price_triple_currency" id="thursday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('thursday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="friday_price_triple">Friday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('friday_price_triple') is-invalid state-invalid @enderror" name="friday_price_triple" id="friday_price_triple" placeholder="Enter Friday Price...">
                        <select class="form-control @error('friday_price_triple_currency') is-invalid state-invalid @enderror" name="friday_price_triple_currency" id="friday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('friday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="saturday_price_triple">Saturday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('saturday_price_triple') is-invalid state-invalid @enderror" name="saturday_price_triple" id="saturday_price_triple" placeholder="Enter Saturday Price...">
                        <select class="form-control @error('saturday_price_triple_currency') is-invalid state-invalid @enderror" name="saturday_price_triple_currency" id="saturday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('saturday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="sunday_price_triple">Sunday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('sunday_price_triple') is-invalid state-invalid @enderror" name="sunday_price_triple" id="sunday_price_triple" placeholder="Enter Sunday Price...">
                        <select class="form-control @error('sunday_price_triple_currency') is-invalid state-invalid @enderror" name="sunday_price_triple_currency" id="sunday_price_triple_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('sunday_price_triple')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-md-4">
            <label class="form-label" for="room_price_quad">Quad Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_quad') is-invalid state-invalid @enderror" name="room_price_quad" id="room_price_quad" placeholder="Enter Quad Room Price..." required>
                <select class="form-control @error('room_price_quad_currency') is-invalid state-invalid @enderror" name="room_price_quad_currency" id="room_price_quad_currency" required>
                    <option value="PKR" selected>PKR</option>
                    <option value="PKR">PKR</option>
                </select>
            </div>
            <div id="validationServerRoomPriceQuadFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('room_price_quad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <!-- Weekly Prices Header -->
                <div class="col-md-12">
                    <label class="form-label">Quad Room Weekly Prices</label>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="monday_price_quad">Monday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('monday_price_quad') is-invalid state-invalid @enderror" name="monday_price_quad" id="monday_price_quad" placeholder="Enter Monday Price...">
                        <select class="form-control @error('monday_price_quad_currency') is-invalid state-invalid @enderror" name="monday_price_quad_currency" id="monday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('monday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="tuesday_price_quad">Tuesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('tuesday_price_quad') is-invalid state-invalid @enderror" name="tuesday_price_quad" id="tuesday_price_quad" placeholder="Enter Tuesday Price...">
                        <select class="form-control @error('tuesday_price_quad_currency') is-invalid state-invalid @enderror" name="tuesday_price_quad_currency" id="tuesday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('tuesday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="wednesday_price_quad">Wednesday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('wednesday_price_quad') is-invalid state-invalid @enderror" name="wednesday_price_quad" id="wednesday_price_quad" placeholder="Enter Wednesday Price...">
                        <select class="form-control @error('wednesday_price_quad_currency') is-invalid state-invalid @enderror" name="wednesday_price_quad_currency" id="wednesday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('wednesday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="thursday_price_quad">Thursday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('thursday_price_quad') is-invalid state-invalid @enderror" name="thursday_price_quad" id="thursday_price_quad" placeholder="Enter Thursday Price...">
                        <select class="form-control @error('thursday_price_quad_currency') is-invalid state-invalid @enderror" name="thursday_price_quad_currency" id="thursday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('thursday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="friday_price_quad">Friday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('friday_price_quad') is-invalid state-invalid @enderror" name="friday_price_quad" id="friday_price_quad" placeholder="Enter Friday Price...">
                        <select class="form-control @error('friday_price_quad_currency') is-invalid state-invalid @enderror" name="friday_price_quad_currency" id="friday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('friday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="saturday_price_quad">Saturday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('saturday_price_quad') is-invalid state-invalid @enderror" name="saturday_price_quad" id="saturday_price_quad" placeholder="Enter Saturday Price...">
                        <select class="form-control @error('saturday_price_quad_currency') is-invalid state-invalid @enderror" name="saturday_price_quad_currency" id="saturday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('saturday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="sunday_price_quad">Sunday Price</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control @error('sunday_price_quad') is-invalid state-invalid @enderror" name="sunday_price_quad" id="sunday_price_quad" placeholder="Enter Sunday Price...">
                        <select class="form-control @error('sunday_price_quad_currency') is-invalid state-invalid @enderror" name="sunday_price_quad_currency" id="sunday_price_quad_currency">
                            <option value="PKR" selected>PKR</option>
                            <option value="PKR">PKR</option>
                        </select>
                    </div>
                    @error('sunday_price_quad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>




        <div class="card">
            <div class="card-header">
                    <div class="col-md-6">
                        <label class="form-label" for="room_price_double">Double Room Price <b class="text-danger">*</b></label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control @error('room_price_double') is-invalid state-invalid @enderror" name="room_price_double" id="room_price_double" placeholder="Enter Double Room Price..." required>
                            <select class="form-control @error('room_price_double_currency') is-invalid state-invalid @enderror" name="room_price_double_currency" id="room_price_double_currency" required>
                                <option value="PKR" selected>PKR</option>
                                <option value="PKR">PKR</option>
                            </select>
                        </div>
                        <div id="validationServerRoomPriceDoubleFeedback" class="invalid-feedback">This Field is Required.</div>
                        @error('room_price_double')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <!-- Weekly Prices Header -->
                        <div class="col-md-12">
                            <label class="form-label">Quad Room Weekly Prices</label>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="monday_price_double">Monday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('monday_price_double') is-invalid state-invalid @enderror" name="monday_price_double" id="monday_price_double" placeholder="Enter Monday Price...">
                                <select class="form-control @error('monday_price_double_currency') is-invalid state-invalid @enderror" name="monday_price_double_currency" id="monday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('monday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="tuesday_price_double">Tuesday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('tuesday_price_double') is-invalid state-invalid @enderror" name="tuesday_price_double" id="tuesday_price_double" placeholder="Enter Tuesday Price...">
                                <select class="form-control @error('tuesday_price_double_currency') is-invalid state-invalid @enderror" name="tuesday_price_double_currency" id="tuesday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('tuesday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="wednesday_price_double">Wednesday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('wednesday_price_double') is-invalid state-invalid @enderror" name="wednesday_price_double" id="wednesday_price_double" placeholder="Enter Wednesday Price...">
                                <select class="form-control @error('wednesday_price_double_currency') is-invalid state-invalid @enderror" name="wednesday_price_double_currency" id="wednesday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('wednesday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="thursday_price_double">Thursday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('thursday_price_double') is-invalid state-invalid @enderror" name="thursday_price_double" id="thursday_price_double" placeholder="Enter Thursday Price...">
                                <select class="form-control @error('thursday_price_double_currency') is-invalid state-invalid @enderror" name="thursday_price_double_currency" id="thursday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('thursday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="friday_price_double">Friday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('friday_price_double') is-invalid state-invalid @enderror" name="friday_price_double" id="friday_price_double" placeholder="Enter Friday Price...">
                                <select class="form-control @error('friday_price_double_currency') is-invalid state-invalid @enderror" name="friday_price_double_currency" id="friday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('friday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="saturday_price_double">Saturday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('saturday_price_double') is-invalid state-invalid @enderror" name="saturday_price_double" id="saturday_price_double" placeholder="Enter Saturday Price...">
                                <select class="form-control @error('saturday_price_double_currency') is-invalid state-invalid @enderror" name="saturday_price_double_currency" id="saturday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('saturday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label class="form-label" for="sunday_price_double">Sunday Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error('sunday_price_double') is-invalid state-invalid @enderror" name="sunday_price_double" id="sunday_price_double" placeholder="Enter Sunday Price...">
                                <select class="form-control @error('sunday_price_double_currency') is-invalid state-invalid @enderror" name="sunday_price_double_currency" id="sunday_price_double_currency">
                                    <option value="PKR" selected>PKR</option>
                                    <option value="PKR">PKR</option>
                                </select>
                            </div>
                            @error('sunday_price_double')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-left: 40px">
            <div class="col-md-4">
                <label class="form-label" for="hotel_room_detail">Hotel Room Detail <b class="text-danger">*</b></label>
                <textarea class="form-control @error('hotel_room_detail') is-invalid state-invalid @enderror" name="hotel_room_details" id="hotel_room_detail" placeholder="Enter Hotel Room Detail..." required></textarea>
                <div id="validationServerHotelRoomDetailFeedback" class="invalid-feedback">This Field is Required.</div>
                @error('hotel_room_detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label" for="hotel_details">Hotel Details <b class="text-danger">*</b></label>
                <textarea class="form-control @error('hotel_details') is-invalid state-invalid @enderror" name="hotel_details" id="hotel_details" placeholder="Enter Hotel Details..." required></textarea>
                <div id="validationServerHotelDetailsFeedback" class="invalid-feedback">This Field is Required.</div>
                @error('hotel_details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roomPriceSharingInput = document.getElementById('room_price_sharing');
        const dailyPriceInputs = {
            monday: document.getElementById('monday_price_sharing'),
            tuesday: document.getElementById('tuesday_price_sharing'),
            wednesday: document.getElementById('wednesday_price_sharing'),
            thursday: document.getElementById('thursday_price_sharing'),
            friday: document.getElementById('friday_price_sharing'),
            saturday: document.getElementById('saturday_price_sharing'),
            sunday: document.getElementById('sunday_price_sharing'),
        };

        roomPriceSharingInput.addEventListener('input', function() {
            const sharingPrice = parseFloat(roomPriceSharingInput.value) || 0;

            for (const day in dailyPriceInputs) {
                dailyPriceInputs[day].value = sharingPrice.toFixed(2);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const roomPriceQuadInput = document.getElementById('room_price_quad');
    const weeklyPriceInputs = {
        monday: document.getElementById('monday_price_quad'),
        tuesday: document.getElementById('tuesday_price_quad'),
        wednesday: document.getElementById('wednesday_price_quad'),
        thursday: document.getElementById('thursday_price_quad'),
        friday: document.getElementById('friday_price_quad'),
        saturday: document.getElementById('saturday_price_quad'),
        sunday: document.getElementById('sunday_price_quad'),
    };

    roomPriceQuadInput.addEventListener('input', function() {
        const quadPrice = parseFloat(roomPriceQuadInput.value) || 0;

        for (const day in weeklyPriceInputs) {
            weeklyPriceInputs[day].value = quadPrice.toFixed(2);
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const roomPriceQuadInput = document.getElementById('room_price_double');
    const weeklyPriceInputs = {
        monday: document.getElementById('monday_price_double'),
        tuesday: document.getElementById('tuesday_price_double'),
        wednesday: document.getElementById('wednesday_price_double'),
        thursday: document.getElementById('thursday_price_double'),
        friday: document.getElementById('friday_price_double'),
        saturday: document.getElementById('saturday_price_double'),
        sunday: document.getElementById('sunday_price_double'),
    };

    roomPriceQuadInput.addEventListener('input', function() {
        const quadPrice = parseFloat(roomPriceQuadInput.value) || 0;

        for (const day in weeklyPriceInputs) {
            weeklyPriceInputs[day].value = quadPrice.toFixed(2);
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const roomPriceQuadInput = document.getElementById('room_price_quint');
    const weeklyPriceInputs = {
        monday: document.getElementById('monday_price_quint'),
        tuesday: document.getElementById('tuesday_price_quint'),
        wednesday: document.getElementById('wednesday_price_quint'),
        thursday: document.getElementById('thursday_price_quint'),
        friday: document.getElementById('friday_price_quint'),
        saturday: document.getElementById('saturday_price_quint'),
        sunday: document.getElementById('sunday_price_quint'),
    };

    roomPriceQuadInput.addEventListener('input', function() {
        const quadPrice = parseFloat(roomPriceQuadInput.value) || 0;

        for (const day in weeklyPriceInputs) {
            weeklyPriceInputs[day].value = quadPrice.toFixed(2);
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const roomPriceQuadInput = document.getElementById('room_price_triple');
    const weeklyPriceInputs = {
        monday: document.getElementById('monday_price_triple'),
        tuesday: document.getElementById('tuesday_price_triple'),
        wednesday: document.getElementById('wednesday_price_triple'),
        thursday: document.getElementById('thursday_price_triple'),
        friday: document.getElementById('friday_price_triple'),
        saturday: document.getElementById('saturday_price_triple'),
        sunday: document.getElementById('sunday_price_triple'),
    };

    roomPriceQuadInput.addEventListener('input', function() {
        const quadPrice = parseFloat(roomPriceQuadInput.value) || 0;

        for (const day in weeklyPriceInputs) {
            weeklyPriceInputs[day].value = quadPrice.toFixed(2);
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const roomPriceQuadInput = document.getElementById('room_price_double');
    const weeklyPriceInputs = {
        monday: document.getElementById('monday_price_double'),
        tuesday: document.getElementById('tuesday_price_double'),
        wednesday: document.getElementById('wednesday_price_double'),
        thursday: document.getElementById('thursday_price_double'),
        friday: document.getElementById('friday_price_double'),
        saturday: document.getElementById('saturday_price_double'),
        sunday: document.getElementById('sunday_price_double'),
    };

    roomPriceQuadInput.addEventListener('input', function() {
        const quadPrice = parseFloat(roomPriceQuadInput.value) || 0;

        for (const day in weeklyPriceInputs) {
            weeklyPriceInputs[day].value = quadPrice.toFixed(2);
        }
    });
});


</script>
