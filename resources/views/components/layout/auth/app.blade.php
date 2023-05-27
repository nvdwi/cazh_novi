<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{('/')}}"/>
    <x-layout.main.seo :title="$title"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ Themes::asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ Themes::asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

    @stack('style')

    @livewireStyles

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<!--begin::Theme mode setup on page load-->
<x-layout.main.theme-mode.init/>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('{{ Themes::asset('media/auth/bg10.jpeg') }}');
        }

        [data-theme="dark"] body {
            background-image: url('{{ Themes::asset('media/auth/bg10-dark.jpeg') }}');
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ Themes::asset('media/auth/agency.png') }}" alt=""/>
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                     src="{{ Themes::asset('media/auth/agency-dark.png') }}" alt=""/>
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Cazh Sales Management</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-600 fs-base text-center fw-semibold">Managing sales and partner for cazh sales
                </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        @yield('content')
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "{{Themes::asset('/')}}";</script>

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ Themes::asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ Themes::asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Custom Javascript(used by this page)-->
<script src="{{ Themes::asset('js/custom/authentication/sign-in/general.js') }}"></script>
<!--end::Custom Javascript-->
@stack('script')

@livewireScripts

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    window.addEventListener('notification', event => {
        if(event.detail.status === 'success'){
            toastr.success('<strong>' + event.detail.message + '</strong>');
        }
        if(event.detail.status === 'info'){
            toastr.info('<strong>' + event.detail.message + '</strong>');
        }
        if(event.detail.status === 'warning'){
            toastr.warning('<strong>' + event.detail.message + '</strong>');
        }
        if(event.detail.status === 'error'){
            toastr.error('<strong>' + event.detail.message + '</strong>');
        }
    })
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
