<?php

namespace App\Observers;
use Illuminate\Support\Facades\Mail;

class PasswordChangedObserver
{
    
    public function updated($model)
    {


        if(!$model->isPasswordChange())
        {
            return;
        }
        
        // execute when password is changed

        $mail = Mail::to($model->getRawOriginal($model->emailColumnName()));

        if($model->shouldPasswordChangedNotificationMailBeQueued()){

            $mail->send($model->passwordChangeNotificationMail());
            
            return;
            
        }
        
        // send mail  without queue 
        $mail->send($model->passwordChangeNotificationMail());
    }
}
