<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use App\Models\VehicleImage;
use Illuminate\Console\Command;
use App\Mail\WinnerBiddedPerson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SellVehicleCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SellVehicleCron:cron';

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

            $start_end_vehicle_date = Carbon::now()->format('Y-m-d');

            $vehicles =   Vehicle::where('status',1)->where('start_vehicle_date',$start_end_vehicle_date)
            ->where('end_vehicle_date',$start_end_vehicle_date)->get();
            if(count($vehicles)>0)
            {
                foreach($vehicles as $vehicle)
                {
                    // $vehicle->status = 2;
                    // $vehicle->save();
                    // print_r($vehicle);
                    // die();

                 $BidedVehicle = BidedVehicle::where('vehicle_id',$vehicle->id)
                 ->groupBy('id','status','user_id','vehicle_id')
                 ->first(['id','status','vehicle_id','user_id', DB::raw('max(bid_price) as max_bid_price')]);
                if($BidedVehicle == null || $BidedVehicle != null){

                       if($BidedVehicle == null){
                                $vehicle->status = 0;
                                $vehicle->save();
                       }else{
                                $BidedVehicle->status = 1;
                                $BidedVehicle->save();


                                $user= User::find($BidedVehicle->user_id);
                                $vehicleImage= VehicleImage::where('vehicle_id',$vehicle->id)->first();

                                $data = ([
                                            'name' => $user->name,
                                            'email' => $user->email,
                                            'bidded_price'=>$BidedVehicle->max_bid_price,
                                            'vehicle_registration'=>$vehicle->vehicle_registartion_number,
                                            'vehicle_name'=>$vehicle->vehicle_name,
                                            'vehicle_mileage'=>$vehicle->vehicle_mileage,
                                            'front'=>$vehicleImage->front
                                        ]);
                                $vehicle->status = 2;
                                $vehicle->save();
                                Mail::to($user->email)->send(new WinnerBiddedPerson($data));
                       }
                }


            }

        }else{
               Log::info("error1");
           }


    }
}
