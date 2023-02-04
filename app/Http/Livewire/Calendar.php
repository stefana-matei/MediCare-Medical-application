<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class Calendar extends Component
{
    /** @var Carbon */
    public $now;

    /** @var array */
    public $weeks;

    /** @var string */
    public $month;

    /** @var int */
    public $monthDifference = 0;

    /** @var bool */
    public $monthChanged = false;

    /** @var Carbon */
    public $presetDate;

    public function mount()
    {
        $this->setPresetDate();
    }

    public function render()
    {
        $this->now = now()->addMonthsWithoutOverflow($this->monthDifference);

        $this->month = $this->now->format('F Y');

        $this->setWeeks();

        return $this->getView();
    }

    protected function getView()
    {
        return view('livewire.calendar');
    }

    private function setWeeks()
    {
        $this->weeks = [];

        $start = $this->now->copy()->startOfMonth()->startOfWeek()->midDay();
        $end = $this->now->copy()->endOfMonth()->endOfWeek()->midDay();

        $period = CarbonPeriod::create($start, $end);
        $days = $period->toArray();
        $this->weeks = array_chunk($days, 7);
    }

    public function addMonth()
    {
        $this->monthDifference++;
        $this->monthChanged = true;
    }

    public function subMonth()
    {
        if ($this->monthDifference > 0) {
            $this->monthDifference--;
            $this->monthChanged = true;
        }
    }

    protected function setPresetDate()
    {
//        $this->presetDate = today();
    }

    /**
     * @param $date
     */
    public function selectDate($date)
    {
        $this->redirect(route('appointments.createView', ['date' => $date]));
    }
}
