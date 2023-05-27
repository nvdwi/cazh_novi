<div class="form-check form-check-custom form-check-sm">
    <input
        type="checkbox"
        wire:model="selectedRow"
        value="{{ $selectedRowValue  }}"
        wire:loading.attr.delay.shorter="disabled"
        onclick="event.stopPropagation();return true;"
        class="form-check-input"
    />
</div>
