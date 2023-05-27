<div>
    <x-layout.card>
        <x-slot:header>
            <h3 class="card-title">Tambah Status Kunjungan</h3>
            <div class="card-toolbar">
                <x-buttons.action target="openModal" label="Tambah Status Kunjungan" class="btn btn-primary"/>
            </div>
        </x-slot:header>
        <x-slot:body>
            <livewire:setting.status.datatable />
        </x-slot:body>
    </x-layout.card>

    <x-layout.modal title="{{ !$is_edit ? 'Tambah' : 'Ubah' }} Status Kunjungan" id="{{ $modal_id }}" class="mw-650px" form="submit">
        <x-slot name="content">
            <div>
                <x-alert.validation/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Nama Status</label>
                <x-forms.text model="name" name="Nama Status"/>
            </div>
        </x-slot>
        <x-slot name="action">
            <x-buttons.action class="btn btn-light me-3" label="Batal" target="closeModal"/>
            <x-buttons.submit target="submit" label="Simpan" class="ms-auto btn-primary" type="submit"/>
        </x-slot>
    </x-layout.modal>

</div>
