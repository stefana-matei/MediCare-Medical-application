<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class Calendar extends Component
{
    const DAYS_COUNT = 35;

    public $now;
    public $weeks;
    public $month;
    public $monthDifference = 0;

    public function render()
    {
        $this->now = now()->locale('ro_RO')->addMonths($this->monthDifference);

        $this->month = $this->now->format('F Y');

        $this->setWeeks();

        return view('livewire.calendar');
    }

    private function setWeeks()
    {
        $this->weeks = [];

        $start = $this->now->copy()->startOfMonth()->startOfWeek()->midDay();
        $end = $this->now->copy()->endOfMonth()->endOfWeek()->midDay();

        $period = CarbonPeriod::create($start, $end);

        foreach ($period as $day) {
            $this->weeks['week-' . $day->week][] = $day;
        }
    }

    public function addMonth()
    {
        $this->monthDifference++;
    }

    public function subMonth()
    {
        if($this->monthDifference > 0) {
            $this->monthDifference--;
        }
    }
}
