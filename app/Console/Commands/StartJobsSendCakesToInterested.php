<?php

namespace App\Console\Commands;

use App\Mail\SendCakesToInterestedMail;
use App\Models\InterestedInCakes;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class StartJobsSendCakesToInterested extends Command
{

    protected $signature = 'command:StartJobsSendCakesToInterested';

    protected $description = 'Command que inicia o disparo de emails para interessados em boos!';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $InterestedInCakes = InterestedInCakes::distinct()->get();
        foreach ($InterestedInCakes as $interestedInCake) {
            Mail::send(new SendCakesToInterestedMail($interestedInCake->lead));
        }
        return true;
    }
}
