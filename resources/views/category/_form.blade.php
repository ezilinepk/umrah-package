<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-label" for="name">Name <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="name" id="name" value="@isset($detail->name) {{ $detail->name}} @endisset" placeholder="Enter Category Name..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
    </div>
</div>
