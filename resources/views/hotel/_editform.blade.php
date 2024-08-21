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

<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <label class="form-label" for="room_price_sharing">Sharing Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_sharing') is-invalid state-invalid @enderror" name="room_price_sharing" id="room_price_sharing" placeholder="Enter Sharing Room Price..." value="{{ old('room_price_sharing', $hotel->room_price_sharing) }}" required>
                <select class="form-control @error('room_price_sharing_currency') is-invalid state-invalid @enderror" name="room_price_sharing_currency" id="room_price_sharing_currency" required>
                    <option value="PKR" {{ (old('room_price_sharing_currency', $hotel->room_price_sharing_currency) == 'PKR') ? 'selected' : '' }}>PKR</option>
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
                    @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                        <div class="col-md-2">
                            <label class="form-label" for="{{ $day }}_price_sharing">{{ ucfirst($day) }} Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control @error("{$day}_price_sharing") is-invalid state-invalid @enderror" name="{{ $day }}_price_sharing" id="{{ $day }}_price_sharing" placeholder="Enter {{ ucfirst($day) }} Price..." value="{{ old("{$day}_price_sharing", $hotel->{"{$day}_price_sharing"}) }}">
                                <select class="form-control @error("{$day}_price_sharing_currency") is-invalid state-invalid @enderror" name="{{ $day }}_price_sharing_currency" id="{{ $day }}_price_sharing_currency">
                                    <option value="PKR" {{ (old("{$day}_price_sharing_currency", $hotel->{"{$day}_price_sharing_currency"}) == 'PKR') ? 'selected' : '' }}>PKR</option>
                                </select>
                            </div>
                            @error("{$day}_price_sharing")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
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
                <input type="number" step="0.01" class="form-control @error('room_price_quint') is-invalid state-invalid @enderror" name="room_price_quint" id="room_price_quint" placeholder="Enter Quint Room Price..." value="{{ old('room_price_quint', $hotel->room_price_quint) }}" required>
                <select class="form-control @error('room_price_quint_currency') is-invalid state-invalid @enderror" name="room_price_quint_currency" id="room_price_quint_currency" required>
                    <option value="PKR" {{ old('room_price_quint_currency', $hotel->room_price_quint_currency) == 'PKR' ? 'selected' : '' }}>PKR</option>
                    <option value="USD" {{ old('room_price_quint_currency', $hotel->room_price_quint_currency) == 'USD' ? 'selected' : '' }}>USD</option>
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
                <div class="col-md-12 mt-3">
                    <label class="form-label">Quint Room Daily Prices</label>
                </div>
                @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                    <div class="col-md-2">
                        <label class="form-label" for="{{ $day }}_price_quint">{{ ucfirst($day) }} Price</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control @error("{$day}_price_quint") is-invalid state-invalid @enderror" name="{{ $day }}_price_quint" id="{{ $day }}_price_quint" placeholder="Enter {{ ucfirst($day) }} Price..." value="{{ old("{$day}_price_quint", $hotel->{"{$day}_price_quint"}) }}">
                            <select class="form-control @error("{$day}_price_quint_currency") is-invalid state-invalid @enderror" name="{{ $day }}_price_quint_currency" id="{{ $day }}_price_quint_currency">
                                <option value="PKR" {{ old("{$day}_price_quint_currency", $hotel->{"{$day}_price_quint_currency"}) == 'PKR' ? 'selected' : '' }}>PKR</option>
                                <option value="USD" {{ old("{$day}_price_quint_currency") == 'USD' ? 'selected' : '' }}>USD</option>
                            </select>
                        </div>
                        @error("{$day}_price_quint")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <div class="col-md-4">
            <label class="form-label" for="room_price_triple">Triple Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_triple') is-invalid state-invalid @enderror" name="room_price_triple" id="room_price_triple" placeholder="Enter Triple Room Price..."  value="{{ old('room_price_triple', $hotel->room_price_triple) }}" requiredrequired>
                <select class="form-control @error('room_price_triple_currency') is-invalid state-invalid @enderror" name="room_price_triple_currency" id="room_price_triple_currency" required>
                    <option value="PKR" selected>PKR</option>
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
                <!-- Triple Room Daily Prices Header -->
                <div class="col-md-12 mt-3">
                    <label class="form-label">Triple Room Daily Prices</label>
                </div>

                <!-- Daily Prices Fields -->
                @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                    <div class="col-md-2">
                        <label class="form-label" for="{{ $day }}_price_triple">{{ ucfirst($day) }} Price</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control @error("{$day}_price_triple") is-invalid state-invalid @enderror" name="{{ $day }}_price_triple" id="{{ $day }}_price_triple" placeholder="Enter {{ ucfirst($day) }} Price..."  value="{{ old("{$day}_price_triple", $hotel->{"{$day}_price_triple"}) }}">
                            <select class="form-control @error("{$day}_price_triple_currency") is-invalid state-invalid @enderror" name="{{ $day }}_price_triple_currency" id="{{ $day }}_price_triple_currency">
                                <option value="PKR" selected>PKR</option>
                            </select>
                        </div>
                        @error("{$day}_price_triple")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="col-md-4">
            <label class="form-label" for="room_price_quad">Quad Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_quad') is-invalid state-invalid @enderror" name="room_price_quad" id="room_price_quad" placeholder="Enter Quad Room Price..."  value="{{ old('room_price_quad', $hotel->room_price_quad) }}" required required>
                <select class="form-control @error('room_price_quad_currency') is-invalid state-invalid @enderror" name="room_price_quad_currency" id="room_price_quad_currency" required>
                    <option value="PKR" selected>PKR</option>
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
                <!-- Quad Room Weekly Prices Header -->
                <div class="col-md-12">
                    <label class="form-label">Quad Room Weekly Prices</label>
                </div>
                @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                    <div class="col-md-2">
                        <label class="form-label" for="{{ $day }}_price_quad">{{ ucfirst($day) }} Price</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control @error("{$day}_price_quad") is-invalid state-invalid @enderror" name="{{ $day }}_price_quad" id="{{ $day }}_price_quad" placeholder="Enter {{ ucfirst($day) }} Price..." value="{{ old("{$day}_price_quad", $hotel->{"{$day}_price_quad"}) }}">
                            <select class="form-control @error("{$day}_price_quad_currency") is-invalid state-invalid @enderror" name="{{ $day }}_price_quad_currency" id="{{ $day }}_price_quad_currency">
                                <option value="PKR" selected>PKR</option>
                            </select>
                        </div>
                        @error("{$day}_price_quad")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <label class="form-label" for="room_price_double">Double Room Price <b class="text-danger">*</b></label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control @error('room_price_double') is-invalid state-invalid @enderror" name="room_price_double" id="room_price_double" placeholder="Enter Double Room Price..." value="{{ old('room_price_double', $hotel->room_price_double) }}" required>
                <select class="form-control @error('room_price_double_currency') is-invalid state-invalid @enderror" name="room_price_double_currency" id="room_price_double_currency" required>
                    <option value="PKR" {{ old('room_price_double_currency', $hotel->room_price_double_currency) == 'PKR' ? 'selected' : '' }}>PKR</option>
                </select>
            </div>
            <div id="validationServerRoomPriceDoubleFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('room_price_double')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label">Double Room Weekly Prices</label>
                </div>
                @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                    <div class="col-md-2">
                        <label class="form-label" for="{{ $day }}_price_double">{{ ucfirst($day) }} Price</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control @error("{$day}_price_double") is-invalid state-invalid @enderror" name="{{ $day }}_price_double" id="{{ $day }}_price_double" placeholder="Enter {{ ucfirst($day) }} Price..." value="{{ old("{$day}_price_double", $hotel->{"{$day}_price_double"}) }}">
                            <select class="form-control @error("{$day}_price_double_currency") is-invalid state-invalid @enderror" name="{{ $day }}_price_double_currency" id="{{ $day }}_price_double_currency">
                                <option value="PKR" {{ old("{$day}_price_double_currency", $hotel->{"{$day}_price_double_currency"}) == 'PKR' ? 'selected' : '' }}>PKR</option>
                            </select>
                        </div>
                        @error("{$day}_price_double")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="row" style="margin-left: 40px">
    <div class="col-md-4">
        <label class="form-label" for="hotel_room_detail">Hotel Room Detail <b class="text-danger">*</b></label>
        <textarea class="form-control @error('hotel_room_detail') is-invalid state-invalid @enderror" name="hotel_room_details" id="hotel_room_detail" placeholder="Enter Hotel Room Detail..." required>{{ old('hotel_room_details', $hotel->hotel_room_details) }}</textarea>
        <div id="validationServerHotelRoomDetailFeedback" class="invalid-feedback">This Field is Required.</div>
        @error('hotel_room_detail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label" for="hotel_details">Hotel Details <b class="text-danger">*</b></label>
        <textarea class="form-control @error('hotel_details') is-invalid state-invalid @enderror" name="hotel_details" id="hotel_details" placeholder="Enter Hotel Details..." required>{{ old('hotel_details' , $hotel->hotel_details) }}</textarea>
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
