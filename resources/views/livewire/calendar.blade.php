<div>
    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <h4 class="my-2 d-flex w-100 justify-content-between align-items-center">
                <div class="btn btn-square btn-calendar shadow-none" wire:click="subMonth" {{ $monthDifference <= 0 ? 'disabled' : '' }}><i class="icon sli-arrow-left"></i></div>
                <span>{{ $month }}</span>
                <div class="btn btn-square btn-calendar shadow-none" wire:click="addMonth"><i class="icon sli-arrow-right"></i></div>
            </h4>
        </div>

        <div class="card-body">
            @foreach($weeks as $week)
                <div class="row">
                    @foreach($week as $day)
                        <div class="
                        col btn btn-square
                        rounded-pill shadow-none
                        {{ !$day->isFuture() && !$day->isToday() ? 'disabled' : '' }}
                        {{ $day->isToday() ? 'btn-primary' : 'btn-calendar' }}
                        ">
                            {{ $day->format('j') }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
</div>
