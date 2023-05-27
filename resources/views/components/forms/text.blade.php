<div>
    <input type="text" placeholder="Masukkan {{ $name }}"
           wire:model.defer="{{ $model }}"
        {{ $attributes->merge(['class' => 'form-control']) }} />
    @error($model)
    <x-error.validation message="{{ $message }}" />
    @enderror
</div>
