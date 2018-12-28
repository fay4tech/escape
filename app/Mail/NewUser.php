<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @param Request $request
     * @return NewUser
     */
    public function build(Request $request)
    {
        $userData = $request;
        return $this->view('mails.new_users', compact('userData'));
    }
}
