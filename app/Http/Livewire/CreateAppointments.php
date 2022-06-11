<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class CreateAppointments extends Component
{
    public $medics;
    public $times;
    public $services;

    public $selectedMedic;
    public $selectedService;

    protected $listeners = ['serviceSelectedEvent'];

    public function serviceSelectedEvent($value)
    {
        if($value == 0) {
            $this->selectedService = null;
            return;
        }
        $this->selectedService = $value;
    }


    /**
     * Renders the component
     *
     * @return View
     */
    public function render()
    {
        $this->setMedics();
        $this->setTimes();
        $this->setServices();


        return view('livewire.create-appointments');
    }


    /**
     * Sets the medics property
     */
    private function setMedics()
    {
        if (!$this->selectedService) {
            $this->medics = null;
            return;
        }

        $this->medics = Service::with('users.media', 'users.settingsMedic.specialty', 'users.settingsMedic.level')->find($this->selectedService)->users;
    }


    /**
     * Sets the services property
     */
    private function setServices()
    {
        $this->services = Service::orderBy('name')->get();
    }


    /**
     * Sets the times property
     */
    private function setTimes()
    {
        $start_date = Carbon::today()->setTime(8, 0, 0);
        $end_date = Carbon::today()->setTime(17, 0, 0);
        $slot_duration = 30;

        $times = [];
        $slots = $start_date->diffInMinutes($end_date) / $slot_duration;

        // First time
        $times[] = $start_date->format('H:i');

        for ($s = 1; $s <= $slots; $s++) {
            // Adding each additional to the list
            $times[] = $start_date->addMinute($slot_duration)->format('H:i');
        }

        $this->times = $times;
    }
}
