<div>
    <x-layout.card>
        <x-slot:header>
            <h3 class="card-title">Tambah Partner</h3>
            <div class="card-toolbar">
                <x-buttons.action target="openModal" label="Tambah Partner" class="btn btn-primary"/>
            </div>
        </x-slot:header>
        <x-slot:body>
            <livewire:partner.datatable />
        </x-slot:body>
    </x-layout.card>

    <x-layout.modal title="Tambah Partner" id="{{ $modal_id }}" class="mw-650px" form="submit">
        <x-slot name="content">
            <div>
                <x-alert.validation/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Nama Partner</label>
                <x-forms.text model="name" name="Nama Partner"/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Kategori Partner</label>
                <x-forms.select-input :data="$categories" label="name" value="id" wire:model.defer="category_id" name="Kategori Partner"/>
                @error('category_id')
                <x-error.validation message="{{ $message }}" />
                @enderror
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Nama PIC</label>
                <x-forms.text model="pic" name="Nama PIC"/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Nomor HP PIC</label>
                <x-forms.text model="pic_phone" name="Nomor HP PIC"/>
            </div>
            <div class="fv-row mb-7 fv-plugins-icon-container">
                <label class="required fs-6 fw-bold mb-2">Alamat</label>
                <x-forms.textarea model="address" name="Alamat"/>
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
