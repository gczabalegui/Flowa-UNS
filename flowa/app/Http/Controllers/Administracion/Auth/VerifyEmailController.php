<?php

namespace App\Http\Controllers\Administracion\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated administracion's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('administracion')->hasVerifiedEmail()) {
            return redirect()->intended(route('administracion.dashboard').'?verified=1');
        }

        if ($request->user('administracion')->markEmailAsVerified()) {
            event(new Verified($request->user('administracion')));
        }

        return redirect()->intended(route('administracion.dashboard').'?verified=1');
    }
}
