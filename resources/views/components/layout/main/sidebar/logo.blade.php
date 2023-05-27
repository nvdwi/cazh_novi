<!--begin::Logo-->
<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
    <!--begin::Logo image-->
    <a href="/">
        <img alt="Logo" src="{{url('assets/media/default.svg')}}" class="h-35px app-sidebar-logo-default theme-light-show" />
        <img alt="Logo" src="{{url('assets/media/default-dark.svg')}}" class="h-35px app-sidebar-logo-default theme-dark-show" />
        <img alt="Logo" src="{{url('assets/media/default-small.svg')}}" class="h-20px app-sidebar-logo-minimize" />
    </a>
    <!--end::Logo image-->
    <!--begin::Sidebar toggle-->
    <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
        {!! Themes::svgIcon('arrows/arr079.svg', 'svg-icon svg-icon-2 rotate-180') !!}
    </div>
    <!--end::Sidebar toggle-->
</div>
<!--end::Logo-->
