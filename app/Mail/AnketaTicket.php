<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnketaTicket extends Mailable
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
        $this->layoutSettings = Setting::all()->keyBy('key');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заявка в лагерь')
            ->view('emails.anketaTicket')
            ->with([
                'data' => [
                    'Имя' => $this->orderTicket->name,
                    'Почта' => $this->orderTicket->mail,
                    'Телефон' => $this->orderTicket->phone,
                    'Смена' => $this->orderTicket->shift,
                ],
                'settings'=> $this->getLayoutSettings(),
            ]);
    }
    public function getLayoutSettings()
    {
        return $this->layoutSettings;
    }
}
