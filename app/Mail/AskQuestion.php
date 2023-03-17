<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskQuestion extends Mailable
{
    use Queueable, SerializesModels;

    public \App\Models\AskQuestion $askQuestion;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\AskQuestion $askQuestion
     */
    public function __construct(\App\Models\AskQuestion $askQuestion)
    {
        $this->askQuestion = $askQuestion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Комок: Задать вопрос')
            ->view('emails.askQuestion')
            ->with([
                'data' => [
                    'Имя' => $this->askQuestion->name,
                    'Почта' => $this->askQuestion->mail,
                    'Вопрос' => $this->askQuestion->text
                ]
            ]);
    }
}
