<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class CreateAppointments extends Component
{
    /**
     * Renders the component
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.create-appointments', [
            'times' => $this->getTimes(),
            'medics' => $this->getMedics()
        ]);
    }

    /**
     * Accessor for medics list
     *
     * @return mixed
     */
    private function getMedics()
    {
        return User::with('settingsMedic.specialty')->medic()->get();
    }


    /**
     * Accessor for times
     *
     * @return array
     */
    private function getTimes()
    {
        $start_date = Carbon::today()->setTime(8,0,0);
        $end_date = Carbon::today()->setTime(17,0,0);
        $slot_duration = 30;

        $times = [];
        $slots = $start_date->diffInMinutes($end_date)/$slot_duration;

        // First time
        $times[]=$start_date->format('H:i');

        for($s = 1;$s <=$slots;$s++){
            // Adding each additional to the list
            $times[]=$start_date->addMinute($slot_duration)->format('H:i');
        }

        return $times;
    }
}
