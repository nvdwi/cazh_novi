@if ($paginationEnabled && $showPerPage)
    <div class="me-0 me-md-2 mb-3 mb-md-0">
        <select
            wire:model="perPage"
            id="perPage"
            class="form-select form-select-solid fw-bolder"
        >
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </select>
    </div>
@endif
