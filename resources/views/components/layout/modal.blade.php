<div wire:ignore.self class="modal fade" id="{{ $_id }}" aria-hidden="true">
    <div {{ $attributes->merge(['class' => 'modal-dialog modal-dialog-centered']) }}>
        <div class="modal-content">
            <div class="modal-header" id="{{ $_id }}_header">
                <h2 class="fw-bolder">{{ $title }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                  rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                  transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            @if ($form)
                <form wire:submit.prevent="{{ $form }}">
                    <div class="modal-body py-10 px-lg-17 scroll-y">
                        {{ $content }}
                    </div>
                    <div class="modal-footer flex-center">
                        {{ $action }}
                    </div>
                </form>
            @else
                <div class="modal-body py-10 px-lg-17 scroll-y">
                    {{ $content }}
                </div>
                <div class="modal-footer flex-center">
                    {{ $action }}
                </div>
            @endif
        </div>
    </div>
</div>
