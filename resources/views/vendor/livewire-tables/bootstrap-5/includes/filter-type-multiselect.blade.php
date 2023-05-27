@foreach($filter->options() as $optionKey => $value)
    <div class="form-check form-check-custom form-check-solid form-check-sm mb-2" wire:key="filter-{{ $key }}-multiselect-{{ $optionKey }}">
        <input
            onclick="event.stopPropagation();"
            type="checkbox"
            id="filter-{{$key}}-{{ $loop->index }}"
            wire:model="filters.{{$key}}"
            value="{{ $optionKey }}"
            class="form-check-input"
        >
        <label class="form-check-label" for="filter-{{$key}}-{{ $loop->index }}">{{ $value }}</label>
    </div>
@endforeach
