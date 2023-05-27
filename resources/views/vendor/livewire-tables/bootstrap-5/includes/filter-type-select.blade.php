<select
    onclick="event.stopPropagation();"
    wire:model="filters.{{ $key }}"
    id="filter-{{ $key }}"
    class="form-select form-select-solid fw-bolder"
>
    @foreach($filter->options() as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
