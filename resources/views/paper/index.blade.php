@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Paper'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Paper List</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                @can('create paper')
                    <a href="{{ route('paper.create') }}" class="btn btn-light-success font-weight-bold mr-2">
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
                    <th>Ser</th>
                    <th>Status</th>
                    <th>Course</th>
                    <th>Module/Paper</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>MOS</th>
                    <th>Action Req</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                               <td>{{ ucwords($item->course_name) }}</td>
                            <td>{{ ucwords($item->module_name) }}</td>
                            <td>{{ ucwords($item->date) }}</td>
                            <td>{{ ucwords($item->name) }}</td>
                            <td>{{ ucwords($item->mos) }}</td>
                            <td>
                                @if($item->status == 'reject' && $item->rejection == 'ds') 
                                    <span data-toggle="tooltip" title="Again Submit">
                                        <a href="#" class="btn btn-sm btn-light-secondary againSubmission" data-toggle="modal" data-target="#againSubmissionModal" data-submission_id="{{ $item->id }}">
                                            <i class="fa fa-forward" style="color: black"></i>
                                        </a>
                                    </span>
                                @endif
                                @if($item->status != 'approaved')
                                    @can('edit paper')
                                        <a href="{{ route('paper.edit',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-warning font-weight-bold mr-2" data-toggle="tooltip" title="Edit Paper"><i class="fa fa-pen fa-1x"></i> </a>
                                    @endcan
                                @endif
                                @can('view paper')
                                    <a href="{{ route('paper.view',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-info font-weight-bold mr-2" data-toggle="tooltip" title="View Paper"><i class="fa fa-info fa-1x"></i> </a>
                                @endcan
                                @can('view log')
                                    <a href="{{ route('paper.viewLog',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-primary font-weight-bold mr-2" data-toggle="tooltip" title="View Log"><i class="fa fa-cog fa-1x"></i> </a>
                                @endcan
                                @can('delete paper')
                                    <span data-toggle="tooltip" title="Delete Paper">
                                    <a href="#" class="btn btn-sm btn-light-danger font-weight-bold mr-2 detetePaper" data-del_paper_id="{{ $item->id }}" data-toggle="modal" data-target="#detetePaper"><i class="fa fa-trash fa-1x"></i> </a>
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
    @include('paper.destroy')
    <!-- Again Submitt Modal -->
    @include('paper.againSubmission')
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        $('.detetePaper').on('click', function () {

            let paper = $(this).data('del_paper_id');

            $('#del_paper_id').val(paper);
        });

        $('.againSubmission').on('click', function () {

            let submission_id = $(this).data('submission_id');

            $('#submission_id').val(submission_id);
        });

    </script>
@endsection
