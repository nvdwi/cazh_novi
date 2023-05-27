<div>
        <x-layout.card>
            <x-slot:header>
                <h3 class="card-title">Aktivitas</h3>
                <div class="card-toolbar">
                    <a href="{{route('aktivitas.create')}}" class="btn btn-primary">Tambah Aktivitas</a>
                </div>
            </x-slot:header>
            <x-slot:body>
                <livewire:aktivitas.datatable />
            </x-slot:body>
        </x-layout.card>
</div>
