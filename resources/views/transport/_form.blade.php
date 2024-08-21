<div class="form-group">
    <div class="row">
        <!-- Transport Type -->
        <div class="col-md-4">
            <label class="form-label" for="transport_type">Transport Type <b class="text-danger">*</b></label>
            <select class="form-control @error('transport_type') is-invalid state-invalid @enderror" name="transport_type" id="transport_type" onchange="showPriceFields()" required>
                <option value="">Select Transport Type...</option>
                <option value="bus">Bus</option>
                <!-- Add more transport types as needed -->
            </select>
            <div id="validationServerTransportTypeFeedback" class="invalid-feedback">This Field is Required.</div>
            @error('transport_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Price Input Section -->
    <div id="price-fields" class="row mt-3">
        <div class="col-md-4">
            <label class="form-label" for="price_airport_makkah">Price per Person for Airport to Makkah</label>
            <input type="number" step="0.01" class="form-control" name="price_airport_makkah" id="price_airport_makkah" placeholder="Enter Price..." oninput="updatePrice()">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="price_makkah_madina">Price per Person for Makkah to Madina</label>
            <input type="number" step="0.01" class="form-control" name="price_makkah_madina" id="price_makkah_madina" placeholder="Enter Price..." oninput="updatePrice()">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label" for="price_madina_makkah">Price per Person for Madina to Makkah</label>
            <input type="number" step="0.01" class="form-control" name="price_madina_makkah" id="price_madina_makkah" placeholder="Enter Price..." oninput="updatePrice()">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="currency">Currency</label>
            <select class="form-control" name="currency" id="currency" onchange="updatePrice()">
                <option value="usd">USD</option>
                <option value="pkr">PKR</option>
            </select>
        </div>
    </div>
</div>

<script>
    function updatePrice() {
        // Function to update prices, if necessary
    }
</script>
