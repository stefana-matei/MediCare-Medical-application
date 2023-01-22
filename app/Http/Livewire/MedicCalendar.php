<?php

namespace App\Http\Livewire;

use App\Services\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use Livewire\Component;

class MedicCalendar extends Component
{
    /** @var Carbon */
    public $now;

    /** @var Carbon */
    public $referenceDate;

    /** @var int */
    public $monthDifference = 0;

    /** @var Collection */
    public $appointments;
    public $patients;
    public $honored;
    public $future;
    public $pending;

    public $weeks;

    public function render()
    {
        $this->setReferenceDate();
        $this->setAppointments();
        $this->setWeeks();
        $this->setPatients();

        return view('livewire.medic-calendar');
    }

    public function addMonth()
    {
        $this->monthDifference++;
    }

    public function subMonth()
    {
        $this->monthDifference--;
    }

    private function setAppointments()
    {
        $startOfMonth = $this->referenceDate->copy()->startOfMonth();
        $endOfMonth = $this->referenceDate->copy()->endOfMonth();

        $this->appointments = Auth::user()
            ->appointments()
            ->with('membership.patient.media')
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->orderBy('date')
            ->get();

        $this->honored = $this->appointments
            ->where('confirmed', 1)
            ->where('honored', 1)
            ->count();

        $this->future = $this->appointments
            ->where('confirmed', 1)
            ->where('date', '>=',  $this->now)
            ->count();

        $this->pending = $this->appointments
            ->whereStrict('confirmed', null)
            ->where('date', '>=',  $this->now)
            ->count();
    }

    private function setWeeks()
    {
        $this->weeks = [];

        $start = $this->referenceDate->copy()->startOfMonth()->startOfWeek()->midDay();
        $end = $this->referenceDate->copy()->endOfMonth()->endOfWeek()->midDay();

        $period = CarbonPeriod::create($start, $end);
        $days = $period->toArray();
        $monthlyAppointments = [];

        /** @var Carbon $day */
        foreach ($days as $day) {
            $monthlyAppointments[] = [
                'date' => $day,
                'appointments' => $this->appointments
                    ->where('confirmed', 1)
                    ->where('date', '>=', $day->copy()->startOfDay())
                    ->where('date', '<=', $day->copy()->endOfDay())
            ];
        }

        $this->weeks = array_chunk($monthlyAppointments, 7);
    }

    private function setPatients()
    {
        $this->patients = Auth::user()->memberships()->count();
    }

    private function setReferenceDate()
    {
        $this->now = now();
        $this->referenceDate = $this->now->copy()->addMonthsWithoutOverflow($this->monthDifference);
    }
}
