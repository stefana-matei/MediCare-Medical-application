<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * @return Collection
     */
    public function visits(): Collection
    {
        /** @var User $user */
        $user = Auth::user();
        return $user->visits;
    }

    /**
     * @param $id
     * @return Collection
     */
    public function visitsToId($id): Collection
    {
        /** @var User $user */
        $user = Auth::user();
        $column = $user->isMedic() ? 'patient_id' : 'medic_id';

        return $user->visits()->where($column, $id)->get();
    }

}
