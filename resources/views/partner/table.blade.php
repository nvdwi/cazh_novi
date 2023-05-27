<x-livewire-tables::bs5.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs5.table.cell>

@if($is_manager)
<x-livewire-tables::bs5.table.cell>
    {{ $row->users->name }}
</x-livewire-tables::bs5.table.cell>
@endif

<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->category->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->pic }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->pic_phone }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->address }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
    <x-table.action-button wire:key="{{ $row->id }}">
        <div class="menu-item px-3">
            <a wire:click="$emit('set_delete', {{$row}})" class="menu-link px-3">Hapus</a>
        </div>
        <div class="menu-item px-3">
            <a href="{{route('partner.detail', ['id' => $row->id])}}" class="menu-link px-3">Detail</a>
        </div>
    </x-table.action-button>
</x-livewire-tables::bs5.table.cell>

