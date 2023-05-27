<button type="submit" {{ $attributes->merge(['class' => 'btn font-weight-bold']) }} wire:target="{{ $target }}" wire:loading.class="spinner spinner-light spinner-right" wire:offline.attr="disabled">
    <div wire:loading.remove wire:target="{{ $target }}">
        {{ $label }}
        <i class="las {{ $icon }} fs-2 ms-2"></i>
    </div>
    <div wire:loading wire:target="{{ $target }}">
        Tunggu Sebentar...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </div>
</button>
