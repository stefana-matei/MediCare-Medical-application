<div>
    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <h4 class="my-2 d-flex w-100 justify-content-between align-items-center">
                <button class="btn btn-square btn-calendar shadow-none" wire:click="subMonth" {{ $monthDifference <= 0 ? 'disabled' : '' }}><i class="icon sli-arrow-left"></i></button>
                <span>{{ $month }}</span>
                <button class="btn btn-square btn-calendar shadow-none" wire:click="addMonth"><i class="icon sli-arrow-right"></i></button>
            </h4>
        </div>

        <div class="card-body">
            @foreach($weeks as $week)
                <div class="row">
                    @foreach($week as $day)
                        <button class="col btn btn-square rounded-pill shadow-none {{ $day->isToday() ? 'btn-primary' : 'btn-calendar' }}"
                             {{ !$day->isFuture() && !$day->isToday() ? 'disabled' : '' }}
                        >
                            {{ $day->format('j') }}
                        </button>
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
</div>
