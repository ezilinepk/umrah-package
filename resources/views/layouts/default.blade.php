<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========================================= -->
    <!-- Include Head Section -->
    @include('layouts.partials.head')
    <!-- End Head Section -->
    <!-- ========================================= -->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!-- ====================================== -->
    <!-- Include Mobile Header -->
    @include('layouts.partials.mobileHeader')
    <!-- ENd Mobile Header -->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!-- ======================================== -->
            <!-- Include Aside Bar -->
            @include('layouts.partials.aside')
            <!-- End AsideBar -->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!-- =========================================== -->
                <!-- Include Header -->
                @include('layouts.partials.header')
                <!-- End Header section -->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center flex-wrap ml-5">
                                <!--begin::Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@yield('pageName')</h5>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Search Form-->
{{--                                @php $segments = ''; @endphp--}}
{{--                                @foreach(Request::segments() as $segment)--}}
{{--                                    <?php $segments .= '/'.$segment; ?>--}}
{{--                                    <a href="{{ $segments }}" style="text-decoration: none"><h6>{{ ucwords($segment)}}</h6> </a> <span style="margin-top: -8px"> -> </span>--}}
{{--                                @endforeach--}}
                                <!--end::Search Form-->
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!-- =========================================== -->
                            <!-- Start Page Content -->
                            @yield('content')
                            <!-- End Page Content -->
                            <!-- =========================================== -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Entry Section -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Wrapper -->
        </div>
        <!-- Page End -->
    </div>
    <!-- ============================================== -->
    <!-- Include Script Section -->
    @include('layouts.partials.script')
    <!-- End Script Section -->
    <!-- Begin::Alert-->
    @include('layouts.partials.alert')
    <!-- End::Alert-->
    <!-- ============================================== -->
</body>
@notify_render

</html>
