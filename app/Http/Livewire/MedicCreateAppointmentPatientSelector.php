<?php

namespace App\Http\Livewire;


use Illuminate\Contracts\View\View;

class MedicCreateAppointmentPatientSelector extends AddPatient
{

    /**
     * @return View
     */
    public function render()
    {
        $patients = $this->getPatients();

        return view('livewire.medic-create-appointment-patient-selector', [
            'patients' => $patients,
            'count' => $patients->count()
        ]);
    }

    public function selectPatient(int $id)
    {
        $this->emit('selectedPatientEvent', $id);
    }

}
