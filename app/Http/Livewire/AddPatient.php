<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Medic\MembershipController;
use App\Models\User;
use App\Services\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class AddPatient extends Component
{
    public $search = '';

    /**
     * @return View
     */
    public function render()
    {
        $patients = $this->getPatients();

        return view('livewire.add-patient', [
            'patients' => $patients,
            'count' => $patients->count()
        ]);
    }

    /**
     * @return Collection
     */
    private function getPatients()
    {
        if(empty($this->search)) {
            return new Collection();
        }

        return User::with('settingsPatient', 'media')
            ->withCount([
                'memberships as active_membership' => function (Builder $query) {
                    $query->where('medic_id', Auth::user()->id);
                }
            ])
            ->where('role', User::ROLE_PATIENT)
            ->where(function (Builder $query) {
                $query->whereHas('settingsPatient', function (Builder $query) {
                    $query->where('pin', 'like', '%' . $this->search . '%');
                })
                    ->orWhere('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function addPatient(int $id)
    {
        /** @var MembershipController $membershipController */
        $membershipController = app(MembershipController::class);

        return $membershipController->create($id);
    }
}
