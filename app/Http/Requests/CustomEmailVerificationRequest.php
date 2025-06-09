<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Auth\EmailVerificationRequest as BaseEmailVerificationRequest;

class CustomEmailVerificationRequest extends BaseEmailVerificationRequest
{
    public function fulfill()
    {
        $user = $this->user();
        $prefix = $user->role === 'case owner' ? 'caseowner' :
            ($user->role === 'talent' ? 'talent' :
                ($user->role === 'reviewer' ? 'reviewer' : null));

        if ($prefix) {
            $user->markEmailAsVerified();
            return redirect()->route("$prefix.dashboard");
        }

        parent::fulfill(); // Fallback to default behavior
    }
}
