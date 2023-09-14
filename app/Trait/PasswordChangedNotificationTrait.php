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

    public function sendPasswordChangedNotification(): void
    {
        if(!$this->isPasswordChange())
        {
            return;
        }
        
        // execute when password is changed

        $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

        if($this->shouldPasswordChangedNotificationMailBeQueued()){

            $mail->send($this->passwordChangeNotificationMail());
            
            return;
            
        }
        
        // send mail  without queue 
        $mail->send($model->passwordChangeNotificationMail());
    }
}