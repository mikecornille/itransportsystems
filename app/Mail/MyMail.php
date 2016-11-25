<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Load;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $load;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Load $load)
    {
    $this->load = $load;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

    
        return $this->from('mikecornille@gmail.com')
                ->view('email.mymail');
    }
}
