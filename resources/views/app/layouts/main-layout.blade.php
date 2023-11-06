<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('page-title') - {{ env('APP_NAME') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets') }}/images/ico/favicon.ico">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

    @yield('vendor-css')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/themes/semi-dark-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/datatables/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/datatables/datatables.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">


    {{-- <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/vendors/js/forms/validation/additional-methods.min.js') }}"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-toastr.min.css">
    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/style.css">
    @yield('custom-css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('app.layouts.header');
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('app.layouts.leftbar');
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            {{ view('app.layouts.alerts') }}
            <div class="content-header row">
                @yield('breadcrumbs')
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                @yield('content')
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('app.layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/datatables/datatables.js') }}"></script>
    <script src="{{ asset('app-assets/datatables/datatables.min.js') }}"></script>
    @yield('vendor-js')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    </script>
    @yield('page-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <!-- END: Page JS-->
    @yield('custom-js')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
