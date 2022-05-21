<?php

namespace App\Http\Controllers;

use App\Services\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function update()
    {

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
