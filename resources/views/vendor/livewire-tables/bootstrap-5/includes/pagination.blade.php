@if ($showPagination)
    @if ($paginationEnabled && $rows->lastPage() > 1)
        <div class="row">
            <div class="col-12 col-md-6 text-muted d-flex align-items-center">
                <span class="me-1">@lang('Showing')</span>
                <strong class="me-1">{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                <span class="me-1">@lang('to')</span>
                <strong class="me-1">{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                <span class="me-1">@lang('of')</span>
                <strong class="me-1">{{ $rows->total() }}</strong>
                <span>@lang('results')</span>
            </div>

            <div class="col-12 col-md-6">
                {{ $rows->onEachSide(0)->links() }}
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 text-muted">
                @lang('Showing')
                <strong>{{ $rows->count() }}</strong>
                @lang('results')
            </div>
        </div>
    @endif
@endif
