<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class CreateAppointments extends Component
{
    public $medics;
    public $times;
    public $services;

    public $selectedMedic;
    public $selectedSpecialty;

    protected $listeners = ['specialtySelectedEvent'];

    public function specialtySelectedEvent($value)
    {
        if ($value == 0) {
            $this->selectedSpecialty = null;
            return;
        }
        $this->selectedSpecialty = $value;
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

        $specialties = Specialty::all();

        return view('livewire.create-appointments', [
            'specialties' => $specialties
        ]);
    }


    /**
     * Sets the medics property
     */
    private function setMedics()
    {
        if (!$this->selectedSpecialty) {
            $this->medics = null;
            return;
        }

//        $this->medics = Specialty::with('settingsMedic.medic.media', 'settingsMedic.medic.settingsMedic.specialty', 'settingsMedic.medic.settingsMedic.level')
//            ->find($this->selectedSpecialty)->settingsMedic->pluck('medic');


        $this->medics = User::medic()
            ->with('settingsMedic.specialty', 'settingsMedic.level', 'media')
            ->whereHas('settingsMedic', function($query){
                $query->where('specialty_id', $this->selectedSpecialty);
            })
            ->get();


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
        $start_date = Carbon::today()->setTime(9, 0, 0);
        $end_date = Carbon::today()->setTime(10, 0, 0);
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
