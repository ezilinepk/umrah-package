@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('CI MSG Approval'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">CI MSG Approval List</h3>
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
                                @if($item->chief_instructor_status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->chief_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                       
                            <td>
                                @can('view paper')
                                    <a href="{{ route('paper.view',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-info font-weight-bold mr-2" data-toggle="tooltip" title="View Paper"><i class="fa fa-info fa-1x"></i> </a>
                                @endcan
                                @can('view log')
                                    <a href="{{ route('paper.viewLog',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-primary font-weight-bold mr-2" data-toggle="tooltip" title="View Log"><i class="fa fa-cog fa-1x"></i> </a>
                                @endcan
                                @if($item->chief_instructor_status == 'pending')
                                    <span data-toggle="tooltip" title="Approved">
                                        <a href="#" class="btn btn-sm btn-light-success chiefApprovalModal" data-toggle="modal" data-target="#chiefApprovalModal" data-chief_paper_id="{{ $item->id }}" data-final_status="Approved"><i class="fa fa-check"></i></a>
                                    </span>
                                    <span data-toggle="tooltip" title="Reject">
                                        <a href="#" class="btn btn-sm btn-light-danger chiefApprovalModal" data-toggle="modal" data-target="#chiefApprovalModal" data-chief_paper_id="{{ $item->id }}" data-final_status="Reject"><i class="fa fa-times"></i></a>
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
    @include('paper.chiefApprovalModal')
@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}
    <script>
        // Parse Module Id to Module Destroy Modal
        $('.chiefApprovalModal').on('click', function () {

            let paper = $(this).data('chief_paper_id');
            let final_status = $(this).data('final_status');

            $('#chief_paper_id').val(paper);
            $('#final_status').val(final_status);
            $('#textStatus').text(final_status);
            $('#ciStatusBtn').text(final_status);

            if (final_status == 'Reject') {
                $('.rejectionChief').show('slow');
            } else {
                $('.rejectionChief').hide('slow');
            }

        });
    </script>
@endsection
