<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $num;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($num,$data)
    {
        $this->num = $num;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->num === 1){
            return $this->view('emails.contactAdmin')
                ->from('EducateYourself@no-reply.com')
                ->with([
                    'prenom' => $this->data['prenom'],
                    'nom' => $this->data['nom'],
                    'email' => $this->data['email'],
                    'lien' => $this->data['lien'],
                    'confirmation_token' => $this->data['confirmation_token']
                ]);
        }elseif ($this->num === 2){
            return $this->view('emails.contactUser')
                ->from('EducateYourself@no-reply.com')
                ->with([
                    'prenom' => $this->data['prenom'],
                    'nom' => $this->data['nom'],
                    'email' => $this->data['email'],
                    'password' =>'password',
                    'lien' => $this->data['lien'],
                    'confirmation_token' => $this->data['confirmation_token']
                ]);
        }
    }
}
