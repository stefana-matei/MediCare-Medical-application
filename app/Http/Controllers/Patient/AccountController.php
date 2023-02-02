<?php

namespace App\Http\Controllers\Patient;

use App\Services\Auth;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'lastname' => 'required|min:2',
            'firstname' => 'required|min:2',
            'email' => [
                'required',
                'email:rfc,dns',
                'max:200',
                Rule::unique('users')->ignore($user->id)
            ],
            'pin' => [
                'required',
                'size:13',
                Rule::unique('settings_patient')->ignore($user->id)
            ],
            'birthday' => 'required',
            'gender' => 'required',
            'country' => '',
            'county' => '',
            'city' => '',
            'address' => '',
            'phone' => 'required|numeric|min:9'
        ], [
            'lastname.required' => 'Câmpul pentru numele de familie trebuie completat.',
            'lastname.min' => 'Numele de familie trebuie să conțină cel puțin 2 caractere.',
            'firstname.required' => 'Câmpul pentru prenume trebuie completat.',
            'firstname.min' => 'Prenumele trebuie să conțină cel puțin 2 caractere.',
            'email.required' => 'Câmpul pentru email trebuie completat.',
            'email.unique' => 'Există cont asociat cu acest email. Recompletați.',
            'email.email' => 'Adresa de email este invalidă. Recompletați.',
            'pin.required' => 'Câmpul pentru CNP trebuie completat.',
            'pin.size' => 'Câmpul CNP trebuie să conțină 13 caractere.',
            'pin.unique' => 'CNP-ul introdus trebuie să fie unic. Recompletați câmpul.',
            'birthday.required' => 'Câmpul pentru data nașterii trebuie completat.',
            'gender.required' => 'Câmpul pentru sex trebuie completat.',
            'phone.required' => 'Câmpul pentru număr de telefon trebuie completat.'
        ]);

        $validated['birthday'] = Carbon::createFromFormat('Y-m-d', $validated['birthday'])->midDay();

        $userAttributes = Arr::only($validated, ['lastname', 'firstname', 'email']);
        $settingsAttributes = Arr::except($validated, ['lastname', 'firstname', 'email']);

        $user->load('settingsPatient');

        $user->update($userAttributes);
        $user->settingsPatient->update($settingsAttributes);

        return back()->withSuccess('Datele personale au fost modificate cu succes!');
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

        $oldAvatar = Auth::user()->getMedia('avatars')->first();
        $hadOldAvatar = !is_null($oldAvatar);

        $oldAvatar?->delete();
        Auth::user()->addMediaFromRequest('avatar')->toMediaCollection('avatars');

        if ($hadOldAvatar) {
            $successMessage = 'Poza de profil a fost schimbata cu succes!';
        } else {
            $successMessage = 'Poza de profil a fost adaugata cu succes!';
        }

        return back()->withSuccess($successMessage);

    }


    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($validated['old_password'], Auth::user()->getAuthPassword())) {
            return back()->withErrors(['old_password' => 'Parola veche este gresita!']);
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return back()->withSuccess('Parola a fost schimbata cu succes!');
    }
}
