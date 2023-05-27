<div class="position-relative" wire:init="loadTable">
    @if ($this->readyLoadTable)
        @php
            $tableData = $this->dataPaginate();
            $customPerPage = $this->customPerPage ? $this->customPerPage : Constant::PER_PAGE;
        @endphp
        <div>
            <div wire:loading.class.remove="d-none" class="d-none"
                {{ $attributes->merge(['wire:target' => 'per_page, gotoPage, previousPage, nextPage, search, ' . $targetLoading]) }}>
                <div class="position-absolute h-100 w-100 z-index-2 ">
                    <div class="position-absolute top-50 start-50 translate-middle py-5 px-3"
                        style="background-color:var(--kt-body)">
                        <span class="spinner-border align-middle ms-2 fs-1 text-primary"
                            style="width: 3rem; height: 3rem;"></span>
                        <span class="ms-3">Loading, Sabar yaa ...</span>
                    </div>
                </div>
            </div>

            <div wire:loading.class="opacity-25" class="z-index-1"
                {{ $attributes->merge(['wire:target' => 'per_page, gotoPage, previousPage, nextPage, search,  ' . $targetLoading]) }}>
                <div class="d-md-flex justify-content-between mb-3">
                    @if (!$isBulkAction || count($this->selectedRow) <= 0)
                        <div class="d-md-flex">
                            <div class="ms-0 ms-md-2 mb-3 mb-md-0">
                                <select wire:model="per_page" class="form-select form-select-solid fw-bolder">
                                    @foreach ($customPerPage as $page_value)
                                        @if($page_value == -1)
                                            <option value="999999">{{ __('general.all') }}</option>
                                        @else
                                            <option value="{{ $page_value }}">{{ $page_value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @if ($filter ?? null)
                                <div class="ms-0 ms-md-2 mb-3 mb-md-0">
                                    <div x-cloak x-data="{ open: false }" x-on:keydown.escape.stop="open = false"
                                        {{-- x-on:mousedown.away="open = false"> --}}
                                        {{-- @click.away="open = false"  > --}}
                                        >
                                        <button x-on:click="open = !open" type="button"
                                            class="btn btn-light-primary d-block w-100 d-md-inline">
                                            Filter
                                            {!! Themes::svgIcon('general/gen031.svg') !!}
                                        </button>

                                        <div class="dropdown-menu w-300px p-5 mt-3" x-bind:class="{ 'show': open }"
                                            role="menu">
                                            {{ $filter }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="d-flex gap-3 flex-wrap ms-0 ms-md-2">
                        @if ($isSearch )
                            <div class="d-flex align-items-center position-relative ">
                                <span class="position-absolute ms-6">
                                    <i class="las la-search fs-2 mt-2"></i>
                                </span>
                                <input wire:model.debounce.1000ms="search"
                                    placeholder="{{ $searchLabel ? $searchLabel : __('general.search') }}"
                                    type="text" class="form-control form-control-solid ps-14">
                            </div>
                        @endif
                        @if ($isBulkAction && count($this->selectedRow))
                            <div class="d-flex">
                                <div class="d-flex rounded border border-gray-200 ">
                                    <div class="d-flex align-items-center px-5 fs-6">
                                        {!! Themes::svgIcon('general/gen043.svg', 'svg-icon-1 svg-icon-primary me-3') !!}
                                        {{ count($this->selectedRow) }} {{ __('general.selected') }}
                                    </div>
                                    <div class="border-start border-gray-200  d-flex align-items-center ">
                                        <div x-cloak x-data="{ open: false }" x-on:keydown.escape.stop="open = false"
                                            x-on:mousedown.away="open = false">
                                            <button type="button" x-on:click="open = !open"
                                                class="w-100 btn btn-sm fs-6 fw-normal">
                                                More Action
                                                <i class="las la-angle-down"></i>
                                            </button>

                                            <div class="dropdown-menu mt-2 rounded-0" style="width:135px" x-bind:class="{ 'show': open }"
                                                role="menu">
                                                @if ($more_action_menu ?? null)
                                                    {{ $more_action_menu }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn text-danger" wire:click="resetSelectedRow">Cancel</button>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="table-responsive mb-3 mt-5">
                        <table
                            class="table align-middle border-top border-bottom border-gray-100  table-row-bordered table-row-gray-100  gy-5 gs-5 fs-6">
                            <thead>
                                <tr class="text-gray-300 fw-semibold fs-6 text-uppercase gs-1 text-nowrap ">
                                    @if ($isBulkAction)
                                        <th>
                                            <div class="form-check form-check-custom form-check-sm">
                                                <input wire:model="selectAllRow"
                                                    wire:loading.attr.delay.shorter="disabled"
                                                    onclick="event.stopPropagation();return true;"
                                                    class="form-check-input" type="checkbox" />
                                            </div>
                                        </th>
                                    @endif
                                    {{ $header }}
                                </tr>
                            </thead>
                            <tbody class="fs-6 fw-semibold">
                                @if (count($tableData))
                                    {{-- {{ $body }} --}}
                                    @foreach ($tableData as $row)
                                        <x-table.row :primaryKey="$this->primaryKey" :rowData="$row">
                                            @if ($isBulkAction)
                                                <td>
                                                    <x-table.bulk-action :selectedRowValue="$row[$this->primaryKey]" />
                                                </td>
                                            @endif
                                            @include($this->rowView())
                                        </x-table.row>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{ substr_count($header, '<th>') }}">{{ __('general.no_data') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if ($tableData->lastPage() > 1)
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                            <div class="">
                                <span class="me-1">{{ __('general.showing') }}</span>
                                <strong class="me-1">{{ $tableData->count() ? $tableData->firstItem() : 0 }}</strong>
                                <span class="me-1">{{ __('general.until') }}</span>
                                <strong class="me-1">{{ $tableData->count() ? $tableData->lastItem() : 0 }}</strong>
                                <span class="me-1">{{ __('general.of') }}</span>
                                <strong class="me-1">{{ $tableData->total() }}</strong>
                                <span>{{ __('general.result') }}</span>
                            </div>
                            <div class="">
                                {{ $tableData->onEachSide(0)->links() }}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12 text-muted">
                                @lang('general.showing')
                                <strong>{{ $tableData->count() }}</strong>
                                @lang('general.result')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center my-10 align-items-center" style="background-color:var(--kt-body)">
            <span class="spinner-border align-middle ms-2 fs-1 text-primary" style="width: 3rem; height: 3rem;"></span>
            <span class="ms-3">{{ __('button.loading') }}</span>
        </div>
    @endif
</div>
