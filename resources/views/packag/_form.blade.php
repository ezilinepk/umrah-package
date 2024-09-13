<div class="col-md-3">
    <label class="form-label" for="package_name">Packages <b class="text-danger">*</b></label>
    <select class="form-control @error('package_name') is-invalid state-invalid @enderror" name="package_name" id="package_name" required>
        <option value="" selected disabled>Select Package</option>
        <option value="Package One">Package One</option>
        <option value="Package Two">Package Two</option>
        <option value="Package Three">Package Three</option>
        <option value="Package Four">Package Four</option>
        <option value="Package Five">Package Five</option>
    </select>
    <div id="validationServerHotelPackageFeedback" class="invalid-feedback">This Field is Required.</div>
    @error('package_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
