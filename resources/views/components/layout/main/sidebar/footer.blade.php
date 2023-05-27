<!--begin::Footer-->
<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
    @if(auth()->user()->type == 'ADMINISTRATOR')
        <a href="{{route('setting.index')}}"
           class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 my-20 w-100">
            <span class="btn-label">Settings</span>
            {!! Themes::svgIcon('general/gen005.svg', 'svg-icon btn-icon svg-icon-2 m-0') !!}
        </a>
    @endif
</div>
<!--end::Footer-->
