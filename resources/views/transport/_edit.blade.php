<div class="form-group">
    <div class="row">
        <!-- Transport Type -->
        <div class="col-md-4">
            <label class="form-label" for="transport_type">Transport Type <b class="text-danger">*</b></label>
            <select class="form-control @error('transport_type') is-invalid state-invalid @enderror" name="transport_type" id="transport_type" onchange="showPriceFields()" required>
                <option value="">Select Transport Type...</option>
                <option value="bus" {{ old('transport_type', $transport->transport_type ?? '') == 'bus' ? 'selected' : '' }}>Bus</option>
                <option value="Private car" {{ old('transport_type', $transport->transport_type ?? '') == 'Private car' ? 'selected' : '' }}>Private car</option>
                <option value="GMC 5-7 Person" {{ old('transport_type', $transport->transport_type ?? '') == 'GMC 5-7 Person' ? 'selected' : '' }}>GMC 5-7 Person</option>
                <option value="Hiace 10 person" {{ old('transport_type', $transport->transport_type ?? '') == 'Hiace 10 person' ? 'selected' : '' }}>Hiace 10 person</option>
                <option value="Coaster 20 Person" {{ old('transport_type', $transport->transport_type ?? '') == 'Coaster 20 Person' ? 'selected' : '' }}>Coaster 20 Person</option>
                <option value="Shared Transport By Bus" {{ old('transport_type', $transport->transport_type ?? '') == 'Shared Transport By Bus' ? 'selected' : '' }}>Shared Transport By Bus</option>
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
            <input type="number" step="0.01" class="form-control" name="price_airport_makkah" id="price_airport_makkah" placeholder="Enter Price..." oninput="updatePrice()" value="{{ old('price_airport_makkah', $transport->price_airport_makkah ?? '') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="price_makkah_madina">Price per Person for Makkah to Madina</label>
            <input type="number" step="0.01" class="form-control" name="price_makkah_madina" id="price_makkah_madina" placeholder="Enter Price..." oninput="updatePrice()" value="{{ old('price_makkah_madina', $transport->price_makkah_madina ?? '') }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label" for="price_madina_makkah">Price per Person for Madina to Makkah</label>
            <input type="number" step="0.01" class="form-control" name="price_madina_makkah" id="price_madina_makkah" placeholder="Enter Price..." oninput="updatePrice()" value="{{ old('price_madina_makkah', $transport->price_madina_makkah ?? '') }}">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="currency">Currency</label>
            <select class="form-control" name="currency" id="currency" onchange="updatePrice()">
                <option value="usd" {{ old('currency', $transport->currency ?? 'usd') == 'usd' ? 'selected' : '' }}>USD</option>
                <option value="pkr" {{ old('currency', $transport->currency ?? 'usd') == 'pkr' ? 'selected' : '' }}>PKR</option>
            </select>
        </div>
    </div>
</div>

<script>
    function updatePrice() {
        // Function to update prices, if necessary
    }
</script>
