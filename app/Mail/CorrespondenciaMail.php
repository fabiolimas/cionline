<?php
namespace App\Mail;

use App\Models\Correspondencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorrespondenciaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ci;

    public function __construct(Correspondencia $ci)
    {
        $this->ci = $ci;
    }

    public function build()
    {
        return $this->subject('Nova Correspondência Recebida')
                    ->markdown('emails.correspondencia');
    }
}
