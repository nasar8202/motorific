<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Finance;
use App\Models\Smoking;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Jobs\SellerDetail;
use App\Models\UserDetail;
use App\Jobs\SellerDetails;
use App\Models\NumberOfKey;
use Illuminate\Support\Str;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\VehicleHistory;
use App\Models\LockingWheelNut;
use App\Models\vehicleCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Mail\SellerRegistrationEmailToAdmin;
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
        $role = Auth::user()->role_id;
        switch ($role) {

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
    public function sellerRegistrationThankyou()
    {
        return view('frontend.seller.sellerRegistrationThankyou');
    }
    public function create_user(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|string|regex:/[a-zA-Z]+$/u',
            'email' => 'required|string|email|max:50|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone_number' => 'min:9|max:16',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $zip = ($request->post_code);
        $postcode = str_replace(' ', '', $zip);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=.'$postcode'.&key=AIzaSyBc18nAlur3f5u6N1HGgckDFyWW5IfkKWk";
            DB::beginTransaction();
        try {
            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
// dd($result['results'][0]['formatted_address']);
            if (count($result['results']) != 0) {
                $password = Str::random(10);
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role_id = 2;
                $user->post_code = $postcode;
                $user->address = $result['results'][0]['formatted_address'];
                $user->mile_age = $request->mile_age;
                $user->phone_number = $request->phone_number;
                $user->password = Hash::make($password);
                $user->save();

                $credentials = [
                    'email' => $user->email,
                    'password' => $password,
                ];
                //     $abc = Auth::attempt(['email' => $user->email, 'password' => $password]);

                $details = [
                    'greeting' => $user->name,
                    'email' => $user->email,
                    'body' => $password,
                    'body1' => $user->post_code,
                    'body2' => $user->name,
                    'phone_number' => $user->phone_number,
                    'thanks' => 'Thank you for using Motorfic.com ',
                    'actionText' => 'Login',
                    'actionURL' => url('/dealer-login'),
                    'order_id' => 101
                ];

                $data = [
                    'greeting' => $user->name,
                    'email' => $user->email,
                    'body' => $password,
                    'body1' => $user->post_code,
                    'body2' => $user->name,
                    'phone_number' => $user->phone_number,
                    'thanks' => 'Thank you for using Motorfic.com ',
                    'actionText' => 'Login',
                    'actionURL' => url('/dealer-login'),
                    'order_id' => 101
                ];
                //   dd($details);
                Mail::to("nasar.ullah@oip.com.pk")->send(new SellerRegistrationEmailToAdmin($data));
                dispatch(new SellerDetail($details));
                // Notification::send($user->email, new MyFirstNotification($details));
                // $user->notify(new SellerDetailsNotification($details));
                if ($request->registeration_with_pass == "yes") {
                    if (Auth::attempt($credentials)) {
                        $currentUser = Auth::user()->id;
                        $vehicleCategories = vehicleCategories::all();
                        $VehicleFeature = VehicleFeature::all();
                        $NumberOfKeys =  NumberOfKey::where('status', 1)->get();
                        $SeatMaterials =  SeatMaterial::where('status', 1)->get();
                        $ToolPacks =  ToolPack::where('status', 1)->get();
                        $LockingWheelNuts =  LockingWheelNut::where('status', 1)->get();
                        $Smokings =  Smoking::where('status', 1)->get();
                        $VCLogBooks =  VCLogBook::where('status', 1)->get();
                        $VehicleOwners =  VehicleOwner::where('status', 1)->get();
                        $PrivatePlates =  PrivatePlate::where('status', 1)->get();
                        $Finances =  Finance::where('status', 1)->get();
                        $VehicleHistories  =  VehicleHistory::where('status', 1)->get();
                        $user = User::find($currentUser);
                        $registeration = trim($request->registeration, ' ');

                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "{\n\t\"registrationNumber\": \"$registeration\"\n}",
                            CURLOPT_HTTPHEADER => array(
                                "x-api-key: XlMDFK2cy74gg0iIBYqFT9lgP4Zrul64aRVBpQC5",
                                "Content-Type: application/json"
                            ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);
                        curl_close($curl);
                        //echo $response;
                        $res = json_decode($response);

                        //return $response;
                        // $res = $res['result'];
                        // $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
                        // $date = $res['basic_vehicle_info']['first_registration_date'];
                        if (isset($res->registrationNumber)) {
                            $milage = $request->millage;

                            // $res = Http::withHeaders([
                            //     'accept' => 'application/json',
                            //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
                            // ])
                            // ->get("https://api.oneautoapi.com/autotrader/inventoryaugmentationfromvrm?vehicle_registration_mark=$registeration")
                            // ->json();
                            // if($res['success'] == 'false'){
                            //     return back()->with('error','Record not found');
                            // }
                            // $res = $res['result'];
                            // $id = $res['basic_vehicle_info']['autotrader_derivative_id'];
                            // $date = $res['basic_vehicle_info']['first_registration_date'];
                            //$milage = $request->millage;
                            // $milage= Http::withHeaders([
                            //     'accept' => 'application/json',
                            //     'authorizationToken' => '516b68e3-4165-4787-991b-052dbd23543f',
                            // ])
                            // ->get("https://api.oneautoapi.com/autotrader/valuationfromid?autotrader_derivative_id=$id&first_registration_date=$date&current_mileage=$check_millage")
                            // ->json();
                            // $milage = $milage['result'];
                            return view('frontend.seller.photoUpload', compact('milage', 'res', 'vehicleCategories', 'VehicleFeature', 'NumberOfKeys', 'SeatMaterials', 'ToolPacks', 'LockingWheelNuts', 'Smokings', 'VCLogBooks', 'VehicleOwners', 'PrivatePlates', 'Finances','VehicleHistories', 'user'));
                                DB::commit();
                        } else {
                            return back()->with('error', 'Record not found');
                        }
                    } else {
                        DB::commit();

                        return redirect()->route('seller')->with('success', 'Register Successfully!');
                    }
                } else {
                    DB::commit();

                    return view('frontend.seller.sellerRegistrationThankYou');
                    //return redirect()->route('sellerRegistrationThankyou')->with('success', 'Register Successfully. Check Your Email For Password To Login!');
                }
            } else {
                return back()->with('error', 'Enter The Right Post Code');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            if(isset($e)){
                  return $e;
                return back()->with('error', 'Something went wrong!');

            }else{

                return back()->with('error', 'Enter The Right Post Code');
            }
        }
    }
}
