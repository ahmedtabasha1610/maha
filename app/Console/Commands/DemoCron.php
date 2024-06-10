<?php

namespace App\Console\Commands;

use App\Models\Purchase;
use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        // \Log::info("Cron is working fine!");
        //كل 24 ساعة يتم انقاص عدد الايام بمقدار 1
        $purchase=Purchase::latest()->simplepaginate(10);
        foreach($purchase as $r){
            if($r->status=='completed' and $r->confirm=='no'){
                $p= Purchase::find($r->id);
                $p->day=$p->day-1;
                $p->save();
            }
        }


    }
}
