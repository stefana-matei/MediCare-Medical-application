<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Medic\AppointmentController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Services\Calendar;

class UpdateAppointment extends Component
{
    public $redirectBack;
    public $appointment;
    public $confirmed;
    public $honored;
    public $hasRecord = false;
    public $record = [
        'medical_history' => '',
        'symptoms' => '',
        'diagnosis' => '',
        'clinical_data' => '',
        'para_clinical_data' => '',
        'referral' => false,
        'indications' => ''
    ];


    /** @var Carbon */
    public $date;
    public $time;

    protected $listeners = ['selectedDateEvent'];

    /**
     * Event listener for date selection
     */
    public function selectedDateEvent($value)
    {
        $this->date = Carbon::parse($value)->timezone(config('app.timezone'));
    }

    /**
     * Runs once when mounting the component
     *
     * @return void
     */
    public function mount()
    {
        $this->setProperties();
    }

    /**
     * Runs on every refresh of the component
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.update-appointment');
    }

    /**
     * Submit the form
     *
     * @return RedirectResponse
     */
    public function submit()
    {
        /** @var AppointmentController $appointmentController */
        $appointmentController = app(AppointmentController::class);

        $date = Carbon::createFromFormat('Y-m-d H:i',
            $this->date->format('Y-m-d') . ' ' . $this->time
        );

        $attributes = [
            'confirmed' => $this->confirmed,
            'honored' => $this->honored,
            'date' => $date
        ];

        $appointmentController->update($this->appointment->id, $attributes);

        $visit = $this->appointment->visit;
        $record = $this->appointment->visit?->record;
        $existingVisit = !is_null($visit);
        $existingRecord = !is_null($record);

        if ($this->honored && !$existingVisit) {
            $visit = $this->appointment->visit()->create([
                'date' => $date,
                'membership_id' => $this->appointment->membership_id
            ]);
        }

        if ($this->hasRecord) {
            if ($existingRecord) {
                // update
                $record->update($this->record);
            } else {
                // create
                $visit->record()->create(array_merge($this->record, [
                    'date_processed' => $date
                ]));
            }
        }

        session()->flash('success', 'Programarea a fost actualizată!');
        return redirect($this->redirectBack);
    }


    /**
     * Sets the properties in mount
     *
     * @return void
     */
    protected function setProperties()
    {
        $this->redirectBack = request()->headers->get('referer');

        if (is_int($this->appointment->confirmed)) {
            $this->confirmed = (bool)$this->appointment->confirmed;
        }

        $this->honored = $this->appointment->honored;
        $this->date = $this->appointment->date;

        if ($this->date->isBetween(
            $this->date->copy()->setHours(Calendar::START_HOUR)->setMinutes(0)->setSeconds(0),
            $this->date->copy()->setHours(Calendar::END_HOUR)->setMinutes(0)->setSeconds(0),
        )) {
            $this->time = $this->date->format('H:i');
        } else {
            $this->time = now()->setHours(Calendar::START_HOUR)->setMinutes(0)->format('H:i');
        }

        $this->hasRecord = !is_null($this->appointment?->visit?->record);

        if ($this->hasRecord) {
            $this->record = $this->appointment->visit->record->toArray();
        }
    }

    /**
     * @param $confirmed
     * @return void
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        if(!$this->confirmed) {
            $this->honored = false;
        }
    }

    /**
     * @param $honored
     * @return void
     */
    public function setHonored($honored)
    {
        $this->honored = $honored;
    }

    /**
     * @param $hasRecord
     * @return void
     */
    public function setHasRecord($hasRecord)
    {
        $existingRecord = !is_null($this->appointment->visit?->record);

        if (!$hasRecord && $existingRecord) {
            return;
        }

        $this->hasRecord = $hasRecord;
    }

    /**
     * @param $referral
     * @return void
     */
    public function setRecordReferral($referral)
    {
        $this->record['referral'] = $referral;
    }

}
