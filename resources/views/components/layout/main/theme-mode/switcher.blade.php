<!--begin::Menu toggle-->
<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
    {!! Themes::svgIcon('general/gen060.svg', 'svg-icon theme-light-show svg-icon-2') !!}

    {!! Themes::svgIcon('general/gen061.svg', 'svg-icon theme-dark-show svg-icon-2') !!}
</a>
<!--begin::Menu toggle-->

<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
    <!--begin::Menu item-->
    <div class="menu-item px-3 my-0">
        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
			<span class="menu-icon" data-kt-element="icon">
                {!! Themes::svgIcon('general/gen060.svg', 'svg-icon svg-icon-3') !!}
			</span>
            <span class="menu-title">Light</span>
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3 my-0">
        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
			<span class="menu-icon" data-kt-element="icon">
                {!! Themes::svgIcon('general/gen061.svg', 'svg-icon svg-icon-3') !!}
			</span>
            <span class="menu-title">Dark</span>
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3 my-0">
        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
			<span class="menu-icon" data-kt-element="icon">
                {!! Themes::svgIcon('general/gen062.svg', 'svg-icon svg-icon-3') !!}
			</span>
            <span class="menu-title">System</span>
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->
