<x-livewire-tables::bs5.table.cell>
    {{ $row->sales->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->partner->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->activity_date }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->status->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \App\Utilities\Numbers::formatCurrency($row->nominal) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->notes }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->images)
        <img src="{{ asset('storage') }}/{{ $row->images }}" class="h-50px" alt="$partner->name">
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
    <x-table.action-button wire:key="{{ $row->id }}">
        <div class="menu-item px-3">
            <a href="{{route('aktivitas.update', ['id' => $row->id])}}" class="menu-link px-3">Edit</a>
        </div>
        <div class="menu-item px-3">
            <a wire:click="$emit('set_delete', {{$row}})" class="menu-link px-3">Hapus</a>
        </div>
    </x-table.action-button>
</x-livewire-tables::bs5.table.cell>

