<?php

namespace App\Http\Controllers\Administracion\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user('administracion')->hasVerifiedEmail()
                    ? redirect()->intended(route('administracion.dashboard'))
                    : view('administracion.auth.verify-email');
    }
}
