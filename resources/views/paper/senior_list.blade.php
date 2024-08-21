@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Senior Instructor Approval'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Senior Instructor Approval List</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                <tr>
                    <th>Ser</th>
		            <th>Course</th>
                    <th>Module/Paper</th>
                    <th>MOS</th>
		    		<th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Status</th>                    
                    <th>Action Req</th>
			
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
            				<td>{{ ucwords($item->course_name) }}</td> 
            				<td>{{ ucwords($item->module_name) }}</td> 
            				<td>{{ ucwords($item->mos) }}</td> 
            				<td>{{ ucwords($item->date) }}</td> 
                			<td>{{ ucwords($item->name) }}</td>                          
                			<td>
                                @if($item->senior_instructor_status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->senior_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status == 'reject' && $item->rejection == 'senior') 
                                    <span data-toggle="tooltip" title="Again Submit">
                                        <a href="#" class="btn btn-sm btn-light-secondary againSubmission" data-toggle="modal" data-target="#againSubmissionModal" data-submission_id="{{ $item->id }}">
                                            <i class="fa fa-forward" style="color: black"></i>
                                        </a>
                                    </span>
                                @endif
                                @can('view paper')
                                    <a href="{{ route('paper.view',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-info font-weight-bold mr-2" data-toggle="tooltip" title="View Paper"><i class="fa fa-info fa-1x"></i> </a>
                                @endcan
                                @can('view log')
                                    <a href="{{ route('paper.viewLog',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-primary font-weight-bold mr-2" data-toggle="tooltip" title="View Log"><i class="fa fa-cog fa-1x"></i> </a>
                                @endcan
                                @if($item->senior_instructor_status == 'pending')
                                    <span data-toggle="tooltip" title="Approved">
                                        <a href="#" class="btn btn-sm btn-light-success seniorApprovalChange" data-toggle="modal" data-target="#seniorApprovalModal" data-senior_paper_id="{{ $item->id }}"><i class="fa fa-check"></i></a>
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
    @include('paper.seniorApprovalModal')
    <!-- Again Submitt Modal -->
    @include('paper.againSubmission')
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        // Parse Module Id to Module Destroy Modal
        $('.seniorApprovalChange').on('click', function () {

            let paper = $(this).data('senior_paper_id');

            $('#senior_paper_id').val(paper);
        });

        $(document).on('change', '#status', function () {
            let status = $(this).val();

            if (status == 'reject') {
                $('.chief_instructor').hide('slow');
                $('.rejectionSenior').show('slow');
            } else {
                $('.chief_instructor').show('slow'); 
                $('.rejectionSenior').hide('slow');
            }
        })

        $('.againSubmission').on('click', function () {

            let submission_id = $(this).data('submission_id');

            $('#submission_id').val(submission_id);
        });
    </script>
@endsection
