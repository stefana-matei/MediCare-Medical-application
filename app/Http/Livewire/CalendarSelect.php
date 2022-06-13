<?php

namespace App\Http\Livewire;

use Carbon\Carbon;

class CalendarSelect extends Calendar
{
    protected function setPresetDate()
    {
        $presetDate = old('date');

        if (empty($presetDate) && empty($this->presetDate)) {
            $this->presetDate = today();
        } else {
            $this->presetDate = Carbon::createFromFormat('d-m-Y', $presetDate ?? $this->presetDate->format('d-m-Y'))->startOfDay();

            $this->changeMonthDifference();
        }
    }

    private function changeMonthDifference()
    {
        if(!$this->monthChanged) {
            $this->monthDifference = (int)today()->startOfMonth()->floatDiffInMonths($this->presetDate->copy()->startOfMonth());
        }
    }

    public function selectDate($date)
    {
        $this->presetDate = Carbon::createFromFormat('d-m-Y', $date)->startOfDay();

        $this->monthDifference = (int)today()->startOfMonth()->floatDiffInMonths($this->presetDate->copy()->startOfMonth());
        $this->monthChanged = true;
    }
}
