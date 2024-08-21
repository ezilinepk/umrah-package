@extends('layouts.default')

@section('headInlineTag')
    {{-- Write Style, link external CSS files --}}
@endsection

@section('pageName', __('Visa'))

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Visa List</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                @can('user create')
                    <a href="{{ route('visa.create') }}" class="btn btn-light-success font-weight-bold mr-2">
                        <i class="fa fa-plus fa-1x"></i> Create
                    </a>
                @endcan
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Visa Type</th>
                        <th>Visa Price</th>
                        <th>Country</th>
                        <th>Issue</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visas as $visa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $visa->visa_type }}</td>
                            <td>{{ ucwords($visa->visa_price) }} ر.س</td>
                            <td>{{ ucwords($visa->visa_country) }}</td>
                            <td>{{ ucwords($visa->visa_place_of_issue) }}</td>
                            <td>
                                <a href="{{ route('visa.edit', ['id' => $visa->id]) }}" class="btn btn-sm btn-light-warning font-weight-bold mr-2" data-toggle="tooltip" title="Edit Visa">
                                    <i class="fa fa-pen fa-1x"></i>
                                </a>

                                @can('delete user')
                                    <span data-toggle="modal" data-target="#exampleModal">
                                        <a href="#" class="btn btn-sm btn-light-danger font-weight-bold mr-2 delete_user" data-user_id="{{ $visa->id }}" data-toggle="tooltip" title="Delete Visa">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </a>
                                    </span>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <!--begin::User Destroy Modal -->
    @include('user.destroy')
    <!--end::User Destroy Modal -->
@endsection

@section('jsOutside')
    {{-- Write script, link external JS files --}}
    {{-- begin::include custom js --}}
@endsection
