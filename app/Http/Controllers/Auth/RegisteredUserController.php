<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration for patient.
     *
     * @return \Illuminate\View\View
     */
    public function createPatient()
    {
        return view('auth.register-patient');
    }

    /**
     * Display the registration for medic.
     *
     * @return \Illuminate\View\View
     */
    public function createMedic()
    {
        return view('auth.register-medic');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // TODO Remove when frontend can handle roles
        $request->mergeIfMissing(['role' => User::ROLE_PATIENT]);

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|string'
        ]);

        /** @var User $user */
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        event(new Registered($user));

        if ($user->isMedic()) {
            $user->settingsMedic()->create();
        } else {
            $user->settingsPatient()->create();
        }

        Auth::login($user);

        if ($user->isMedic()) {
            return redirect()->route('medic.updateView')->withSuccess('Contul a fost creat cu succes, continuă să adaugi datele personale.');
        } else {
            return redirect()->route('account.updateView')->withSuccess('Contul a fost creat cu succes, continuă să adaugi datele personale.');
        }
    }

    public function storeMedic(Request $request)
    {
        $request->merge(['role' => User::ROLE_MEDIC]);

        return $this->store($request);
    }

    public function storePatient(Request $request)
    {
        $request->merge(['role' => User::ROLE_PATIENT]);

        return $this->store($request);
    }
}
