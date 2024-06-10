<?php

namespace App\Http\Controllers\Auth;

use App\Models\content;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {    $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email',compact('Configuration','pages','Services'));
    }
}
