<div class="col-md-3">
    <label class="form-label" for="package_name">Packages <b class="text-danger">*</b></label>
    <input
        type="number"
        class="form-control @error('package_name') is-invalid state-invalid @enderror"
        name="package_name"
        id="package_name"
        required
        placeholder="Enter Package Number"
    >
    <div id="validationServerHotelPackageFeedback" class="invalid-feedback">This Field is Required.</div>
    @error('package_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
