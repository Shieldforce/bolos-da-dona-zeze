<?php

namespace App\Console\Commands;

use App\Jobs\JobSendMailCakes;
use App\Models\Cake;
use Illuminate\Console\Command;

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

        $cakesWithPositeStock = Cake::whereHas("stock", function ($stock) {
            $stock->where("amount", ">", 0);
        })->with("interested")->get();

        foreach ($cakesWithPositeStock as $cake) {

            foreach ($cake->interested as $lead) {
                JobSendMailCakes::dispatch($lead);
            }

        }

        return true;
    }
}
