@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Paper Logs'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Paper Logs</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                <tr>
                    <th>Ser</th>
                    <th>Paper</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Action By</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($log as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($item->paper->course_name) }}</td>
                            <td>{{ ucwords($item->type) }}</td>
                            <td>{{ ucwords($item->status) }}</td>
                            <td>{{ ucwords($item->comment) }}</td>
                            <td>{{ ucwords($item->action->name) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
   
@endsection
