<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use App\Models\VehicleImage;
use App\Models\DealerVehicle;
use Illuminate\Console\Command;
use App\Mail\WinnerBiddedPerson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Mail\EveryDayEightAm as EveryDayEightAmMail;

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
        
        $dealers = User::where('role_id', '3')->where('status', 1)->get();
        $start_end_vehicle_date = Carbon::now()->format('Y-m-d');
        $vehicles = Vehicle::where('status', 1)
            ->where('start_vehicle_date', $start_end_vehicle_date)
            ->where('end_vehicle_date', $start_end_vehicle_date)
            ->get();
        $countbuyItNoVehicle = Vehicle::where('status', 1)->where('all_auction', 'all')->count();

        $allDealerVehicles = DealerVehicle::where('status', 1)
            ->with('DealerAdvertVehicleDetail')
            ->with('DealerVehicleExterior')
            ->with('DealerVehicleHistory')
            ->with('DealerVehicleInterior')
            ->with('DealerVehicleMedia')
            ->get();
        $allDealerVehicles = count($allDealerVehicles);

        foreach ($dealers as $data1) {
            // Check if it's a weekend (Saturday or Sunday)
            $currentDayOfWeek = date('l');

                if ($currentDayOfWeek === 'Sunday' || $currentDayOfWeek === 'Saturday') {
                    continue; // Skip sending the email on weekends
                }

            $data = [
                'count' => count($vehicles),
                'countbuyItNoVehicle' => $countbuyItNoVehicle,
                'allDealerVehicles' => $allDealerVehicles
            ];

            try {
                Mail::to($data1->email)->send(new EveryDayEightAmMail($data));
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                Log::error('Error sending email to ' . $data1->email . ': ' . $errorMessage);
            }
        }

        $log = Log::info('working within hour cron job');
        return "work";


        // $dealers = User::where('role_id', 3)->where('status', 1)->get();

        //     foreach ($dealers as $data) {
        //         try {
        //             Mail::to($data->email)->send(new EveryDayEightAmMail($data));
        //             $log = Log::info('Email sent to ' . $data->email);
        //         } catch (\Exception $e) {
        //             $log = Log::error('Error sending email to ' . $data->email . ': ' . $e->getMessage());
        //         }
        //     }
            
        //     $log = Log::info('Every day eight am cron job finished');
        //     return "work";

        
        // $dealers = User::where('role_id','3')->where('status',1)->get();
        
        // //   $log = Log::info($dealers);
        
        // foreach ($dealers as  $data) {
            
        //     Mail::to($data->email)->send(new EveryDayEightAmMail($data));
        // }
     
        //     $log = Log::info('working every day eight am cron job');
        // return "work";

    }
}
