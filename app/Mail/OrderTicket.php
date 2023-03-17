<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderTicket extends Mailable
{
    use Queueable, SerializesModels;

    public \App\Models\OrderTicket $orderTicket;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\OrderTicket $orderTicket
     */
    public function __construct(\App\Models\OrderTicket $orderTicket)
    {
        $this->orderTicket = $orderTicket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заявка в лагерь')
            ->view('emails.orderTicket')
            ->with([
                'data' => [
                    'Имя' => $this->orderTicket->name,
                    'Почта' => $this->orderTicket->mail,
                    'Телефон' => $this->orderTicket->phone,
                    'Смена' => $this->orderTicket->shift
                ]
            ]);
    }
}
