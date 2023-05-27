<div>
    <div class="row">
        <div class="col-md-12 col-lg-3 mb-5">
            <x-layout.card>
                <x-slot:body class="pt-15 px-0">
                    <div class="d-flex flex-column text-center mb-9 px-9">
                        <!--begin::Photo-->
                        <div class="symbol symbol-80px symbol-lg-150px mb-4">
                            @if($partner->images)
                                <img src="{{ asset('storage') }}/{{ $partner->images }}" class="" alt="$partner->name">
                            @else
                                <img src="{{\App\Utilities\Themes::avatar($partner->name)}}" class=""
                                     alt="$partner->name">
                            @endif
                        </div>
                        <!--end::Photo-->
                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Name-->
                            <span class="text-gray-800 fw-bold text-hover-primary fs-4">{{$partner->name}}</span>
                            <!--end::Name-->

                            <!--begin::Position-->
                            <span class="text-muted d-block fw-semibold">{{$partner->address}}</span>
                            <!--end::Position-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <div class="m-0">
                        <!--begin::Navs-->
                        <ul class="nav nav-pills nav-pills-custom flex-column border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 {{$mode == 'detail' ? 'active' : ''}}"
                                   href="#" wire:click="$set('mode', 'detail')" onclick="return false;">
                                    {!! Themes::svgIcon('general/gen010.svg', 'svg-icon svg-icon-3 svg-icon-muted me-3') !!}
                                    Details
                                    <span
                                        class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end">
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item mt-5">
                                <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 {{$mode == 'activity' ? 'active' : ''}}"
                                   href="#" wire:click="$set('mode', 'activity')" onclick="return false;">
                                    {!! Themes::svgIcon('arrows/arr070.svg', 'svg-icon svg-icon-3 svg-icon-muted me-3') !!}
                                    Activity
                                    <span
                                        class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end">
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!--begin::Navs-->
                    </div>

                </x-slot:body>
            </x-layout.card>
        </div>
        <div class="col-md-12 col-lg-9">
            @if($mode == 'detail')
            <livewire:partner.detail.data :partner="$partner"/>
            @endif
            @if($mode == 'activity')
            <livewire:partner.detail.activity :partner="$partner"/>
            @endif
        </div>
    </div>

</div>
