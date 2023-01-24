<div>
    <div class="row">
        @include('authenticated.medic.components.dashboard-card', ['title' => 'Pacienti', 'count' => $patients, 'icon' => 'icofont-first-aid-alt'])
        @include('authenticated.medic.components.dashboard-card', ['title' => 'Onorate', 'count' => $honored, 'icon' => 'icofont-first-aid-alt'])
        @include('authenticated.medic.components.dashboard-card', ['title' => 'Viitoare', 'count' => $future, 'icon' => 'icofont-first-aid-alt'])
        @include('authenticated.medic.components.dashboard-card', ['title' => 'In asteptare', 'count' => $pending, 'icon' => 'icofont-first-aid-alt'])
    </div>

    <h4 class="my-2 d-flex w-100 justify-content-between align-items-center">
        <div class="btn btn-square btn-calendar shadow-none" wire:click="subMonth"><i class="icon sli-arrow-left"></i></div>
        <span>{{ $referenceDate->format('F Y') }}</span>
        <div class="btn btn-square btn-calendar shadow-none" wire:click="addMonth"><i class="icon sli-arrow-right"></i></div>
    </h4>


    <div class="calendar-week calendar-header border-bottom-0 text-center">
        @foreach(['Luni','Marti','Miercuri','Joi','Vineri','Sambata','Duminica'] as $label)
            <div class="calendar-day">
                <div
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    class="btn btn-square rounded-pill shadow-none">
                    {{ $label }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="medic-calendar">
        @foreach($weeks as $week)
            <div class="medic-calendar-week">
                @foreach($week as $day)
                    <div class="medic-calendar-day @if($day['date']->isToday()) today @endif">

                        <div class="date @if($day['date']->isToday()) today @endif">{{ $day['date']->format('j') }}</div>

                        @foreach($day['appointments'] as $appointment)
                            <div role="button" wire:click="updateAppointment({{ $appointment->id }})" class="appointment alert alert-success w-100">

                                <div class="d-flex justify-content-between">
                                    <span class="hour">{{ $appointment->date->format('H:i') }}</span>
                                    <span>{{ $appointment->membership->patient->firstname }}</span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <img class="rounded-circle" src="{{ $appointment->membership->patient->avatar }}" alt="{{ $appointment->membership->patient->name }}">
                                    <span>{{ $appointment->membership->patient->lastname }}</span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</div>
