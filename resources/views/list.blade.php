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
                    <th>Cat</th>
                    <th>Module/Paper</th>
                    <th>MOS</th>
		            <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Exam Cell Status</th>
                    <th>SI Status</th>
                    <th>CI Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($item->category->name) }}</td>
                            <td>{{ ucwords($item->module_name) }}</td>
                            <td>{{ ucwords($item->mos) }}</td>
                            <td>{{ ucwords($item->date) }}</td>
			                <td>{{ ucwords($item->name) }}</td>
                            <td>{{ ($item->trg->name) ? ucwords($item->trg->name) : '-' }} | 
                                @if($item->trg_status == 'Pending')
                                    <span class="badge badge-info">Pending</span>
                                @elseif($item->trg_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @elseif($item->trg_status == 'approaved')
                                    <span class="badge badge-success">Approved</span>
				                @else
                                    <span class="badge badge-info">Pending</span>
                                @endif
                            </td>
                            <td>{{ ($item->senior) ? ucwords($item->senior->name) : '-' }} | 
                                @if($item->senior_instructor_status == 'Pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->senior_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @elseif($item->senior_instructor_status == 'approaved')
                                    <span class="badge badge-success">approaved</span>
				                @else
                                    <span class="badge badge-info">Pending</span>
                                @endif
                            </td>
                         
                            <td>{{ ($item->chief) ? ucwords($item->chief->name) : '-' }} | 
                                @if($item->chief_instructor_status == 'Pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->chief_instructor_status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @elseif($item->chief_instructor_status == 'approaved')
                                    <span class="badge badge-success">approaved</span>
				                @else
                                    <span class="badge badge-info">Pending</span>
                                @endif
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
