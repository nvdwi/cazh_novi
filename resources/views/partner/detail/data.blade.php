<div>
    <x-layout.card>
        <x-slot:header>
            <h3 class="card-title">Detail {{$partner->name}}</h3>
            <div class="card-toolbar">
                <x-buttons.action target="submit" label="Simpan" class="btn btn-primary"/>
            </div>
        </x-slot:header>
        <x-slot:body>
            <div class="row">
                <div class="mb-7">
                    <label class="required form-label">Nama Partner</label>
                    <x-forms.text model="name" name="Nama Partner"/>
                </div>
                <div class="mb-7">
                    <label class="required form-label">Kategori Partner</label>
                    <x-forms.select-input :data="$categories" label="name" value="id" wire:model.defer="category_id"
                                          name="Kategori Partner"/>
                    @error('category_id')
                    <x-error.validation message="{{ $message }}"/>
                    @enderror
                </div>
                <div class="mb-7">
                    <label class="required form-label">Nama PIC</label>
                    <x-forms.text model="pic" name="Nama PIC"/>
                </div>
                <div class="mb-7">
                    <label class="required form-label">Nomor HP PIC</label>
                    <x-forms.text model="pic_phone" name="Nomor HP PIC"/>
                </div>
                <div class="mb-7">
                    <label class="required form-label">Alamat</label>
                    <x-forms.textarea model="address" name="Alamat"/>
                </div>
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <label class="fs-6 fw-bold mb-2">Foto</label>
                    <x-forms.file model="images" name="Gambar"/>
                </div>
            </div>
        </x-slot:body>
    </x-layout.card>
</div>
