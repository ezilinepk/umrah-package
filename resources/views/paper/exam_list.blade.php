@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Approved Paper'))

@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Approved Paper List</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table" id="kt_datatable">
                <thead>
                <tr>
                    <th>Ser</th>
		    <th>Course</th>
                    <th>Module</th>
                    <th>Paper</th>
		    <th>MOS</th>
		    <th>Exam Date</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
				<td>{{ ucwords($item->course_name) }}</td> 
				<td>{{ ucwords($item->module_name) }}</td> 
				<td>{{ ucwords($item->name) }}</td> 
						
				<td>{{ ucwords($item->mos) }}</td> 
 			  
			<td>{{ ucwords($item->date) }}</td> 
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge badge-info">Pending</span> 
                                @elseif($item->status == 'reject')
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            <td>
                                @can('view paper')
                                    <a href="{{ route('paper.view',['id'=>$item->uid]) }}" class="btn btn-sm btn-light-info font-weight-bold mr-2" data-toggle="tooltip" title="View Paper"><i class="fa fa-info fa-1x"></i> </a>
                                @endcan
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
