<div>
    <x-layout.card form="submitForm">
        <x-slot:header>
            <h3 class="card-title">Tambah Data Sales</h3>
        </x-slot:header>
        <x-slot:body >
            <div class="row">
                <div class="mb-10">
                    <label class="required form-label">Nama Manager</label>
                    <x-layout.forms.text model="name" name="Nama Manager"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nama Sales</label>
                    <x-layout.forms.text model="name" name="Nama Sales"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Nomor Telepon</label>
                    <x-layout.forms.text model="name" name="Nomor Telepon"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Email</label>
                    <x-layout.forms.text model="name" name="Email"/>

                </div>
                <div class="mb-10">
                    <label class="required form-label">Password</label>
                    <x-layout.forms.text model="name" name="Password"/>
                </div>
                <div class="mb-10">
                    <label class="required form-label">Foto</label>
                    <input type="file"
                           id="avatar" name="avatar"
                           accept="image/png, image/jpeg">
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