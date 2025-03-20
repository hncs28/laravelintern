<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Detail;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $detail;

    public function __construct(User $user, Detail $detail)
    {
        $this->user = $user;
        $this->detail = $detail;
    }

    public function build()
    {
        return $this->to($this->detail->email)
                    ->subject('Registration Confirmation')
                    ->view('emails.registration_confirmation');
    }
}