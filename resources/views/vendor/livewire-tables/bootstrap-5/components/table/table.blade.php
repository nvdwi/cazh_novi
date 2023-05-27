@props(['customSecondaryHeader' => false, 'useHeaderAsFooter' => false, 'customFooter' => false])

<div class="position-relative">
    <div class="{{ $this->responsive ? 'table-responsive' : '' }}">
        <table {{ $attributes->except(['wire:sortable', 'class']) }} class="{{ trim($attributes->get('class')) ?: 'table align-middle table-row-dashed gy-5 gs-5 fs-6'}}">
            <thead>
                <tr class="text-muted fw-bolder fs-6 text-uppercase gs-0">
                    {{ $head }}
                </tr>
            </thead>

            <tbody {{ $attributes->only('wire:sortable') }} class="fs-6 fw-bold text-gray-600">
                @if ($customSecondaryHeader)
                    {{ $customSecondaryHead }}
                @endif

                {{ $body }}
            </tbody>

            @if ($useHeaderAsFooter || $customFooter)
                <tfoot>
                    @if ($useHeaderAsFooter)
                        <tr>
                            {{ $head }}
                        </tr>
                    @elseif($customFooter)
                        {{ $foot }}
                    @endif
                </tfoot>
            @endif
        </table>
    </div>
</div>
