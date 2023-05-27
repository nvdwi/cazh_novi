
<div>
    <x-layout.card form="submitForm">
        <x-slot:header>
            <h3 class="card-title">Tambah Data Partner</h3>
        </x-slot:header>
        <x-slot:body >
            <div class="row">
                <div class="mb-10">
                    <label class="required form-label">Nama Manajer</label>
                    <select class="form-select" aria-label="Select example" name="Provinsi">
                        <option>Pilih Manajer</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nama Sales</label>
                    <select class="form-select" aria-label="Select example" name="Provinsi">
                        <option>Pilih Sales</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nama Partner</label>
                    <x-layout.forms.text model="name" name="Nama Partner"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Kategori</label>
                    <select class="form-select" aria-label="Select example" name="Provinsi">
                        <option>Pilih Kategori</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nama Pemilik/PIC</label>
                    <x-layout.forms.text model="name" name="Nama Pemilik/PIC"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nomor Telepon</label>
                    <x-layout.forms.text model="name" name="Nomor Telepon"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Alamat</label>
                    <x-layout.forms.text model="name" name="Alamat"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Provinsi</label>
                    <select class="form-select" aria-label="Select example" name="Provinsi">
                        <option>Pilih Provinsi</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Kabupaten</label>
                    <select class="form-select" aria-label="Select example" name="Kota">
                        <option>Pilih Kabupaten</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Kecamatan</label>
                    <select class="form-select" aria-label="Select example" >
                        <option >Pilih Kecamatan</option>
                        <option value="1">x</option>
                        <option value="2">y</option>
                        <option value="3">z</option>
                    </select>
                </div>
                <div class="mb-10">
                    <label class="form-label">Latitude</label>
                    <x-layout.forms.text model="name" name="latitude"/>
                </div>
                <div class="mb-10">
                    <label class="form-label">Longitude</label>
                    <x-layout.forms.text model="name" name="longitude"/>
                </div>
            </div>



        </x-slot:body>
        <x-slot:footer>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-light me-3"
                    {{--                        wire:click="closeModal"--}}
                >Batal
                </button>
                <x-layout.buttons.submit target="submitForm" label="Simpan" type="submit" class="btn-primary"/>
            </div>
        </x-slot:footer>
    </x-layout.card>
</div>
