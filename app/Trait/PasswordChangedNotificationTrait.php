<?php 

namespace App\Trait;

use Illuminate\Mail\Mailable;
use App\Mail\PasswordChangedNotificationMail;

trait PasswordChangedNotificationTrait
{

    

    public static function booted()
    {
        static::observe(PasswordChangedObserver::class);
    }


    public function isPasswordChange():bool
    {
        return $this->wasChanged($this->passwordColumnName());
    }

    public function passwordColumnName():string
    {
        return 'password';
    }

    public function emailColumnName():string
    {
        return 'email';
        
    }

    public function passwordChangeNotificationMail(): Mailable
    {
        return new PasswordChangedNotificationMail;
    }


    public function shouldPasswordChangedNotificationMailBeQueued():bool
    {
       return false;
    }
}