<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends VerifyEmail
{
    protected function verificationUrl($notifiable)
    {
        // Determine the base route based on user role
        $prefix = $notifiable->role === 'case owner' ? 'caseowner' :
            ($notifiable->role === 'talent' ? 'talent' :
                ($notifiable->role === 'reviewer' ? 'reviewer' : ''));

        if (empty($prefix)) {
            return parent::verificationUrl($notifiable); // Fallback to default
        }

        return URL::temporarySignedRoute(
            "$prefix.verification.verify", // e.g., "caseowner.verification.verify"
            Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
