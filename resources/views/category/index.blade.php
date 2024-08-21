@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Category'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Category List</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                @can('create category')
                    <a href="{{ route('category.create') }}" class="btn btn-light-success font-weight-bold mr-2">
                    <i class="fa fa-plus fa-1x"></i> Create</a>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($item->name) }}</td>
                            <td>
                                @can('edit category')
                                    <a href="{{ route('category.edit',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-warning font-weight-bold mr-2" data-toggle="tooltip" title="Edit Category"><i class="fa fa-pen fa-1x"></i> </a>
                                @endcan
                                @can('delete category')
                                    <span data-toggle="tooltip" title="Delete Category">
                                    <a href="#" class="btn btn-sm btn-light-danger font-weight-bold mr-2 destroyCategory" data-category_id="{{ $item->id }}" data-toggle="modal" data-target="#deteteCategory"><i class="fa fa-trash fa-1x"></i> </a>
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

    <!-- Include Category Delete Modal -->
    @include('category.destroy')
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        // Parse Module Id to Module Destroy Modal
        $('.destroyCategory').on('click', function () {

            let category = $(this).data('category_id');

            $('#category_id').val(category);
        });
    </script>
@endsection
