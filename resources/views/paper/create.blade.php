@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Create Paper'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Create Paper</h3><small>All fields marked with asterisks(*) are req.</small>
            </div>
        </div>
        <form method="post" action="{{ route('paper.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Include Form -->
                @include('paper._form')
            </div>
            <div class="card-footer" style="">
                <button type="submit" class="btn btn-light-success font-weight-bold mr-2" style="float: right; margin-bottom: 10px"><i class="fa fa-save"></i> Save </button>
            </div>
        </form>
    </div>

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        $("#UploadFileBody").on('click', '.remCF', function() {
            $(this).parent().parent().remove();
        });


        $('.uploadFile').on('click', function () {
            $('#UploadFileBody').append(
                `
                    <tr>
                        <td><textarea class="form-control" id="description" name="description[]" placeholder="Enter Description..." rows="1"></textarea></td>
                        <td><input type="file" name="file[]" class="form-control"></td>
                        <td><a href="javascript:void(0);" class="remCF btn btn-sm btn-light-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                `
            );
        });
    </script>
@endsection
