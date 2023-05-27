<div>
    <div>
        <x-alert.validation/>
    </div>
    <x-layout.card form="submit">
        <x-slot:header>
            <h3 class="card-title">Tambah Aktivitas</h3>
        </x-slot:header>
        <x-slot:body>
            <div class="row">
                <div class="mb-7">
                    <label class="required fs-6 fw-bold mb-2">Nama Partner</label>
                    <x-forms.select-input :data="$partners" label="name" value="id" wire:model.defer="partner_id"
                                          name="Partner"/>
                    @error('partner_id')
                    <x-error.validation message="{{ $message }}"/>
                    @enderror
                </div>
                <div class="mb-7">
                    <label class="required fs-6 fw-bold mb-2">Tanggal</label>
                    <x-forms.date wire:model.defer="activity_date"
                                  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                  placeholder="Pilih Tanggal"/>
                    @error('activity_date')
                    <x-error.validation message="{{ $message }}"/>
                    @enderror
                </div>

                <div class="mb-7">
                    <label class="required fs-6 fw-bold mb-2">Status</label>
                    <x-forms.select-input :data="$statuses" label="name" value="id" wire:model.defer="status_id"
                                          name="Status Kunjungan"/>
                    @error('status_id')
                    <x-error.validation message="{{ $message }}"/>
                    @enderror
                </div>

                <div class="mb-7">
                    <label class="fs-6 fw-bold mb-2">Nominal</label>
                    <x-forms.currency type="text" wire:model.defer="nominal"
                                      class="form-control form-control-lg mb-3 mb-lg-0"/>
                </div>
                <div class="mb-7">
                    <label class="required fs-6 fw-bold mb-2">Keterangan</label>
                    <x-forms.textarea model="notes" name="Keterangan"/>
                </div>
                <div class="mb-7">
                    <label class="fs-6 fw-bold mb-2">Foto</label>
                    <x-forms.file model="images" name="Gambar"/>
                </div>
            </div>
        </x-slot:body>
        <x-slot name="footer">
            <div class="d-flex justify-content-end">
                <a href="{{route('aktivitas.index')}}" class="btn btn-light">Kembali</a>
                <x-buttons.submit target="submit" label="Simpan" class="ms-auto btn-primary" type="submit"/>
            </div>
        </x-slot>
    </x-layout.card>
</div>
