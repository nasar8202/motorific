<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Jobs\SellerDetail;
use App\Jobs\SellerDetails;
use App\Models\NumberOfKey;
use Illuminate\Support\Str;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Models\vehicleCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\SellerDetailsNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
   protected $redirectTo;
   public function redirectTo()
   {
    $role =Auth::user()->role_id;
       switch($role){

           case 1:
               $this->redirectTo = 'admin/dashboard';
               return $this->redirectTo;
               break;

            case 2:
                $this->redirectTo = 'seller/dashboard';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = 'dealer/dashboard';
                return $this->redirectTo;
                break;
           default:
               $this->redirectTo = '/login';
               return $this->redirectTo;
       }

       // return $next($request);
   }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     $password = Str::random(10);
    //      $user = new User;
    //      $user->name = $data['name'];
    //      $user->email = $data['email'];
    //      $user->role_id = 2;
    //      $user->post_code = $data['post_code'];
    //      $user->mile_age = $data['mile_age'];
    //      $user->phone_number = $data['phone_number'];
    //      $user->password = Hash::make($password);
    //      $user->save();
    //     //  $credentials = [
    //     //      'email' => $user->email,
    //     //      'password' => $password,
    //     //     ];
    //     //     $abc = Auth::attempt(['email' => $user->email, 'password' => $password]);
    //     //     dd($abc);
    
    //     // if (Auth::attempt($credentials)) {
    //     //     return redirect()->route('photoUpload');
    //     // }
    //     return $user;
    // }
    public function create_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        try{
            
        $password = Str::random(10);
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role_id = 2;
         $user->post_code = $request->post_code;
         $user->mile_age = $request->mile_age;
         $user->phone_number = $request->phone_number;
         $user->password = Hash::make($password);
         $user->save();
         $credentials = [
             'email' => $user->email,
             'password' => $password,
            ];
        //     $abc = Auth::attempt(['email' => $user->email, 'password' => $password]);
            // dd($user);
        $details = [
            'greeting' => $user->name,
            'email'=>$user->email,
            'body' => $password ,
            'body1' => $user->post_code,
            'body2' => $user->name,
            'phone_number' => $user->phone_number,
            'thanks' => 'Thank you for using Motorfic.com ',
            'actionText' => 'Login',
            'actionURL' => url('/dealer-login'),
            'order_id' => 101
        ];
//   dd($details);
        dispatch(new SellerDetail($details));
        // Notification::send($user->email, new MyFirstNotification($details));
        // $user->notify(new SellerDetailsNotification($details));
        if (Auth::attempt($credentials)) {
        if($request->registeration_with_pass == "yes"){
                $currentUser = Auth::user()->id;

        $vehicleCategories = vehicleCategories::all();
        $VehicleFeature = VehicleFeature::all();
        $NumberOfKeys =  NumberOfKey::where('status',1)->get();
        $SeatMaterials =  SeatMaterial::where('status',1)->get();
        $ToolPacks =  ToolPack::where('status',1)->get();
        $LockingWheelNuts =  LockingWheelNut::where('status',1)->get();
        $Smokings =  Smoking::where('status',1)->get();
        $VCLogBooks =  VCLogBook::where('status',1)->get();
        $VehicleOwners =  VehicleOwner::where('status',1)->get();
        $PrivatePlates =  PrivatePlate::where('status',1)->get();
        $Finances =  Finance::where('status',1)->get();
        $user = User::find($currentUser);
        $registeration = trim($request->registeration,' ');
        $res = Http::withHeaders([
            'accept' => 'application/json',
            'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        ])
        ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
        ->json();
        // if($res['success'] == 'false'){
        //     return back()->with('error','Record not found');
        // }
        $res = $res['result'];
        $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
        $date = $res['basic_vehicle_info']['first_registration_date'];
        $check_millage = $request->millage;
        $milage= Http::withHeaders([
            'accept' => 'application/json',
            'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
        ])
        ->get("https://api.oneautoapi.com/autotrader/valuationfromid?autotrader_derivative_id=$id&first_registration_date=$date&current_mileage=$check_millage")
        ->json();
        $milage = $milage['result'];
        return view('frontend.seller.photoUpload',compact('milage','check_millage','res','vehicleCategories','VehicleFeature','NumberOfKeys','SeatMaterials','ToolPacks','LockingWheelNuts','Smokings','VCLogBooks','VehicleOwners','PrivatePlates','Finances','user'));
            }
            else{
                return redirect()->route('seller')->with('success','Register Successfully!');
            }
        }
    }catch(\Exception $e)
    {
       //return $e;
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    }
}
