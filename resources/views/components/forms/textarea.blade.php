<div>
    <textarea data-kt-autosize="true" placeholder="Masukkan {{ $name }}"
              wire:model.defer="{{ $model }}"
        {{ $attributes->merge(['class' => 'form-control']) }}>
        {{$model}}
    </textarea>
    @error($model)
    <x-error.validation message="{{ $message }}" />
    @enderror
</div>
