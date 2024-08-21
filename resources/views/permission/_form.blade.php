<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label" for="module_id">Module <b class="text-danger">*</b></label>
            <select class="form-control" name="module_id" id="module_id" required>
                <option value="" selected disabled>Select Option</option>
                @foreach($module as $m)
                    <option value="{{ $m->id }}">{{ ucwords($m->name) }}</option>
                @endforeach
            </select>
         </div>

        <div class="col-md-6">
            <label class="form-label" for="name">Name <b class="text-danger">*</b></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission Name..." required>
        </div>
    </div>
</div>
