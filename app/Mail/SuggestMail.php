<?php

namespace App\Mail;

use App\Models\Suggest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuggestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $suggest;

    public function __construct(Suggest $suggest)
    {
        $this->suggest = $suggest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thuongnn1304@gmail.com')
            ->view('emails.suggested')->with([
                'nameProduct' => $this->suggest->name,
            ]);;
    }
}
