<meta charset="utf-8" />
<title>@yield('pageName') | BOOKING</title>
<meta name="description" content="Aside light theme example" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="canonical" href="https://keenthemes.com/metronic" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle5883.css?v=7.2.9') }}" rel="stylesheet"
    type="text/css" />
@yield('stylesheet')
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle5883.css?v=7.2.9') }}'" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle5883.css?v=7.2.9') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/style.bundle5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('assets/css/themes/layout/header/base/light5883.css?v=7.2.9') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/themes/layout/header/menu/light5883.css?v=7.2.9') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/themes/layout/brand/light5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/themes/layout/aside/light5883.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle5883.css?v=7.2.9') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendors Styles-->
<!--end::Layout Themes-->
{{-- custome css of project --}}
<link href="{{asset("assets/plugins/custom/toastr-2.1.1/toastr.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("assets/css/custom.css")}}" rel="stylesheet" type="text/css" />
<!-- Bootstrap CSS -->

{{-- end custom css --}}
<link rel="shortcut icon"
    href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="{{ asset('notification/snackbar/snackbar.min.css') }}">
@if (Session::has('success'))
<script>
    swal("Success", "{{ Session::get('success') }}", "success");
</script>

@endif
@if (Session::has('error'))
<script>
    swal("Error", "{{ Session::get('error') }}", "error");
</script>

@endif

@if (Session::has('error'))
<script>
    swal("Error", "{{ Session::get('error') }}", "error");
</script>

@endif

<!-- ============================================= -->
<!-- outside css style -->
@yield('headInlineTag')

<!-- End Outside css style -->
<!-- ============================================= -->
