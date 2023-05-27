<div>
    <input type="file" placeholder="Masukkan {{ $name }}"
           wire:model.defer="{{ $model }}" wire:ignore
        {{ $attributes->merge(['class' => 'form-control']) }} />
    @error($model)
    <x-error.validation message="{{ $message }}" />
    @enderror
</div>
