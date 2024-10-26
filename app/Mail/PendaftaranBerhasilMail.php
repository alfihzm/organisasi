<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranBerhasilMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    public function build()
    {
        return $this->subject('HIMSI OPEN RECRUITMENT 2024')
            ->view('emails.pendaftaran_berhasil_mail')
            ->with([
                'nama'     => $this->participant->full_name,
                'nim'      => $this->participant->NIM,
                'email'    => $this->participant->email,
                'password' => $this->participant->whatsapp,
            ]);
    }

    // You can safely remove or comment out these methods
    // as they are redundant in this case.

    /*
    public function envelope()
    {
        return new Envelope(
            subject: 'Test Email',
        );
    }

    public function content()
    {
        return new Content(
            view: 'view.name', // This is where the error occurs
        );
    }

    public function attachments()
    {
        return [];
    }
    */
}