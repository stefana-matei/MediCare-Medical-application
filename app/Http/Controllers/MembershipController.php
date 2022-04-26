<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * @return Collection
     */
    public function memberships(): Collection
    {
        /** @var User $user */
        $user = Auth::user();
        return $user->memberships;
    }

    /**
     * @param $id
     * @return Collection
     */
    public function membershipsToId($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $column = $user->isMedic() ? 'patient_id' : 'medic_id';

        return $user->memberships()
            ->with('patient', 'medic')
            ->where($column, $id)
            ->get();
    }
}
