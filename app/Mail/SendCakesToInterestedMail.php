<?php

namespace App\Mail;

use App\Models\Cake;
use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCakesToInterestedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    public function build()
    {
        $cakes = $this->lead->cakesILike;
        return $this->to($this->lead->email, "Sr.Cliente")
            ->subject("Bolos da Dona Zeze!")
            ->view('emails.sendCakesToInterested', compact("cakes"));
    }
}
