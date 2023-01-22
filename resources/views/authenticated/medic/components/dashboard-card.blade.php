@php($icon = $icon ?? 'sli-ban')
@php($title = $title ?? 'Titlu invalid')
@php($count = $count ?? 'Count invalid')


<div class="col col-12 col-md-6 col-xl-3">
    <div class="card bg-light">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col col-5">
                    <div class="icon p-0 fs-48 text-primary opacity-50 {{ $icon }}"></div>
                </div>

                <div class="col col-7">
                    <h6 class="mt-0 mb-1">{{ $title }}</h6>
                    <div class="count text-primary fs-20">{{ $count }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
