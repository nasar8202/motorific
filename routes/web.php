<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\backend\admin\VehicleController;
use App\Http\Controllers\frontend\seller\FrontController;
use App\Http\Controllers\frontend\dealer\MultiStepRegistration;
use App\Http\Controllers\backend\admin\AdminDashboardController;

use App\Http\Controllers\backend\admin\Categories\VehicleCategory;
use App\Http\Controllers\backend\admin\userdetails\UserController;
use App\Http\Controllers\frontend\dealer\DealerDashboardController;
use App\Http\Controllers\frontend\seller\SellerDashboardController;
use App\Http\Controllers\backend\admin\Categories\VehicleCategories;
use App\Http\Controllers\backend\admin\vehicle\ManageVehicleController;
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
// start multi step registration for dealer
Route::get('/register-step-1', [MultiStepRegistration::class, 'createStep1'])->name('signup');
Route::post('/register-post-step-1', [MultiStepRegistration::class,'PostcreateStep1'])->name('register.post.step.1');
Route::get('/register-create-step-2', [MultiStepRegistration::class,'createStep2'])->name('register.create.step.2');
Route::post('/register-post-step-2', [MultiStepRegistration::class,'PostcreateStep2'])->name('register.post.step.2');
Route::get('/register-create-step-3', [MultiStepRegistration::class,'createStep3'])->name('register.create.step.3');
Route::post('/register-post-step-3', [MultiStepRegistration::class,'PostcreateStep3'])->name('register.post.step.3');
Route::post('/store', [MultiStepRegistration::class,'store'])->name('store');
// Route::get('/data', [FrontController::class,'index'])->name('index');

// end multi step registration for dealer

// start dealer login

Route::get('/dealer-login', [MultiStepRegistration::class, 'DealerLogin'])->name('DealerLogin');


// end dealer login

// Route::get('/register-step-1', [FrontController::class, 'createStep1'])->name('signup');
// Route::post('/register-post-step-1', [FrontController::class,'PostcreateStep1'])->name('register.post.step.1');
// Route::get('/register-create-step-2', [FrontController::class,'createStep2'])->name('register.create.step.2');
// Route::post('/register-post-step-2', [FrontController::class,'PostcreateStep2'])->name('register.post.step.2');
// Route::get('/register-create-step-3', [FrontController::class,'createStep3'])->name('register.create.step.3');
// Route::post('/register-post-step-3', [FrontController::class,'PostcreateStep3'])->name('register.post.step.3');
// Route::post('/store', [FrontController::class,'store'])->name('store');


Route::get('/', [FrontController::class,'index'])->name('index');
Route::post('/users', [FrontController::class,'getUsers'])->name('users');
//Route::get('/usersss', [FrontController::class,'getUsers'])->name('usersss');
Route::get('/photo-upload', [FrontController::class,'photoUpload'])->name('photoUpload');
Route::post('/vehicle_information', [FrontController::class,'vehicleInformation'])->name('vehicleInformation');
Route::get('/test_location', [FrontController::class,'testlocation'])->name('testlocation');
Route::get('/registration', [FrontController::class,'registration'])->name('registration');
Route::get('/seller-login', [FrontController::class,'myLogin'])->name('myLogin');
Route::get('/valuation', [FrontController::class,'valuation'])->name('valuation');
Route::get('/sell-my-car', [FrontController::class,'sellMyCar'])->name('sellMyCar');


// start admin panel routes
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class,'admin'])->name('admin');
    Route::get('/requests-dealers', [AdminDashboardController::class,'viewDealers'])->name('ViewDealers');
    Route::get('/approve-dealer/{id}', [AdminDashboardController::class,'approveDealer'])->name('dealer.approve');
    Route::post('/approve-dealer', [AdminDashboardController::class,'approveRequestDocuments'])->name('dealer.approveRequestDocuments');
    Route::get('/block-dealer/{id}', [AdminDashboardController::class,'blockDealer'])->name('dealer.block');
    Route::get('/view-dealer-details/{id}', [AdminDashboardController::class,'viewDealerDetails'])->name('viewDealerDetails');

    Route::get('/approved-dealers-list', [AdminDashboardController::class,'approvedDealersByAdmin'])->name('dealer.approvedDealersByAdmin');
    Route::get('/block-dealers-list', [AdminDashboardController::class,'blockDealersByAdmin'])->name('dealer.blockDealersByAdmin');

    // vehicle
    Route::get('/view-vehicle-features', [VehicleController::class,'ViewVehicleFeatures'])->name('ViewVehicleFeatures');
    Route::get('/add-vehicle-feature', [VehicleController::class,'createVehicleFeatureForm'])->name('createVehicleFeatureForm');
    Route::post('/store-vehicle-feature', [VehicleController::class, 'store'])->name('addVehicleFeature');
    Route::get('/edit-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeatureForm'])->name('vehicleFeature.edit');
    Route::post('/update-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeature'])->name('editVehicleFeature');
    Route::get('/delete-vehicle/{id}', [VehicleController::class,'deleteVehicle'])->name('deleteVehicle');
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

    // number of keys
    Route::get('/view-number-of-keys', [VehicleController::class,'ViewNumberOfkeys'])->name('ViewNumberOfkeys');
    Route::get('/add-number-of-keys', [VehicleController::class,'createNumberOfkeysForm'])->name('createNumberOfkeysForm');
    Route::post('/store-keys', [VehicleController::class, 'storeNumberOfKeys'])->name('storeNumberOfKeys');
    Route::get('/edit-Keys/{id}', [VehicleController::class,'editKeysForm'])->name('editKeysForm');
    Route::post('/update-Keys/{id}', [VehicleController::class,'updateKey'])->name('updateKey');
    Route::get('/delete-key/{id}', [VehicleController::class,'deleteKey'])->name('deleteKey');

    // end number of keys

    // Tool Pack
    Route::get('/view-tool-pack', [VehicleController::class,'ViewToolPack'])->name('ViewToolPack');
    Route::get('/add-tool-pack', [VehicleController::class,'createToolPackForm'])->name('createToolPackForm');
    Route::post('/store-tool-pack', [VehicleController::class, 'storeToolPack'])->name('storeToolPack');
    Route::get('/edit-tool-pack/{id}', [VehicleController::class,'editToolPackForm'])->name('editToolPackForm');
    Route::post('/update-Tool-Pack/{id}', [VehicleController::class,'updateToolPack'])->name('updateToolPack');
    Route::get('/delete-tool-kit/{id}', [VehicleController::class,'deleteToolPack'])->name('deleteToolPack');
    // end number of keys

    // locking wheel nut
    Route::get('/view-wheel-nut', [VehicleController::class,'viewWheelNut'])->name('viewWheelNut');
    Route::get('/add-wheel-nut', [VehicleController::class,'createWheelNutForm'])->name('createWheelNutForm');
    Route::post('/store-wheel-nut', [VehicleController::class, 'storeWheelNut'])->name('storeWheelNut');
    Route::get('/edit-wheel-nut/{id}', [VehicleController::class,'editWheelNutForm'])->name('editWheelNutForm');
    Route::post('/update-wheel-nut/{id}', [VehicleController::class,'updateWheelNut'])->name('updateWheelNut');
    Route::get('/delete-wheel-nut/{id}', [VehicleController::class,'deleteWheelNut'])->name('deleteWheelNut');
    // end locking wheel nut

    // smmoking
    Route::get('/view-smooking', [VehicleController::class,'viewSmooking'])->name('viewSmooking');
    Route::get('/add-smooking', [VehicleController::class,'createSmookingForm'])->name('createSmookingForm');
    Route::post('/store-Smooking', [VehicleController::class, 'storeSmooking'])->name('storeSmooking');
    Route::get('/edit-smooking/{id}', [VehicleController::class,'editsmookingForm'])->name('editsmookingForm');
    Route::post('/update-smooking/{id}', [VehicleController::class,'updateSmooking'])->name('updateSmooking');
    Route::get('/delete-smooking/{id}', [VehicleController::class,'deleteSmooking'])->name('deleteSmooking');
    // end Smooking

    // logbook
    Route::get('/view-logbook', [VehicleController::class,'viewlogbook'])->name('viewlogbook');
    Route::get('/add-logbook', [VehicleController::class,'createLogBookForm'])->name('createLogBookForm');
    Route::post('/store-logbook', [VehicleController::class, 'storeLogBook'])->name('storeLogBook');
    Route::get('/edit-logbook/{id}', [VehicleController::class,'editLogBookForm'])->name('editLogBookForm');
    Route::post('/update-logbook/{id}', [VehicleController::class,'updateLogBook'])->name('updateLogBook');
    Route::get('/delete-logbook/{id}', [VehicleController::class,'deleteLogBook'])->name('deleteLogBook');
    // end logbook

    // vehicle owner
    Route::get('/view-vehicle-owner', [VehicleController::class,'viewVehicalOwner'])->name('viewVehicalOwner');
    Route::get('/add-Vehicle-Owner', [VehicleController::class,'createVehicleOwnerForm'])->name('createVehicleOwnerForm');
    Route::post('/store-Vehicle-Owner', [VehicleController::class, 'storeVehicleOwner'])->name('storeVehicleOwner');
    Route::get('/edit-Vehicle-Owner/{id}', [VehicleController::class,'editVehicalOwnerForm'])->name('editVehicalOwnerForm');
    Route::post('/update-vehicle-owner/{id}', [VehicleController::class,'updateVehicleOwner'])->name('updateVehicleOwner');
    Route::get('/delete-vehicle-owner/{id}', [VehicleController::class,'deleteVehcileOwner'])->name('deleteVehcileOwner');
    // end vehicle owner

    // priavte plate
    Route::get('/view-private-plate', [VehicleController::class,'viewPrivatePlate'])->name('viewPrivatePlate');
    Route::get('/add-private-plate', [VehicleController::class,'createPrivatePlateForm'])->name('createPrivatePlateForm');
    Route::post('/store-private-plate', [VehicleController::class, 'storePrivatePlate'])->name('storePrivatePlate');
    Route::get('/edit-private-plate/{id}', [VehicleController::class,'editPrivatePlateForm'])->name('editPrivatePlateForm');
    Route::post('/update-private-plate/{id}', [VehicleController::class,'updatePrivatePlate'])->name('updatePrivatePlate');
    Route::get('/delete-private-plate/{id}', [VehicleController::class,'deletePrivatePlate'])->name('deletePrivatePlate');
    // end private plate

     // finance nnn
     Route::get('/view-finance', [VehicleController::class,'viewFinance'])->name('viewFinance');
     Route::get('/add-finance', [VehicleController::class,'createFinanceForm'])->name('createFinanceForm');
     Route::post('/store-finance', [VehicleController::class, 'storeFinance'])->name('storeFinance');
     Route::get('/edit-finance/{id}', [VehicleController::class,'editFinanceForm'])->name('editFinanceForm');
     Route::post('/update-finance/{id}', [VehicleController::class,'updateFinance'])->name('updateFinance');
     Route::get('/delete-finance/{id}', [VehicleController::class,'deleteFinance'])->name('deleteFinance');
     // end finance

    // manage user
    Route::get('/view-user', [UserController::class,'viewUsers'])->name('viewUsers');
    Route::get('/edit-user/{id}', [UserController::class,'editUserForm'])->name('editUserForm');
    Route::post('/update-user/{id}', [UserController::class,'updateUser'])->name('updateUser');
    Route::get('/delete-user/{id}', [UserController::class,'deleteUser'])->name('deleteUser');
    // end manage user


    // vehcile categories
    Route::get('/view-categories', [VehicleCategory::class,'viewCategories'])->name('viewCategories');
    Route::get('/create-category', [VehicleCategory::class,'createCategoryForm'])->name('createCategoryForm');
    Route::post('/add-category', [VehicleCategory::class,'storeCategories'])->name('storeCategories');
    
    Route::get('/delete-category/{id}', [VehicleCategory::class,'deleteCategory'])->name('deleteCategory');
    Route::get('/edit-category/{id}', [VehicleCategory::class,'editCategory'])->name('editsCategoryForm');
    Route::post('/update-category/{id}', [VehicleCategory::class,'updateCategories'])->name('updateCategories');
    // end vehcile categories

    
     // vehicle
     Route::get('/view-vehcile', [ManageVehicleController::class,'viewVehicle'])->name('viewVehicle');
     Route::get('/add-vehicle', [ManageVehicleController::class,'createVehicleForm'])->name('createVehicleForm');
     Route::post('/store-vehicle', [ManageVehicleController::class, 'StoreVehicle'])->name('StoreVehicle');
     Route::get('/edit-vehicle/{id}', [ManageVehicleController::class,'editVehicle'])->name('editVehicle');
     Route::post('/update-vehicle/{id}', [ManageVehicleController::class,'updateVehicle'])->name('updateVehicle');
     Route::get('/delete-vehicle/{id}', [ManageVehicleController::class,'deleteVehicle'])->name('deleteVehicle');
     // end vehcile
});

// end admin panel routes

// start seller panel routes
Route::group(['prefix' => 'seller','middleware'=>['auth','seller']], function () {
    Route::get('/', [SellerDashboardController::class,'seller'])->name('seller');


});

// end seller panel routes

// start seller panel routes
Route::group(['prefix' => 'dealer','middleware'=>['auth','dealer']], function () {
    Route::get('/dealer', [DealerDashboardController::class,'dashboard'])->name('dealer');
    Route::get('/dashboard', [DealerDashboardController::class,'index'])->name('dealer.dashboard');
    Route::get('/onlyCars', [DealerDashboardController::class,'onlyCars'])->name('onlyCars');
    Route::get('/onlyVans', [DealerDashboardController::class,'onlyVans'])->name('onlyVans');
    Route::post('/test', [DealerDashboardController::class,'test'])->name('test');
    Route::post('/dropdown', [DealerDashboardController::class,'dropdown'])->name('dropdown');
    Route::post('/dropdownfilter', [DealerDashboardController::class,'dropdownfilter'])->name('dropdownfilter');
    Route::get('/vehicle-detail/{id}', [DealerDashboardController::class,'vehicleDetail'])->name('vehicle.vehicleDetail');
    Route::get('/live-sell', [DealerDashboardController::class,'liveSell'])->name('vehicle.liveSell');

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
// Route::get('/dealer', [DealerDashboardController::class,'index'])->name('dealer');
// Route::get('/test', [DealerDashboardController::class,'test'])->name('test');
// Route::get('/vehicle-detail/{id}', [DealerDashboardController::class,'vehicleDetail'])->name('vehicle.vehicleDetail');
// Route::get('/live-sell', [DealerDashboardController::class,'liveSell'])->name('vehicle.liveSell');


