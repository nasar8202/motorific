<?php

namespace App\Console\Commands;

use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\BidedVehicle;
use Illuminate\Console\Command;
use App\Mail\WinnerBiddedPerson;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleImage;

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
    //    $user =  DB::table('vehicles')
    //         ->where('id', 16)
    //         ->update(['status' => 2]);
            // BidedVehicle::where('status',null)->first();
            $start_end_vehicle_date = Carbon::now()->format('Y-m-d');
            // echo $start_end_vehicle_date;
            // die;
           $vehicles =   Vehicle::where('status',1)->where('start_vehicle_date',$start_end_vehicle_date)
           ->where('end_vehicle_date',$start_end_vehicle_date)->get();

           foreach($vehicles as $vehicle)
           {
                $vehicle->status = 1;
                $vehicle->save();
                //  $bidded[] =  BidedVehicle::select('id','vehicle_id','bid_price','user_id','status')->where('vehicle_id',$vehicle->id)->max('bid_price');
                //  $bidded[] =  DB::table('bided_vehicles')->whereNull('deleted_at')->where('vehicle_id',$vehicle->id)->max('bid_price');
                // $maxprice[] =  DB::table('bided_vehicles')->select('*')->where('vehicle_id','=',$vehicle->id)->max('bid_price');

                $BidedVehicle = BidedVehicle::where('vehicle_id',$vehicle->id)
                ->groupBy('id','status','user_id','vehicle_id')
                ->first(['id','status','vehicle_id','user_id', DB::raw('max(bid_price) as max_bid_price')]);
                $BidedVehicle->status = 1;
                $BidedVehicle->save();
                $user= User::find($BidedVehicle->user_id);
                $vehicleImage= VehicleImage::where('vehicle_id',$vehicle->id)->first();
// echo $vehicleImage->front;
                // $user = User::where('role_id',1)->first();
                $data = ([
                            'name' => $user->name,
                            'email' => $user->email,
                             'bidded_price'=>$BidedVehicle->max_bid_price,
                             'vehicle_registration'=>$vehicle->vehicle_registartion_number,
                             'vehicle_name'=>$vehicle->vehicle_name,
                             'vehicle_mileage'=>$vehicle->vehicle_mileage,
                             'front'=>$vehicleImage->front
                            ]);
                Mail::to($user->email)->send(new WinnerBiddedPerson($data));
           }

        //    foreach($BidedVehicle as $bid){
        //             $user_id = $bid[0]['user_id'];
        //             $users[] = User::where('id',$user_id)->first();
        //             $bid[0]['status'] = 1;
        //             $bid[0]->save();

        //    }

        //    foreach($users as $user)
        //    {
        //         $data = ([
        //         'name' => $user->name,
        //         'email' => $user->email,
        //        //  'bidded_price'=>$bidded
        //         ]);
        //         Mail::to($user->email)->send(new WinnerBiddedPerson($data));
        //    }
        //   return $vehicles;
       // return 's';
            // $user = User::where('role_id',1)->first();

        // return "ates";


        //\Log::info($mytime);
        //return 0;
    }
}
