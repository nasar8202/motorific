<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\frontend\seller\FrontController;
use App\Http\Controllers\frontend\seller\SellerDashboardController;

use App\Http\Controllers\backend\admin\AdminDashboardController;
use App\Http\Controllers\backend\admin\VehicleController;
use App\Http\Controllers\backend\superadmin\SuperAdminDashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
//  });
Route::get('/register-step-1', [FrontController::class, 'createStep1'])->name('signup');
Route::post('/register-post-step-1', [FrontController::class,'PostcreateStep1'])->name('register.post.step.1');
Route::get('/register-create-step-2', [FrontController::class,'createStep2'])->name('register.create.step.2');
Route::post('/register-post-step-2', [FrontController::class,'PostcreateStep2'])->name('register.post.step.2');
Route::get('/register-create-step-3', [FrontController::class,'createStep3'])->name('register.create.step.3');
Route::post('/register-post-step-3', [FrontController::class,'PostcreateStep3'])->name('register.post.step.3');

Route::post('/store', [FrontController::class,'store'])->name('store');
// Route::get('/data', [FrontController::class,'index'])->name('index');


Route::get('/', [FrontController::class,'index'])->name('index');
Route::post('/users', [FrontController::class,'getUsers'])->name('users');
Route::get('/usersss', [FrontController::class,'getUsers'])->name('usersss');
Route::get('/photo-upload', [FrontController::class,'photoUpload'])->name('photoUpload');
Route::get('/registration', [FrontController::class,'registration'])->name('registration');
Route::get('/seller-login', [FrontController::class,'myLogin'])->name('myLogin');
Route::get('/valuation', [FrontController::class,'valuation'])->name('valuation');
Route::get('/sell-my-car', [FrontController::class,'sellMyCar'])->name('sellMyCar');

// start admin panel routes
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class,'admin'])->name('admin');
    Route::get('/dealers', [AdminDashboardController::class,'viewDealers'])->name('ViewDealers');
    Route::get('/approve-dealer/{id}', [AdminDashboardController::class,'approveDealer'])->name('dealer.approve');
    Route::get('/block-dealer/{id}', [AdminDashboardController::class,'blockDealer'])->name('dealer.block');

    Route::get('/approved-dealers-list', [AdminDashboardController::class,'approvedDealersByAdmin'])->name('dealer.approvedDealersByAdmin');
    Route::get('/block-dealers-list', [AdminDashboardController::class,'blockDealersByAdmin'])->name('dealer.blockDealersByAdmin');

    // vehicle
    Route::get('/view-vehicle-features', [VehicleController::class,'ViewVehicleFeatures'])->name('ViewVehicleFeatures');
    Route::get('/add-vehicle-feature', [VehicleController::class,'createVehicleFeatureForm'])->name('createVehicleFeatureForm');
    Route::post('/store-vehicle-feature', [VehicleController::class, 'store'])->name('addVehicleFeature');
    Route::get('/edit-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeatureForm'])->name('vehicleFeature.edit');
    Route::post('/update-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeature'])->name('editVehicleFeature');
    Route::get('/delete-vehicle/{id}', [VehicleController::class,'deleteVehicle'])->name('vehicleFeature.delete');
    // end vehicle

    // seat material
    // vehicle
    Route::get('/view-seat-materials', [VehicleController::class,'ViewSeatMaterials'])->name('ViewSeatMaterials');
    Route::get('/add-seat-material', [VehicleController::class,'createSeatMaterialForm'])->name('createSeatMaterialForm');
    Route::post('/store-seat-material', [VehicleController::class, 'storeSeatMaterial'])->name('addSeatMaterial');
    Route::get('/edit-seat-material/{id}', [VehicleController::class,'editSeatMaterialForm'])->name('editSeatMaterial.edit');
    Route::post('/update-seat-material/{id}', [VehicleController::class,'updateSeatMaterial'])->name('updateSeatMaterial');

    Route::get('/delete-seat-material/{id}', [VehicleController::class,'deleteSeatMaterial'])->name('deleteSeatMaterial.delete');

    // end seat material
});

// end admin panel routes

// start seller panel routes
Route::group(['prefix' => 'seller','middleware'=>['auth','seller']], function () {
    Route::get('/', [SellerDashboardController::class,'seller'])->name('seller');


});

// end seller panel routes

Route::group(['prefix' => 'superadmin','middleware'=>['auth','superadmin']], function () {
//Route::name('superadmin')->prefix('superadmin')->middleware('superadmin')->group(function () {

    Route::get('/superadmin', [SuperAdminDashboardController::class,'superadmin'])->name('superadmin');
    Route::get('/dashboard', [SuperAdminDashboardController::class,'superadmin'])->name('dashboard');
    Route::get('/create-role', [SuperAdminDashboardController::class,'RoleForm'])->name('RoleForm');
    Route::post('/store',  [SuperAdminDashboardController::class,'store'])->name('store');
    Route::get('/view-role',  [SuperAdminDashboardController::class,'ViewRole'])->name('ViewRole');
    Route::get('/edit/{id}',  [SuperAdminDashboardController::class,'EditRoleForm'])->name('EditRoleForm');
    Route::post('/update/{id}',  [SuperAdminDashboardController::class,'update'])->name('update');
    Route::get('/delete/{id}',  [SuperAdminDashboardController::class,'delete'])->name('Delete');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

