<div>
    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <h4 class="my-2 d-flex w-100 justify-content-between align-items-center">
                <div class="btn btn-square btn-calendar shadow-none {{ $monthDifference <= 0 ? 'disabled' : '' }}"
                     wire:click="subMonth"><i
                        class="icon sli-arrow-left"></i></div>
                <span>{{ $month }}</span>
                <div class="btn btn-square btn-calendar shadow-none" wire:click="addMonth"><i
                        class="icon sli-arrow-right"></i></div>
            </h4>
        </div>


        <div class="card-body">
            @foreach($weeks as $week)
                <div class="calendar-week">
                    @foreach($week as $day)
                        {{--                        <div wire:click="selectDate('{{ $day->format('d-m-Y') }}')"--}}
                        <div class="calendar-day">
                            <div
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                class="btn btn-square rounded-pill shadow-none
                                    {{ !$day->isFuture() && !$day->isToday() ? 'disabled' : '' }}
                                    {{ $day->isToday() ? 'btn-primary' : 'btn-calendar' }}
                                    {{ $presetDate?->isSameDay($day) ? 'btn-outline-primary' : '' }}
                                    {{ $day->isSameMonth($now) ? '' : 'btn-faded' }}">
                                {{ $day->format('j') }}
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <span class="dropdown-item" wire:click="selectDate('{{ $day->format('d-m-Y') }}')"
                                          type="button">Programare noua</span>
                                </li>

                                <hr class="my-2">

                                <li>
                                    <span class="dropdown-item text-danger" type="button">Anuleaza</span>
                                </li>

                            </ul>
                        </div>

                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
</div>
