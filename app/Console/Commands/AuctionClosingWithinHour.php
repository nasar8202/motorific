<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use App\Models\VehicleImage;
use App\Mail\AuctionClosingWithinHour as AuctionClosingWthinHourMail;
use Illuminate\Console\Command;
use App\Mail\WinnerBiddedPerson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class AuctionClosingWithinHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AuctionClosingWithinHour:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auction Closing Wthin 1 Hour';

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
            $dealers = User::where('role_id', 3)->where('status', 1)->get();

            foreach ($dealers as $data) {
                // Check if it's a weekend (Saturday or Sunday)
                $currentDayOfWeek = date('l');

                if ($currentDayOfWeek === 'Sunday' || $currentDayOfWeek === 'Saturday') {
                    continue; // Skip sending the email on weekends
                }

                try {
                    Mail::to($data->email)->send(new AuctionClosingWthinHourMail($data));
                    $log = Log::info('Email sent to ' . $data->email);
                } catch (\Exception $e) {
                    $log = Log::error('Error sending email to ' . $data->email . ': ' . $e->getMessage());
                }
            }

            $log = Log::info('Every day eight am cron job finished');
            return "work";

        // $dealers = User::where('role_id', '3')->where('status', 1)->get();
        // $start_end_vehicle_date = Carbon::now()->format('Y-m-d');
        
        // foreach ($dealers as $data1) {
        //     $vehicles = Vehicle::where('status', 1)
        //         ->where('start_vehicle_date', $start_end_vehicle_date)
        //         ->where('end_vehicle_date', $start_end_vehicle_date)
        //         ->get();
        
        //     $data = ['count' => count($vehicles)];
        
        //     try {
        //         Mail::to($data1->email)->send(new AuctionClosingWthinHourMail($data));
        //     } catch (\Exception $e) {
        //         $errorMessage = $e->getMessage();
        //         Log::error('Error sending email to ' . $data1->email . ': ' . $errorMessage);
        //     }
        // }
        
        // $log = Log::info('working within hour cron job');
        // return "work";

       
        // //   $log = Log::info('working within hour cron job');
        // $dealers = User::where('role_id','3')->where('status',1)->get();
        // $start_end_vehicle_date = Carbon::now()->format('Y-m-d');
        // // dd($dealers);
        // $vehicles =   Vehicle::where('status',1)->where('start_vehicle_date',$start_end_vehicle_date)
        // ->where('end_vehicle_date',$start_end_vehicle_date)->get();
        
        // foreach ($dealers as  $data1) {
        //     $data = ['count'=>count($vehicles)];
        //     Mail::to($data1->email)->send(new AuctionClosingWthinHourMail($data));
        // }
     
        //   $log = Log::info('working within hour cron job');
        // return "work";

    }
}
