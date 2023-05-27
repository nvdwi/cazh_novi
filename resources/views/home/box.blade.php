@foreach ($data as $key => $value)
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-4 mb-md-2 mb-xl-2">
        <!--begin::Card widget 20-->
        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-5" style="background-color: #F1416C;">
            <!--begin::Header-->
            <div class="card-header">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-2">{{$value}}</span>
                    <!--end::Amount-->
    {{--                <!--begin::Subtitle-->--}}
    {{--                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">--}}
    {{--                    --}}
    {{--                </span>--}}
    {{--                <!--end::Subtitle-->--}}
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <!--begin::Progress-->
                <div class="d-flex align-items-center flex-column w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto">
                        <span>
                            Jumlah {{$key}} saat ini
                        </span>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 20-->
    </div>
@endforeach
