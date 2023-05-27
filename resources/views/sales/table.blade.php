
<x-livewire-tables::bs5.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs5.table.cell>

@if(auth()->user()->type != 'MANAGER')
    <x-livewire-tables::bs5.table.cell>
        {{ $row->manager->name }}
    </x-livewire-tables::bs5.table.cell>
@endif

<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->phone }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
    <x-table.action-button wire:key="{{ $row->id }}">
        <div class="menu-item px-3">
            <a wire:click="$emit('set_edit', {{$row}})" class="menu-link px-3">Edit</a>
        </div>
        <div class="menu-item px-3">
            <a wire:click="$emit('set_delete', {{$row}})" class="menu-link px-3">Hapus</a>
        </div>
    </x-table.action-button>
</x-livewire-tables::bs5.table.cell>

