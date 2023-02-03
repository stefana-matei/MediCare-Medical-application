<?php

namespace App\Http\Controllers\Medic;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Specialty;
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
            'lastname' => 'required|min:2|regex:/^[a-z-\sA-Z]+$/',
            'firstname' => 'required|min:2|regex:/^[a-z-\sA-Z]+$/',
            'email' => [
                'required',
                'email:rfc',
                'max:200',
                Rule::unique('users')->ignore($user->id)
            ],

            'specialty_id' => 'required',
            'level_id' => 'required',

            'specialisation' => '',
            'skills' => '',
            'areas_of_activity' => '',
            'education' => '',
            'postgraduate_courses' => '',
            'trainings' => '',
            'international_certifications' => '',
            'publications' => '',
            'member' => '',
            'other_realizations' => '',
        ], [
            'lastname.required' => 'Câmpul pentru numele de familie trebuie completat.',
            'lastname.min' => 'Numele de familie trebuie să conțină cel puțin 2 caractere.',
            'lastname.regex' => 'Numele de familie trebuie să conțină doar litere.',
            'firstname.required' => 'Câmpul pentru prenume trebuie completat.',
            'firstname.min' => 'Prenumele trebuie să conțină cel puțin 2 caractere.',
            'firstname.regex' => 'Prenumele trebuie să conțină doar litere.',
            'email.required' => 'Câmpul pentru email trebuie completat.',
            'email.email' => 'Adresa de email este invalidă. Recompletați.',
            'email.unique' => 'Există cont asociat cu acest email. Recompletați.'
        ]);

        $userAttributes = Arr::only($validated, ['lastname', 'firstname', 'email']);
        $settingsAttributes = Arr::except($validated, ['lastname', 'firstname', 'email']);

        $user->load('settingsMedic');

        $user->update($userAttributes);
        $user->settingsMedic->update($settingsAttributes);

        return back()->withSuccess('Datele personale au fost modificate cu succes!');
    }

    /**
     * @return View
     */
    public function updateView(): View
    {
        return view('authenticated.medic.account.update', [
            'user' => Auth::user()->load('settingsMedic.specialty', 'settingsMedic.level'),
            'specialties' => Specialty::all(),
            'levels' => Level::all()
        ]);
    }

}
