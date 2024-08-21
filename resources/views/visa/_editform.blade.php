<div class="form-group">
    <div class="row">
        <!-- Visa Price -->
        <div class="col-md-4">
            <label class="form-label" for="visa_price">Visa Price (SAR) <b class="text-danger">*</b></label>
            <input type="number" class="form-control @error('visa_price') is-invalid state-invalid @enderror" name="visa_price" id="visa_price" placeholder="Enter Visa Price in Riyals..." value="{{ old('visa_price', $visa->visa_price) }}" required>
            <div id="validationServerVisaPriceFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Visa Valid Date -->
        <div class="col-md-4">
            <label class="form-label" for="visa_valid_date">Visa Valid Date <b class="text-danger">*</b></label>
            <input type="date" class="form-control @error('visa_valid_date') is-invalid state-invalid @enderror" name="visa_valid_date" id="visa_valid_date" value="{{ old('visa_valid_date', $visa->visa_valid_date) }}" required>
            <div id="validationServerVisaValidDateFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_valid_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Visa Expiration Date -->
        <div class="col-md-4">
            <label class="form-label" for="visa_exp_date">Visa Expiration Date <b class="text-danger">*</b></label>
            <input type="date" class="form-control @error('visa_exp_date') is-invalid state-invalid @enderror" name="visa_exp_date" id="visa_exp_date" value="{{ old('visa_exp_date', $visa->visa_exp_date) }}" required>
            <div id="validationServerVisaExpDateFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_exp_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <!-- Visa Country -->
        <div class="col-md-4">
            <label class="form-label" for="visa_country">Visa Country <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('visa_country') is-invalid state-invalid @enderror" name="visa_country" id="visa_country" placeholder="Enter Visa Country..." value="{{ old('visa_country', $visa->visa_country) }}" required>
            <div id="validationServerVisaCountryFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_country')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Visa Type -->
        <div class="col-md-4">
            <label class="form-label" for="visa_type">Type of Visa <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('visa_type') is-invalid state-invalid @enderror" name="visa_type" id="visa_type" placeholder="Enter Type of Visa..." value="{{ old('visa_type', $visa->visa_type) }}" required>
            <div id="validationServerVisaTypeFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Place of Issue -->
        <div class="col-md-4">
            <label class="form-label" for="visa_place_of_issue">Place of Issue <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('visa_place_of_issue') is-invalid state-invalid @enderror" name="visa_place_of_issue" id="visa_place_of_issue" placeholder="Enter Place of Issue..." value="{{ old('visa_place_of_issue', $visa->visa_place_of_issue) }}" required>
            <div id="validationServerVisaPlaceOfIssueFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_place_of_issue')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <!-- Visa Price with Transport -->
        <div class="col-md-4">
            <label class="form-label" for="visa_price_with_transport">Visa Price with Transport (SAR) <b class="text-danger">*</b></label>
            <input type="number" class="form-control @error('visa_price_with_transport') is-invalid state-invalid @enderror" name="visa_price_with_transport" id="visa_price_with_transport" placeholder="Enter Visa Price with Transport in Riyals..." value="{{ old('visa_price_with_transport', $visa->visa_price_with_transport) }}" required>
            <div id="validationServerVisaPriceWithTransportFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('visa_price_with_transport')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
