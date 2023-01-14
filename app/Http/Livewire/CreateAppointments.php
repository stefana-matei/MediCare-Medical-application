<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class CreateAppointments extends Component
{
    /** @var Collection */
    public $medics;

    public $selectedMedic;
    public $selectedSpecialty;
    public $selectedDate;

    protected $listeners = ['specialtySelectedEvent', 'selectedDateEvent'];

    /**
     * Event listener for specialty selection
     */
    public function specialtySelectedEvent($value)
    {
        if ($value == 0) {
            $this->selectedSpecialty = null;
            return;
        }
        $this->selectedSpecialty = $value;
    }

    /**
     * Event listener for date selection
     */
    public function selectedDateEvent($value)
    {
        $this->selectedDate = Carbon::parse($value)->timezone(config('app.timezone'));
    }

    /**
     * Renders the component
     */
    public function render()
    {
        $this->setMedics();
        $this->setPresetDate();

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

        $this->medics = User::medic()
            ->with('settingsMedic.specialty', 'settingsMedic.level', 'media')
            ->whereHas('settingsMedic', function($query){
                $query->where('specialty_id', $this->selectedSpecialty);
            })
            ->get();
    }


    protected function setPresetDate()
    {
        $presetDate = old('date');

        if (empty($presetDate) && empty($this->selectedDate)) {
            $this->selectedDate = today();
        } else {
            $this->selectedDate = \Carbon\Carbon::createFromFormat('d-m-Y', $presetDate ?? $this->selectedDate->format('d-m-Y'))->startOfDay();
        }
    }

    public function selectMedic($id)
    {
        $this->selectedMedic = $this->medics->where('id', $id)->first();
    }
}
