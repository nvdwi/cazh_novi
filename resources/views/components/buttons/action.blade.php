<button type="button" {{ $attributes->merge(['class' => 'btn']) }}
wire:click="{{ $target }}"
        wire:loading.class="spinner spinner-light spinner-right"
        wire:offline.attr="disabled">
    <div wire:loading.remove wire:target="{{ $target }}">
        {{ $label }}
    </div>
    <div wire:loading wire:target="{{ $target }}">
        Tunggu Sebentar...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </div>
</button>
