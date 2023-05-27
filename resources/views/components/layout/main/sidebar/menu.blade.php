<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
         data-kt-scroll-activate="true" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
             data-kt-menu-expand="false">

            <!--begin:Menu item-->
            <div class="menu-item">
                <div class="menu-item">
                   <a class="menu-link {{ Themes::checkUrlForMenu('', '') }}"
                       href="{{route('home')}}">
                        <span class="menu-icon">
                            {!! Themes::svgIcon('general/gen025.svg','svg-icon svg-icon-2') !!}
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
            </div>
            <!--end:Menu item-->

            @if(auth()->user()->type == 'ADMINISTRATOR')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <div class="menu-item">
                        <a class="menu-link {{ Themes::checkUrlForMenu('manager', 'manager') }}"
                           href="{{route('manager.index')}}">
                            <span class="menu-icon">
                                <i class="las la-user-astronaut fs-1"></i>
                            </span>
                            <span class="menu-title">Manager</span>
                        </a>
                    </div>
                </div>
                <!--end:Menu item-->
            @endif

            @if(auth()->user()->type != 'SALES')

            <!--begin:Menu item-->
            <div class="menu-item">
                <div class="menu-item">
                    <a class="menu-link {{ Themes::checkUrlForMenu('sales', 'sales') }}"
                       href="{{route('sales.index')}}">
                            <span class="menu-icon">
                                <i class="las la-user-friends fs-1"></i>
                            </span>
                        <span class="menu-title">Sales</span>
                    </a>
                </div>
            </div>
            <!--end:Menu item-->
            @endif


            <!--begin:Menu item-->
            <div class="menu-item">
                <div class="menu-item">
                    <a class="menu-link {{ Themes::checkUrlForMenu('partner', 'partner') }}"
                       href="{{route('partner.index')}}">
                            <span class="menu-icon">
                                <i class="las la-handshake fs-1"></i>
                            </span>
                        <span class="menu-title">Partner</span>
                    </a>
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item">
                <div class="menu-item">
                    <a class="menu-link {{ Themes::checkUrlForMenu('aktivitas', 'aktivitas') }}"
                       href="{{route('aktivitas.index')}}">
                            <span class="menu-icon">
                                <i class="las la-chart-pie fs-1"></i>
                            </span>
                        <span class="menu-title">Aktivitas Sales</span>
                    </a>
                </div>
            </div>


            <!--end:Menu item-->

            {{--            <!--begin:Menu item-->--}}
            {{--            <div class="menu-item">--}}
            {{--                <div class="menu-item">--}}
            {{--                    <a class="menu-link {{ Themes::checkUrlForMenu('laporan', 'laporan') }}"--}}
            {{--                       href="{{route('laporan.index')}}">--}}
            {{--                            <span class="menu-icon">--}}
            {{--                                <i class="las la-book fs-1"></i>--}}
            {{--                            </span>--}}
            {{--                        <span class="menu-title">Laporan Sales</span>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!--end:Menu item-->--}}

        </div>
        <!--end::Menu-->
    </div>

    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
