<?php

namespace App\Http\Livewire;

use App\Models\Membership;
use App\Models\User;
use App\Services\Auth;
use Illuminate\Contracts\View\View;
use App\Services\Calendar;
use Illuminate\Support\Carbon;

class CreateAppointment extends UpdateAppointment
{
    public $patient;

    protected $listeners = ['selectedPatientEvent', 'selectedDateEvent'];

    /**
     * Event listener for date selection
     */
    public function selectedPatientEvent($id)
    {
        $this->patient = User::patient()->find($id);
    }

    /**
     * Runs on every refresh of the component
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.create-appointment');
    }


    protected function setProperties()
    {
        $this->date = now()->addHour()->setMinutes(0)->setSeconds(0);
        $this->time = $this->date->format('H:i');
        $this->confirmed = true;
        $this->honored = false;
    }

    /**
     * Submit the form
     *
     * @return void
     */
    public function submit()
    {
        if (is_null($this->patient)) {
            return;
        }

        $membership = Auth::user()->memberships()->firstOrCreate([
            Membership::KEY_PATIENT => $this->patient->id
        ]);

        $date = Carbon::createFromFormat('Y-m-d H:i',
            $this->date->format('Y-m-d') . ' ' . $this->time
        );

        $appointment = $membership->appointments()->create([
            'date' => $date,
            'confirmed' => $this->confirmed,
            'honored' => $this->honored
        ]);

        $this->redirectRoute('medic.appointments.list');
    }
}
