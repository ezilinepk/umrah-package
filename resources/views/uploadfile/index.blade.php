@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName', __('Create User'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Upload File</h3>
            </div>
        </div>
        <form method="post" action="{{ route('dropboxfile.upload') }}" class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Include Form -->
                <div class="col-md-6">
                    <label class="form-label" for="password_confirmation">File <b class="text-danger">*</b></label>
                    <input type="file" class="form-control" name="file" id="password_confirmation"
                        placeholder="Select file...">

                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-light-success font-weight-bold mr-2 mb-5" style="float: right;"><i
                        class="fa fa-save"></i> Save </button>
            </div>
        </form>
    </div>

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}

@endsection
