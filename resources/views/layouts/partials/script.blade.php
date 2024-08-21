<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle5883.js?v=7.2.9') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle5883.js?v=7.2.9') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets5883.js?v=7.2.9') }}"></script>
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle5883.js?v=7.2.9') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/crud/datatables/advanced/footer-callback5883.js?v=7.2.9') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/validation/form-controls5883.js?v=7.2.9') }}"></script>
<!--end::Page Scripts-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets5883.js?v=7.2.9')}}"></script>
<script src="{{ asset('assets/plugins/custom/toastr-2.1.1/toastr.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select25883.js?v=7.2.9') }}"></script>
<script src="{{ asset('notification/snackbar/snackbar.min.js') }}"></script>
<!-- ==================================== -->
<!-- Validation Script -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.select2').select2({
        placeholder: "Select Option",
        allowClear: true
    });
</script>
<!-- End Validation Script -->
<!-- ==================================== -->
<!-- outside Js -->
@yield('jsOutside')

<!-- End Outside Js -->
<!-- ==================================== -->
