@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Create Role'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Create Role</h3><small>All fields marked with asterisks(*) are required.</small>
            </div>
        </div>
        <form method="post" action="{{ route('role.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="card-body">
                <!-- Include Form -->
                @include('role._form')
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
