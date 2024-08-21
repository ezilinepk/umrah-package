@extends('layouts.default')

@section('headInlineTag')

    {{-- Write Style,link external CSS files --}}

@endsection

@section('pageName',__('Dashboard'))

@section('content')

    <!-- ===================================== -->
        <!-- Begin::Dashboard Content -->
        @if (auth()->user()->hasRole('Exam Staff'))
            <div class="row">
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                <h1 class="fw-bold text-gray-800 text-center lh-lg">Exam Upload {{ ucwords(auth()->user()->name) }} </h1>

                            </div>
                            <!--end::Heading-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                 <h1 class="fw-bold text-gray-1000 text-center lh-lg">Dashboard</h1>
              			 <h1 class="fw-bold text-gray-800 text-center lh-lg">{{ ucwords(auth()->user()->name) }} </h1>
                                <!--end::Title-->
                                <!--begin::Illustration-->
                                <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 my-lg-12" style="background-image:url('{{ asset("assets/media/svg/illustrations/easy/10.svg") }} ')"></div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Heading-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"> <span style="font-size: 50px; font-weight: bold; float: right; margin-top: -20px;">{{ $total }}</span></div>
                                    <div class="fw-bold text-white">Total Visa</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5"><span style="font-size: 50px; font-weight: bold; float: right; margin-top: -20px;">{{ $pending }}</span></div>
                                    <div class="fw-bold text-white">Pending Booking</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- End::Dashboard Content -->
    <!-- ===================================== -->

@endsection

@section('jsOutside')

    {{-- Write script,link external JS files --}}

@endsection
