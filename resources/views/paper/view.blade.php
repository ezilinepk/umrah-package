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
                <h3 class="card-label">Paper -  {{ $detail->module_name }}</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                @can('edit paper')
                    <a href="{{ route('paper.edit',['id'=>$detail->uid]) }}" class="btn btn-light-warning font-weight-bold mr-2">
                    <i class="fa fa-pen fa-1x"></i> Edit</a>
                @endcan    
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered">
                <tr>
                    <td><b>Category </b></td>
                    <td>{{ $detail->category->name }}</td>
	     	    <td><b>Course </b></td>
                    <td>{{ $detail->course_name }}</td>
                   
                </tr>
                <tr>
                    <td><b>Module </b></td>
                    <td>{{ $detail->module_name }}</td>
		             <td><b>Exam Time </b></td>
                    <td>{{ $detail->name }}</td>
                    
                </tr>
                <tr>
                    <td><b>Exam Date </b></td>
                    <td>{{ $detail->date }}</td>
                    <td><b>MOS </b></td>
                    <td>{{ $detail->mos }}
                </tr>
                <tr>
                    <td><b>Approval Status Exam Cell - {{ ($detail->trg) ? $detail->trg->name : '' }}</b></td>
                    <td>
                        @if($detail->trg_status == 'pending')
                            <span class="badge badge-info">Pending</span>
                        @elseif($detail->trg_status == 'reject')
                            <span class="badge badge-danger">Rejected</span>
                        @else 
                            <span class="badge badge-success">Approved</span>
                        @endif        
                    </td>
                    <td><b>Exam Cell Comment</b></td>
                    <td>{{ $detail->trg_comment }}</td>
                </tr>
                <tr>
                    <td><b>Approval status SI - {{ ($detail->senior) ? $detail->senior->name : '' }}</b></td>
                    <td>
                        @if($detail->senior_instructor_status == 'pending')
                            <span class="badge badge-info">Pending</span>
                        @elseif($detail->senior_instructor_status == 'reject')
                            <span class="badge badge-danger">Rejected</span>
                        @else 
                            <span class="badge badge-success">Approved</span>
                        @endif        
                    </td>
                    <td><b>SI Comment</b></td>
                    <td>{{ $detail->senior_instructor_comment }}</td>
                </tr>
                <tr>
                    <td><b>Approval status CI MSG - {{ ($detail->chief) ? $detail->chief->name : '' }}</b></td>
                    <td>
                        @if($detail->chief_instructor_status == 'pending')
                            <span class="badge badge-info">Pending</span>
                        @elseif($detail->chief_instructor_status == 'reject')
                            <span class="badge badge-danger">Rejected</span>
                        @else 
                            <span class="badge badge-success">Approved</span>
                        @endif        
                    </td>
                    <td><b>CI MSG Comment</b></td>
                    <td>{{ $detail->chief_instructor_comment }}</td>
                </tr>
            </table>           
            <!--end: Datatable-->
        </div>
    </div>

    <div class="card card-custom mt-5">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">MOS Uploaded Files</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered">
                <thead>
                    <th style="width: 10%;">Ser</th>
                    <th style="width: 50%">Description</th>
                    <th style="width: 40%">File</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                    @foreach($detail->file as $df)
                        @if($df->type == 'uploader')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($df->description) }}</td>
                                <td><a href="{{ asset('files/'.$df->file) }}" target="_blank"> {{ $df->file }}</a></td>
                                <!-- <td><a href="{{ route('file.view',['id'=>$df->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td> -->
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>           
            <!--end: Datatable-->
        </div>
    </div>

    <div class="card card-custom mt-5">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-download text-primary"></i>
                </span>
                <h3 class="card-label">Exam Cell Uploaded Files</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered">
                <thead>
                    <th style="width: 10%;">Ser</th>
                    <th style="width: 50%">Description</th>
                    <th style="width: 40%">File</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                    @foreach($detail->file as $df)
                        @if($df->type == 'trg')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($df->description) }}</td>
                                <td><a href="{{ asset('files/'.$df->file) }}" target="_blank"> {{ $df->file }}</a></td>
                                <!-- <td><a href="{{ route('file.view',['id'=>$df->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td> -->
                            </tr>
                        @endif
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
