@if ($errors->any())
    <div class="alert alert-dismissible bg-danger d-flex flex-column align-items-center flex-sm-row p-5 ">
        {!! Themes::svgIcon('general/gen045.svg', 'svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0') !!}
        <div class="d-flex flex-column align-items-center text-light ">
            <p class="m-0">Upss! Terjadi Kesalahan</p>
        </div>
    </div>
    {{-- <div>
        @foreach ($errors->all() as $error)
            [{{ $error }}],
        @endforeach
    </div> --}}
@endif
