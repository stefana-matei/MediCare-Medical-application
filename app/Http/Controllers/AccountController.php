<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Auth;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AccountController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'lastname' => 'required|min:2',
            'firstname' => 'required|min:2',
            'email' => 'required|email:rfc,dns|unique:users|max:200',
            'cnp' => 'required|size:13',
            'birthday' => 'required',
            'gender' => 'required',
            'country' => '',
            'county' => '',
            'city' => '',
            'address' => '',
            'phone' => 'required|numeric|min:9'
        ]);

        $validated['birthday'] = Carbon::createFromFormat('Y-m-d', $validated['birthday'])->midDay();

        //dd($validated);

        $userAttributes = Arr::only($validated, ['lastname', 'firstname', 'email']);
        $settingsAttributes = Arr::except($validated, ['lastname', 'firstname', 'email']);

        $user = Auth::user()->load('settingsPatient');

        $user->update($userAttributes);
        $user->settingsPatient->update($settingsAttributes);

        return back();
    }

    /**
     * @return View
     */
    public function updateView(): View
    {
        return view('authenticated.all.account.update', [
            'user' => Auth::user()->load('settingsPatient')
        ]);
    }


    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|file|max:8192'
        ]);

        Auth::user()->getMedia('avatars')->first()?->delete();
        Auth::user()->addMediaFromRequest('avatar')->toMediaCollection('avatars');

        return back();
    }
}
