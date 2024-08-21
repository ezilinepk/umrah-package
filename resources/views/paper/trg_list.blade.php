@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Exam Cell Approval & Upload'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">All Papers</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                <tr>
                    <th>Ser</th>
                    <th>Status</th>
                    <th>CI Status</th>
                    <th>SI Status</th>
                    <th>Module/Paper</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>MOS</th>
                    <th>Action</th>
                </tr>
                </thead>
  		
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->trg_status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->trg_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td> 
                            <td>
                                @if($item->chief_instructor_status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->chief_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            <td>
                                @if($item->senior_instructor_status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->senior_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            
                            <td>{{ ucwords($item->module_name) }}</td>
                            <td>{{ ucwords($item->date) }}</td>
                            <td>{{ ucwords($item->name) }}</td>
                            <td>{{ ucwords($item->mos) }}</td>
                            <td>
                                @if($item->status == 'reject' && $item->rejection == 'trg') 
                                    <span data-toggle="tooltip" title="Again Submit">
                                        <a href="#" class="btn btn-sm btn-light-secondary againSubmission" data-toggle="modal" data-target="#againSubmissionModal" data-submission_id="{{ $item->id }}">
                                            <i class="fa fa-forward" style="color: black"></i>
                                        </a>
                                    </span>
                                @endif
                                @if($item->chief_instructor_status == 'approaved' && $item->send_to_exam == 'no')
                                    <span data-toggle="tooltip" title="Send To Exam">
                                        <a href="#" class="btn btn-sm btn-light-success sendToExam" data-toggle="modal" data-target="#sendToExam" data-trg_exam_paper_id="{{ $item->id }}"><i class="fa fa-forward"></i></a>
                                    </span>
                                @endif    
                                @if($item->trg_status != 'approaved')
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
                                @if($item->trg_status == 'pending')
                                    <span data-toggle="tooltip" title="Approve">
                                        <a href="#" class="btn btn-sm btn-light-success trgApprovalChange" data-toggle="modal" data-target="#trgApprovalModal" data-trg_paper_id="{{ $item->id }}"><i class="fa fa-check"></i></a>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <!-- Include TRG Approval Modal -->
    @include('paper.trgApprovalModal')
    <!-- Include Exam Department Modal -->
    @include('paper.sendToExam')
    <!-- Again Submitt Modal -->
    @include('paper.againSubmission')
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        // Parse Paper Id to Modal
        $('.trgApprovalChange').on('click', function () {

            let paper = $(this).data('trg_paper_id');

            $('#trg_paper_id').val(paper);
        });

        // Parse Paper Id to Exam Modal
        $('.sendToExam').on('click', function () {

            let paper_id = $(this).data('trg_exam_paper_id');

            $('#trg_exam_paper_id').val(paper_id);
        });

        $(document).on('change', '#status', function () {
            let status = $(this).val();

            if (status == 'reject') {
                $('.senior_instructor').hide('slow');
            } else {
                $('.senior_instructor').show('slow'); 
            }
        })

        $('.againSubmission').on('click', function () {

            let submission_id = $(this).data('submission_id');

            $('#submission_id').val(submission_id);
        });
    </script>
@endsection
