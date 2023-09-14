<?php

namespace App\Contracts;

use Illuminate\Contracts\Mail\Mailable;

interface PasswordChangedNotificationContract
{

    public function isPasswordChange(): bool;
    public function passwordColumnName(): string;
    public function emailColumnName(): string;
    public function passwordChangeNotificationMail(): Mailable;
    public function shouldPasswordChangedNotificationMailBeQueued(): bool;
}
