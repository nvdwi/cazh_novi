@if ($showSearch)

    <div class="card-toolbar">
        <x-buttons.action target="exportToExcel" label="Export XLS" class="btn btn-info mx-9" />
    </div>

    <div class="d-flex align-items-center position-relative mb-3 mb-md-0">
        <span class="position-absolute ms-6">
            <i class="las la-search"></i>
        </span>
        <input
            wire:model{{ $this->searchFilterOptions }}="filters.search"
            placeholder="{{ __('Search') }}"
            type="text"
            class="form-control form-control-solid ps-14"
        >
    </div>
    {{-- <div class="mb-3 mb-md-0 input-group">
        <input
            wire:model{{ $this->searchFilterOptions }}="filters.search"
            placeholder="{{ __('Search') }}"
            type="text"
            class="form-control form-control-solid"
        >
        <i class="las la-search"></i> --}}

        {{-- @if (isset($filters['search']) && strlen($filters['search']))
            <button wire:click="$set('filters.search', null)" class="btn btn-outline-secondary" type="button">
                <svg style="width:.75em;height:.75em" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif --}}
    {{-- </div> --}}
@endif
