<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use App\Models\VehicleImage;
use App\Mail\EveryDayEightAm as EveryDayEightAmMail;
use Illuminate\Console\Command;
use App\Mail\WinnerBiddedPerson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class EveryDayEightAm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'EveryDayEightAm:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every Day Eight Am';

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
        
        $dealers = User::where('role_id','3')->where('status',1)->get();
        
        //   $log = Log::info($dealers);
        
        foreach ($dealers as  $data) {
            
            Mail::to($data->email)->send(new EveryDayEightAmMail($data));
        }
     
            $log = Log::info('working every day eight am cron job');
        return "work";

    }
}
