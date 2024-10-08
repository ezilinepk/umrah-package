@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Edit Hotel'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">EDit</h3><small>All fields marked with asterisks(*) are required.</small>
            </div>
        </div>
        <form action="{{ route('hotel.update', $hotel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <!-- Include Form -->
                @include('hotel._editform')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-light-success font-weight-bold mr-2 mb-5" style="float: right;">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}

@endsection
