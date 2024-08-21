@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Detail'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">File Detail</h3>
            </div>
        </div>
        <div class="card-body">
            <iframe src="{{ asset('files/'.$detail->file) }}"></iframe>
        </div>
    </div>

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    
@endsection
