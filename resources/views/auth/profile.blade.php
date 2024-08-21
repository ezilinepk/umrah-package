@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Update Profile'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Update Profile</h3><small>All fields marked with asterisks(*) are required.</small>
            </div>
        </div>
        <form method="post" action="{{ route('update.profile') }}" class="needs-validation" novalidate>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Name <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" required placeholder="Enter Name...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <b class="text-danger">*</b></label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}" required placeholder="Enter Email...">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Password <b class="text-danger">*</b></label>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="********">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password <b class="text-danger">*</b></label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="*******">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="">
                <button type="submit" class="btn btn-light-success font-weight-bold mr-2" style="float: right; margin-bottom: 10px"><i class="fa fa-save"></i> Save </button>
            </div>
        </form>
    </div>

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}

@endsection
