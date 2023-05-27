<div>
    <x-layout.card>
        <x-slot:header>
            <div class="toolbar my-6 mx-auto">
                <h1>Selamat Datang di Halaman {{ucfirst(strtolower(auth()->user()->type))}} {{ucfirst(strtolower(auth()->user()->name))}}</h1>
            </div>
        </x-slot:header>
        <x-slot:body>
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Row-->
                    <div class="flex-column-auto row g-5 g-xl-10 mb-4 mb-xl-4">
                        <livewire:home.box/>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </x-slot:body>
    </x-layout.card>
</div>



{{--    <div class="row">--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 4-->--}}
{{--            <div class="card card-custom gutter-b" style="height: 110px">--}}
{{--                <a href="/admin/manajer/table">--}}
{{--                    <!--begin::Body-->--}}
{{--                    <div class="card-body d-flex flex-column">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1" style="font-size: 15px">--}}
{{--                            <div class="text-dark-50 font-weight-bold">Total Manajer</div>--}}

{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                    </div>--}}
{{--                    <!--end::Body-->--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 4-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 4-->--}}
{{--            <div class="card card-custom gutter-b" style="height: 110px">--}}
{{--                <a href="/admin/sales/table">--}}
{{--                    <!--begin::Body-->--}}
{{--                    <div class="card-body d-flex flex-column">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1" style="font-size: 15px">--}}
{{--                            <div class="text-dark-50 font-weight-bold">Total Sales</div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                    </div>--}}
{{--                    <!--end::Body-->--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 4-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 20px">--}}
{{--            <!--begin::Tiles Widget 4-->--}}
{{--            <div class="card card-custom gutter-b" style="height: 110px">--}}
{{--                <a href="/admin/merchant/table">--}}
{{--                    <!--begin::Body-->--}}
{{--                    <div class="card-body d-flex flex-column">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1" style="font-size: 15px">--}}
{{--                            <div class="text-dark-50 font-weight-bold">Total Merchant/Partner</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                    </div>--}}
{{--                    <!--end::Body-->--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 4-->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 20px">--}}
{{--        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-xl-1" style="margin-bottom: 20px"> -->--}}
{{--            <!--begin::Tiles Widget 2-->--}}
{{--            <div class="card card-custom bg-danger gutter-b" style="height: 130px">--}}
{{--                <!--begin::Body-->--}}
{{--                <a href="/admin/status/1">--}}
{{--                    <div class="card-body d-flex flex-column p-0">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1 card-spacer-x pt-6">--}}
{{--                            <div class="text-inverse-danger font-weight-bold">Status Kunjungan</div>--}}
{{--                            <div class="text-inverse-danger font-weight-bolder font-size-h3">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                        <!--begin::Chart-->--}}
{{--                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>--}}
{{--                        <!--end::Chart-->--}}
{{--                    </div>--}}
{{--                    <!--end::Body-->--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 2-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 2-->--}}
{{--            <div class="card card-custom bg-warning gutter-b" style="height: 130px">--}}
{{--                <!--begin::Body-->--}}
{{--                <a href="/admin/status/2">--}}
{{--                    <div class="card-body d-flex flex-column p-0">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1 card-spacer-x pt-6">--}}
{{--                            <div class="text-inverse-danger font-weight-bold">Status Kunjungan</div>--}}
{{--                            <div class="text-inverse-danger font-weight-bolder font-size-h3">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                        <div></div>--}}
{{--                        <!--begin::Chart-->--}}
{{--                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>--}}
{{--                        <!--end::Chart-->--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <!--end::Body-->--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 2-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 2-->--}}
{{--            <div class="card card-custom bg-success gutter-b" style="height: 130px">--}}
{{--                <!--begin::Body-->--}}
{{--                <a href="/admin/status/3">--}}
{{--                    <div class="card-body d-flex flex-column p-0">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1 card-spacer-x pt-6">--}}
{{--                            <div class="text-inverse-danger font-weight-bold">Status Kunjungan</div>--}}
{{--                            <div class="text-inverse-danger font-weight-bolder font-size-h3">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                        <!--begin::Chart-->--}}
{{--                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>--}}
{{--                        <!--end::Chart-->--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <!--end::Body-->--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 2-->--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 2-->--}}
{{--            <div class="card card-custom bg-primary gutter-b" style="height: 130px">--}}
{{--                <!--begin::Body-->--}}
{{--                <a href="/admin/status/4">--}}
{{--                    <div class="card-body d-flex flex-column p-0">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1 card-spacer-x pt-6">--}}
{{--                            <div class="text-inverse-danger font-weight-bold">Status Kunjungan</div>--}}
{{--                            <div class="text-inverse-danger font-weight-bolder font-size-h3">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                        <!--begin::Chart-->--}}
{{--                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>--}}
{{--                        <!--end::Chart-->--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <!--end::Body-->--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 2-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--            <!--begin::Tiles Widget 2-->--}}
{{--            <div class="card card-custom bg-info gutter-b" style="height: 130px">--}}
{{--                <!--begin::Body-->--}}
{{--                <a href="/admin/status/5">--}}
{{--                    <div class="card-body d-flex flex-column p-0">--}}
{{--                        <!--begin::Stats-->--}}
{{--                        <div class="flex-grow-1 card-spacer-x pt-6">--}}
{{--                            <div class="text-inverse-danger font-weight-bold">Status Kunjungan</div>--}}
{{--                            <div class="text-inverse-danger font-weight-bolder font-size-h3">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Stats-->--}}
{{--                        <!--begin::Chart-->--}}
{{--                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>--}}
{{--                        <!--end::Chart-->--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <!--end::Body-->--}}
{{--            </div>--}}
{{--            <!--end::Tiles Widget 2-->--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    --}}{{-- Peta Merchant/Partner --}}
{{--    <!--begin::Row-->--}}
{{--    <div class="row">--}}
{{--        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">--}}
{{--            <!--begin::Card-->--}}
{{--            <div class="card card-custom gutter-b example example-compact">--}}
{{--                <div class="card-header">--}}
{{--                    <div class="card-title">--}}
{{--                        <h3 class="card-label">Rincian Peta Persebaran Merchant/Partner</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <!--The div element for the map -->--}}
{{--                    <div id="map" style="height: 500px; width: 100%;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--End::Row-->--}}

{{--    <script>--}}
{{--        // Initialize and add the map--}}
{{--        function initMap() {--}}
{{--            // The location of maps--}}


{{--            //make new map--}}
{{--            var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--                zoom: 5,--}}
{{--                center: new google.maps.LatLng(-0.2984209, 110.1858078),--}}
{{--                mapTypeId: google.maps.MapTypeId.ROADMAP--}}
{{--            });--}}

{{--            var infowindow = new google.maps.InfoWindow();--}}

{{--            var marker, i, custom_marker;--}}

{{--            for (i = 0; i < locations.length; i++) {--}}

{{--                //untuk custom warna marker berdasarkan status--}}
{{--                // if (locations[i][3] == 'Prospek') {--}}
{{--                //     custom_marker = '{{ url('/assets/image_maps/marker_red.png') }}'--}}
{{--                // } else if (locations[i][3] == 'Demo/Presentasi') {--}}
{{--                //     custom_marker = '{{ url('/assets/image_maps/marker_yellow.png') }}'--}}
{{--                // } else if (locations[i][3] == 'Closing Paid') {--}}
{{--                //     custom_marker = '{{ url('/assets/image_maps/marker_green.png') }}'--}}
{{--                // } else if (locations[i][3] == 'Pending') {--}}
{{--                //     custom_marker = '{{ url('/assets/image_maps/marker_blue.png') }}'--}}
{{--                // } else {--}}
{{--                //     custom_marker = '{{ url('/assets/image_maps/marker_black.png') }}'--}}
{{--                // }--}}

{{--                if (locations[i][3] == 'Prospek') {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_red.png') }}'--}}
{{--                } else if (locations[i][3] == 'Demo/Presentasi') {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_yellow.png') }}'--}}
{{--                } else if (locations[i][3] == 'Closing Paid') {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_green.png') }}'--}}
{{--                } else if (locations[i][3] == 'Pending') {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_blue.png') }}'--}}
{{--                } else if (locations[i][3] == 'Maintenance') {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_purple.png') }}'--}}
{{--                } else {--}}
{{--                    custom_marker = '{{ url('/assets/image_maps/nmarker_black.png') }}'--}}
{{--                }--}}

{{--                //make marker (latitude dan longitude)--}}
{{--                marker = new google.maps.Marker({--}}
{{--                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),--}}
{{--                    map: map,--}}
{{--                    icon: custom_marker--}}
{{--                });--}}

{{--                //add pop up/info window dr marker--}}
{{--                google.maps.event.addListener(marker, 'click', (function(marker, i) {--}}
{{--                    return function() {--}}
{{--                        infowindow.setContent(locations[i][0]); //option 1 nampilin nama merchant--}}
{{--                        infowindow.open(map, marker); //option 2 nampilin lat long ?--}}
{{--                    }--}}
{{--                })(marker, i));--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC55h3VepLXMTDMz8a-BE9zTCNViINxwxw&callback=initMap">--}}
{{--        //Key anggun : AIzaSyD4bH81ZC2JQTFLORBU71U56ipKjS2B7HM--}}
{{--        //Key project : AIzaSyC55h3VepLXMTDMz8a-BE9zTCNViINxwxw--}}
{{--    </script>--}}
