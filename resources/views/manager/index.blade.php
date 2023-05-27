<div>
    <x-layout.card>
        <x-slot:header>
            <h3 class="card-title">Manajer</h3>
            <div class="card-toolbar">
                <livewire:manager.export />
                <x-buttons.action target="openModal" label="Tambah Manajer" class="btn btn-primary" />
            </div>
        </x-slot:header>
        <x-slot:body>
            <livewire:manager.datatable />
        </x-slot:body>
    </x-layout.card>
    <x-layout.modal title="{{ !$is_edit ? 'Tambah' : 'Ubah' }} Manajer" id="{{ $modal_id }}" class="mw-650px"
        form="submit">
        <x-slot name="content">
            <div>
                <x-alert.validation />
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Nama Manajer</label>
                <x-forms.text model="name" name="Nama Manager" />
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">No HP</label>
                <x-forms.text model="phone" name="No HP" />
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Email</label>
                <x-forms.text model="email" name="Email" />
            </div>
            @if(!$is_edit)
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Password</label>
                <x-forms.text model="password" name="Password" />
            </div>
            @endif
        </x-slot>
        <x-slot name="action">
            <x-buttons.action class="btn btn-light me-3" label="Batal" target="closeModal" />
            <x-buttons.submit target="submit" label="Simpan" class="ms-auto btn-primary" type="submit" />
        </x-slot>
    </x-layout.modal>
</div>
