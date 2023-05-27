<div>
    <div class="row g-5 g-xl-8">
        <div class="col-md-4">
            <x-layout.card class="mb-5 mb-xl-8">
                <x-slot name="header" class="card-header border-1 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-5 mb-1">Pengaturan</span>
                    </h3>
                </x-slot>
                <x-slot name="body" class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table align-middle gs-0 gy-4">
                            <tbody>
                            @foreach ($tabList as $tab_list)
                                <tr class="{{ $tab == $tab_list ? 'bg-light-primary' : null }} cursor-pointer"
                                    wire:click="$set('tab', '{{ $tab_list }}')">
                                    <td
                                        class="text-start ps-4 rounded-start {{ $tab == $tab_list ? 'text-black' : 'text-muted' }}  fw-bold">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                        <span
                                                            class="{{ $tab == $tab_list ? 'text-primary' : 'text-muted' }} fw-bolder">{{ $tab_list }}</span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="text-end pe-4 rounded-end">
                                        @if ($tab != $tab_list)
                                            <button type="button"
                                                    wire:click="$set('tab', '{{ $tab_list }}')"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                {!! Themes::svgIcon('arrows/arr064.svg', 'svg-icon-2') !!}
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-slot>
            </x-layout.card>
        </div>
        <div class="col-md-8">
            @if($tab == 'Kategori')
                <livewire:setting.category.index/>
            @endif
            @if($tab == 'Status Kunjungan')
                <livewire:setting.status.index/>
            @endif
        </div>
    </div>
</div>
