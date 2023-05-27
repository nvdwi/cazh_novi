<div>
    <x-layout.card>
        <x-slot:header>
            <h3 class="card-title">Tambah Aktivitas</h3>
            <div class="card-toolbar">
                <x-buttons.action target="openModal" label="Tambah Aktivitas" class="btn btn-primary"/>
            </div>
        </x-slot:header>
        <x-slot:body>
            <livewire:partner.detail.activity-datatable :partner_id="$partner->id"/>
        </x-slot:body>
    </x-layout.card>

    <x-layout.modal title="Tambah Aktivitas" id="{{ $modal_id }}" class="mw-650px" form="submit">
        <x-slot name="content">
            <div>
                <x-alert.validation/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Tanggal</label>
                <x-forms.date wire:model.defer="activity_date"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Pilih Tanggal" />
                @error('activity_date')
                <x-error.validation message="{{ $message }}" />
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Status</label>
                <x-forms.select-input :data="$statuses" label="name" value="id" wire:model.defer="status_id" name="Status Kunjungan"/>
                @error('status_id')
                <x-error.validation message="{{ $message }}" />
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="fs-6 fw-bold mb-2">Nominal</label>
                <x-forms.currency type="text" wire:model.defer="nominal"
                                        class="form-control form-control-lg mb-3 mb-lg-0" />
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Keterangan</label>
                <x-forms.textarea model="notes" name="Keterangan"/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="fs-6 fw-bold mb-2">Foto</label>
                <x-forms.file model="images" name="Gambar"/>
            </div>
        </x-slot>
        <x-slot name="action">
            <x-buttons.action class="btn btn-light me-3" label="Batal" target="closeModal"/>
            <x-buttons.submit target="submit" label="Simpan" class="ms-auto btn-primary" type="submit"/>
        </x-slot>
    </x-layout.modal>
</div>
