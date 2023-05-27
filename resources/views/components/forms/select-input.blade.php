<select class="form-select form-select-solid fw-bold" {{ $attributes->whereStartsWith('wire:model') }}>
    <option value="">Pilih {{ $name }}</option>
    @forelse($datas  as $key => $item)
        <option value="{{ $key }}">{{ $item }}</option>
    @empty
        <option value="" disabled>Tidak ada data ditemukan!</option>
    @endforelse
</select>
