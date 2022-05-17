<?php

namespace App\Http\Controllers;

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
        return view('authenticated.all.account.update');
    }
}
