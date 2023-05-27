<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="{{url('')}}"/>
    <x-layout.main.seo :title="$title"/>

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{Themes::asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{Themes::asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    @livewireStyles
    @stack('style')

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" class="app-default">
<x-layout.main.theme-mode.init/>
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <x-layout.main.header title="{{$title}}"/>
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <x-layout.main.sidebar/>
            <!--layout-partial:layout/partials/_sidebar.html-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-fluid">
                            {{$slot}}
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                <x-layout.main.footer/>
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--layout-partial:partials/_drawers.html-->
<!--layout-partial:partials/_scrolltop.html-->
<!--begin::Javascript-->
<script>var hostUrl = "{{Themes::asset('/')}}";</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{Themes::asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="{{Themes::asset('js/scripts.bundle.js')}}"></script>

<script>
    window.addEventListener('modal-hide', event => {
        var target = event.detail.modal
        $('#' + target).modal('hide');
    })

    window.addEventListener('modal-show', event => {
        var target = event.detail.modal
        $('#' + target).modal('show');
    })

    window.addEventListener('swal:delete', event => {
        swal.fire({
            html: event.detail.text,
            icon: event.detail.type,
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Konfirmasi",
            cancelButtonText: 'Batalkan',
            reverseButtons: true,
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete', event.detail.id);
            }
        });
    });

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
<!--end::Global Javascript Bundle-->
@livewireScripts
@stack('script')

<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
