@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Permissions'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Permissions List</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->

                    <a href="{{ route('permission.create') }}" class="btn btn-light-success font-weight-bold mr-2">
                    <i class="fa fa-plus fa-1x"></i> Create</a>
                
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Module</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mName }}</td>
                        <td>{{ ucwords($item->name) }}</td>
                        <td>

                        </td>
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
