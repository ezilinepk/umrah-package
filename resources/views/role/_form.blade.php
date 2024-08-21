<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
            <input type="text" id="name" class="form-control @error('name') is-invalid state-invalid @enderror" value="@isset($role->name) {{ $role->name }} @endisset" name="name" required placeholder="Enter Role Name...">


            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>

            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="clearfix mt-5" style="margin-top: 20px"></div>

<h5>Attach Permission</h5>
<hr>

<div class="form-group mt-5">
    <div class="row">
        @foreach($module as $m)
            <div class="col-md-4 mt-5" style="margin-bottom: 10px">
                <h5>{{ ucwords($m->name) }}</h5>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($m->permission as $mp)
                            <fieldset class="checkboxsas" style="margin-left: 25px">
                                <label style="color: black">{{ $loop->iteration }} -
                                    <input type="checkbox" name="permission[]" value="{{ $mp->id }}" @isset($role) @if($role->hasPermissionTo($mp)) checked @endif @endisset style="margin-left: 5px">
                                    {{ $mp->name }}
                                </label>
                            </fieldset>

                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
