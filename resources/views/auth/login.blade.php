@extends('components.layout.auth.app', [
    'title' => 'Login',
])

@section('content')
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="w-md-400px">
                <!--begin::Form-->
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Masuk</h1>
                    <!--end::Title-->
                    <div class="text-gray-500 fw-semibold fs-6"> Isikan alamat email dan password untuk masuk ke
                        dalam
                        sistem.
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <input type="text" class="bg-transparent form-control" name="email"
                               placeholder="Masukkan Email" autocomplete="off"/>
                        @error('email')
                        <p class="text-danger mt-1 ms-1 fw-bolder mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-15">
                        <input type="password" class="bg-transparent form-control" name="password"
                               placeholder="Masukkan Password" autocomplete="off"/>
                        @error('password')
                        <p class="text-danger mt-1 ms-1 fw-bolder mb-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn font-weight-bold btn-primary">
                            Masuk
                        </button>
                    </div>
                </form>
                <!--end::Form-->
                <!--end::Submit button-->
                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun? Hubungi
                    <a href="#" class="link-primary">Support</a>
                </div>
                <!--end::Sign up-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
@endsection
