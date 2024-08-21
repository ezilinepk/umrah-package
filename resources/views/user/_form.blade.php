<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label class="form-label" for="role">Role <b class="text-danger">*</b></label>
            <select class="form-control select2 @error('role') is-invalid state-invalid @enderror" name="role" id="role" required>
                <option value="" selected disabled>Select Option</option>
                @foreach($role as $ro)
                    <option value="{{ $ro->id }}"@isset($user) @if ($user->hasRole($ro)) selected @endif @endisset>{{ ucwords($ro->name) }}</option>
                @endforeach
            </select>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="name">Name <b class="text-danger">*</b></label>
            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" id="name" value="@isset($user->name) {{ $user->name }} @endisset" placeholder="Enter Name..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="email">Email <b class="text-danger">*</b></label>
            <input type="email" class="form-control @error('email') is-invalid state-invalid @enderror" name="email" id="email" value="@isset($user->email) {{ $user->email }} @endisset" placeholder="Enter Email..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label" for="password">Password <b class="text-danger">*</b></label>
            <input type="password" class="form-control @error('password') is-invalid state-invalid @enderror" name="password" id="password" placeholder="********">

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password_confirmation">Confirm Password <b class="text-danger">*</b></label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid state-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="********">

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
