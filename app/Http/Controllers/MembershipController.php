<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class MembershipController extends Controller
{
    /**
     * @return Collection
     */
    // list all of memberships
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

    public function create(Request $request)
    {
        Auth::loginUsingId(1);

        /** @var User $user */
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
        /** @var User $user */
        $user = Auth::user();

        return $user->memberships()->findOrFail($id);
    }

    public function delete($id)
    {
        Auth::loginUsingId(1);

        Auth::user()->memberships()->findOrFail($id)->delete();
    }

}
