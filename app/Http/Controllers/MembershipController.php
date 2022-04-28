<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MembershipController extends Controller
{
    /**
     * @param $id
     * @return Collection
     */
    public function membershipsToId($id)
    {
        $user = Auth::user();
        $column = $user->isMedic() ? 'patient_id' : 'medic_id';

        return $user->memberships()
            ->with('patient', 'medic')
            ->where($column, $id)
            ->get();
    }

    public function create(Request $request)
    {
        Auth::loginUsingId(1);

        $user = Auth::user();
        $column = $user->isMedic() ? 'patient_id' : 'medic_id';

        $id = $request->id;

        $membership = $user->memberships()
            ->where($column, $id)
            ->first();

        if (is_null($membership)) {
            $membership = $user->memberships()->create([
                $column => $id
            ]);
        }

//        $membership = $user->memberships()->firstOrCreate([
//            $column => $id
//        ]);

        return $membership;
    }

    public function get($id)
    {
        return Auth::user()->memberships()->findOrFail($id);
    }

    /**
     * @return Collection
     */
    // list all memberships
    public function list(): Collection
    {
        return Auth::user()->memberships;
    }


    public function delete($id)
    {
        Auth::loginUsingId(1);

        Auth::user()->memberships()->findOrFail($id)->delete();
    }
}
