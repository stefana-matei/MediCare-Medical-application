<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateMedicAppointment extends Component
{
    public $medic;
    public $date;

    protected $listeners = ['selectedDateEvent'];

    /**
     * Event listener for date selection
     */
    public function selectedDateEvent($value)
    {
        $this->date = Carbon::parse($value)->timezone(config('app.timezone'));
    }

    public function render()
    {
        if(empty($this->date)) $this->date = today()->endOfDay();

        return view('livewire.create-medic-appointment');
    }
}
