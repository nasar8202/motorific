<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\admin\VehicleController;
use App\Http\Controllers\frontend\seller\FrontController;

use App\Http\Controllers\frontend\dealer\PricingController;
use App\Http\Controllers\frontend\dealer\HowItWorksController;
use App\Http\Controllers\frontend\dealer\MultiStepRegistration;
use App\Http\Controllers\backend\admin\AdminDashboardController;
use App\Http\Controllers\backend\admin\bid\BidVehicleController ;

use App\Http\Controllers\backend\admin\Categories\VehicleCategory;
use App\Http\Controllers\backend\admin\meetings\MeetingController;
use App\Http\Controllers\backend\admin\userdetails\UserController;
use App\Http\Controllers\backend\admin\liveSell\LiveSellController;
use App\Http\Controllers\frontend\dealer\DealerDashboardController;
use App\Http\Controllers\frontend\seller\SellerDashboardController;

use App\Http\Controllers\backend\admin\Categories\VehicleCategories;

use App\Http\Controllers\frontend\dealer\bid\BidedVehicleController;
use App\Http\Controllers\backend\admin\vehicle\ManageVehicleController;
use App\Http\Controllers\backend\admin\newVehicle\SellerVehicleController;
use App\Http\Controllers\backend\superadmin\SuperAdminDashboardController;
use App\Http\Controllers\backend\admin\orderRequest\OrderRequestController;
use App\Http\Controllers\frontend\dealer\vehicle\AddDealerVehicleController;
use App\Http\Controllers\backend\admin\dealerVehicle\DealerVehicleController;
use App\Http\Controllers\backend\admin\vehicleCharges\PricingChargesController;
use App\Http\Controllers\frontend\dealer\dealerCharges\DealerChargesController;
use App\Http\Controllers\backend\admin\dealerCharges\AdminDealerChargesController;
use App\Http\Controllers\frontend\dealer\orderRequest\OrderVehicleRequestController;
use App\Http\Controllers\frontend\dealer\dealerOrderRequest\DealerOrderRequestController;
use App\Http\Controllers\backend\admin\dealerOrderVehicleRequest\DealerOrderVehicleRequestController;
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
// how it works for dealer
Route::get('/how-it-work', [HowItWorksController::class,'howItWorksforSeller'])->name('howItWorksforSeller');
Route::get('/reviews', [HowItWorksController::class,'reviews'])->name('reviews');


// how it works for dealer
Route::get('/how-it-works', [HowItWorksController::class,'howItWorks'])->name('howItWorks');
Route::get('/pricing', [PricingController::class,'pricing'])->name('pricing');
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

Route::get('/listing-details', [MultiStepRegistration::class, 'ListingDetails'])->name('ListingDetails');

Route::get('/create-advert', [MultiStepRegistration::class, 'CreateAdvert'])->name('CreateAdvert');



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
Route::post('/create_user', [RegisterController::class,'create_user'])->name('create_user');
//Route::get('/usersss', [FrontController::class,'getUsers'])->name('usersss');
Route::get('/photo-upload', [FrontController::class,'photoUpload'])->name('photoUpload');
Route::post('/add-seller-vehicle', [FrontController::class,'addSellerVehicle'])->name('addSellerVehicle');
Route::post('/add-condition-and-damages', [FrontController::class,'addConditionDamages'])->name('addConditionDamages');
Route::post('/vehicle_information', [FrontController::class,'vehicleInformation'])->name('vehicleInformation');
Route::post('/create-vehicle', [FrontController::class,'createVehicle'])->name('createVehicle');
Route::post('/update-seller', [FrontController::class,'updateSeller'])->name('updateSeller');
Route::get('/test_location', [FrontController::class,'testlocation'])->name('testlocation');
Route::get('/registration', [FrontController::class,'registration'])->name('registration');
Route::get('/seller-login', [FrontController::class,'myLogin'])->name('myLogin');
Route::get('/valuation', [FrontController::class,'valuation'])->name('valuation');
Route::get('/sell-my-car', [FrontController::class,'sellMyCar'])->name('sellMyCar');

Route::get('/forgot-password', [FrontController::class,'forgotPassPage'])->name('forgotPassPage');
Route::post('/forgot-password', [FrontController::class,'forgotPass'])->name('forgotPass');
Route::get('reset-password/{token}', [FrontController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [FrontController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// start admin panel routes
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class,'admin'])->name('admin');
    Route::get('/requests-dealers', [AdminDashboardController::class,'viewDealers'])->name('ViewDealers');
    Route::get('/approve-dealer/{id}', [AdminDashboardController::class,'approveDealer'])->name('dealer.approve');
    Route::post('/approve-dealer', [AdminDashboardController::class,'approveRequestDocuments'])->name('dealer.approveRequestDocuments');
    Route::get('/block-dealer/{id}', [AdminDashboardController::class,'blockDealer'])->name('dealer.block');
    Route::get('/view-dealer-details/{id}', [AdminDashboardController::class,'viewDealerDetails'])->name('viewDealerDetails');

    Route::get('/approved-dealers-list', [AdminDashboardController::class,'approvedDealersByAdmin'])->name('dealer.approvedDealersByAdmin');
    Route::get('/dealers-purchase/{id}', [AdminDashboardController::class,'dealersPurchase'])->name('dealersPurchase');
    Route::get('/block-dealers-list', [AdminDashboardController::class,'blockDealersByAdmin'])->name('dealer.blockDealersByAdmin');
    Route::get('/view-new-vehicle', [AdminDashboardController::class,'viewSellerVehicle'])->name('viewSellerVehicle');
    Route::get('/view-seller-deatils/{id}', [SellerVehicleController::class,'viewSellerDetails'])->name('viewSellerDetails');
    Route::get('/view-vehicle-deatils/{id}', [SellerVehicleController::class,'vehicleDetails'])->name('vehicleDetails');
    Route::get('/approve-vehicle/{id}', [SellerVehicleController::class,'approveVehicle'])->name('approveVehicle');

    // vehicle
    Route::get('/view-vehicle-features', [VehicleController::class,'ViewVehicleFeatures'])->name('ViewVehicleFeatures');
    Route::get('/add-vehicle-feature', [VehicleController::class,'createVehicleFeatureForm'])->name('createVehicleFeatureForm');
    Route::post('/store-vehicle-feature', [VehicleController::class, 'store'])->name('addVehicleFeature');
    Route::get('/edit-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeatureForm'])->name('vehicleFeature.edit');
    Route::post('/update-vehicle-feature/{id}', [VehicleController::class,'editVehicleFeature'])->name('editVehicleFeature');
    Route::get('/delete-vehicle-feature/{id}', [VehicleController::class,'deleteVehicleFeature'])->name('deleteVehicleFeature');
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
     Route::get('/approve-vehicle/{id}', [ManageVehicleController::class,'approveVehicle'])->name('approveVehicle');
     // end vehcile


          // bidding
     Route::get('/all-bidding-vehicle', [BidVehicleController::class,'allBiddingVehicle'])->name('allBiddingVehicle');
     Route::get('/single-bid/{id}', [BidVehicleController::class,'singleBid'])->name('singleBid');
     Route::get('/unassign-bid/{id}', [BidVehicleController::class,'unassignBid'])->name('unassignBid');
     Route::get('/bid-meeting', [BidVehicleController::class,'bidMeeting'])->name('bidMeeting');
     Route::get('/approve-bid/{id}/{vid}', [BidVehicleController::class,'approveBid'])->name('approveBid');
     Route::post('/approve-bid-admin-updated', [BidVehicleController::class,'approveBidWithAdminUpdated'])->name('approveBidWithAdminUpdated');

     // end bidding

     //live sell
     Route::get('/live-sell', [LiveSellController::class,'liveSell'])->name('liveSell');
     Route::post('/update-time/{id}', [LiveSellController::class,'updateTime'])->name('updateTime');

     //end live sell

     //show dealer card detail start

     Route::get('/show-card-details', [AdminDealerChargesController::class,'cardDetailsShowAdmin'])->name('cardDetailsShowAdmin');
     Route::get('/dealer-details-from-charges/{id}', [AdminDealerChargesController::class,'viewDealerDetailsFromCharges'])->name('viewDealerDetailsFromCharges');
     Route::get('/dealer-details-accepted/{id}', [AdminDealerChargesController::class,'cardDetailsAccept'])->name('cardDetailsAccept');
     Route::get('/dealer-card-details/{id}', [AdminDealerChargesController::class,'dealerCardDetails'])->name('dealerCardDetails');
     //show dealer card detail end

     //pricing start
     Route::get('/pricing-view', [PricingChargesController::class,'viewPricing'])->name('viewPricing');
     Route::get('/pricing-edit/{id}', [PricingChargesController::class,'pricingEdit'])->name('pricingEdit');
     Route::post('/pricing-create', [PricingChargesController::class,'pricingCreate'])->name('pricingCreate');
     Route::get('/pricing-delete/{id}', [PricingChargesController::class,'pricingDelete'])->name('pricingDelete');

     Route::post('/pricing-create/{id}', [PricingChargesController::class,'pricingUpdate'])->name('pricingUpdate');
     //end pricning

     //request order price
     Route::get('/order-request', [OrderRequestController::class,'orderRequest'])->name('orderRequest');
     Route::get('/order-request-meeting', [OrderRequestController::class,'orderRequestMeeting'])->name('orderRequestMeeting');
     Route::get('/dealer-order-request-meeting', [OrderRequestController::class,'dealerOrderRequestMeeting'])->name('dealerOrderRequestMeeting');
     Route::get('/order-user-detail/{id}', [OrderRequestController::class,'orderdUserDetail'])->name('orderdUserDetail');
     Route::get('/order-seller-detail/{id}', [OrderRequestController::class,'orderdSellerDetail'])->name('orderdSellerDetail');
     Route::post('/approve-order-admin-updated', [OrderRequestController::class,'approveOrderdWithAdminUpdated'])->name('approveOrderdWithAdminUpdated');
     Route::get('/order-vehicle-detail/{id}', [OrderRequestController::class,'orderdVehicleDetail'])->name('orderdVehicleDetail');
     Route::get('/approve-order/{id}/{vId}', [OrderRequestController::class,'approveOrderd'])->name('approveOrderd');
     Route::get('/unassign-req/{id}', [OrderRequestController::class,'unassignReq'])->name('unassignReq');
    //end request order

    //dealer vehicle

    Route::get('/dealer-vehicle', [DealerVehicleController::class,'viewDealerVehicle'])->name('viewDealerVehicle');
    Route::post('/dealer-vehicle-update-price/{id}', [DealerVehicleController::class,'dealerVehicleUpdatePrice'])->name('dealerVehicleUpdatePrice');
    Route::get('/dealer-vehicle-detail/{id}', [DealerVehicleController::class,'viewDealerVehicleDetail'])->name('viewDealerVehicleDetail');
    Route::get('/dealer-vehicle-delete/{id}', [DealerVehicleController::class,'deleteDealerVehicle'])->name('deleteDealerVehicle');


    //end dealer vehicle

    //dealer order vehicle request
    Route::get('/dealer-order-vehicle-request', [DealerOrderVehicleRequestController::class,'viewDealerOrderVehicle'])->name('viewDealerOrderVehicle');
    Route::get('/orderd-dealer-detail/{id}', [DealerOrderVehicleRequestController::class,'orderdDealerDetail'])->name('orderdDealerDetail');
    Route::get('/dealers-orderd-vehicle-detail/{id}', [DealerOrderVehicleRequestController::class,'dealersOrderdVehicleDetail'])->name('dealersOrderdVehicleDetail');
    Route::get('/vehicle-owner-detail/{id}', [DealerOrderVehicleRequestController::class,'vehicleOwnerDetails'])->name('vehicleOwnerDetails');
    Route::get('/approve-dealers-order/{id}', [DealerOrderVehicleRequestController::class,'approveDealersOrder'])->name('approveDealersOrder');
    Route::post('/approve-dealers-order-admin-updated', [DealerOrderVehicleRequestController::class,'approveDealersOrderdWithAdminUpdated'])->name('approveDealersOrderdWithAdminUpdated');

    //end dealer order vehicle request
    //start meetings

    Route::get('/view-meeting', [MeetingController::class,'viewMeeting'])->name('viewMeeting');
    //end meetings

    });

// end admin panel routes

// start seller panel routes
Route::group(['prefix' => 'seller','middleware'=>['auth','seller']], function () {
Route::get('/dashboard', [SellerDashboardController::class,'seller'])->name('seller');
Route::get('/accepted-vehicles', [SellerDashboardController::class,'acceptedVehicles'])->name('acceptedVehicles');
Route::get('/bids-on-my-vehicles/{id}', [SellerDashboardController::class,'bidsOnVehicles'])->name('bidsOnVehicles');
Route::get('/orders-on-my-vehicles/{id}', [SellerDashboardController::class,'ordersOnVehicles'])->name('ordersOnVehicles');
Route::post('/meeting-status', [SellerDashboardController::class,'meetingStatus'])->name('meetingStatus');
Route::post('/meeting-bid-status', [SellerDashboardController::class,'meetingBidStatus'])->name('meetingBidStatus');
Route::get('/my-profile', [SellerDashboardController::class,'myProfile'])->name('myProfile');
Route::post('/update-my-profile/{id}', [SellerDashboardController::class,'updateMyProfile'])->name('updateMyProfile');
Route::post('/update-my-password/{id}', [SellerDashboardController::class,'updateMyPassword'])->name('updateMyPassword');

// Route::get('/sell-my-car', [FrontController::class,'sellMyCar'])->name('sellMyCar');
});

// end seller panel routes
Route::get('/vehicle-and-details', [AddDealerVehicleController::class, 'vehicleAndDetails'])->name('dealer.vehicleAndDetails');

// start seller panel routes
Route::group(['prefix' => 'dealer','middleware'=>['auth','dealer']], function () {
    Route::get('/dealer', [DealerDashboardController::class,'dashboard'])->name('dealer');

    Route::get('/bids-and-offers', [DealerDashboardController::class,'BidsAndOffers'])->name('dealer.BidsAndOffers');
    Route::get('/active-bids-vehicle', [DealerDashboardController::class,'ActiveBiddedVehicle'])->name('bids.ActiveBiddedVehicle');
    Route::get('/under-offers-bids-vehicle', [DealerDashboardController::class,'UnderBiddedOfferVehicle'])->name('bids.UnderBiddedOfferVehicle');
    Route::get('/didnot-offers-bids-vehicle', [DealerDashboardController::class,'DidnotWinBiddedVehicle'])->name('bids.DidnotWinBiddedVehicle');
    Route::get('/purchases-vehicles', [DealerDashboardController::class,'PurchasesVehicle'])->name('dealer.PurchasesVehicle');
    Route::get('/completed-purchases-vehicles', [DealerDashboardController::class,'CompletedBiddedVehicle'])->name('bids.CompletedBiddedVehicle');
    Route::get('/cancelled-purchases-vehicles', [DealerDashboardController::class,'CancelledBiddedOfferVehicle'])->name('bids.CancelledBiddedOfferVehicle');
    Route::get('/completed-requested-vehicles', [DealerDashboardController::class,'CompletedRequestedVehicle'])->name('CompletedRequestedVehicle');
    Route::get('/canceled-requested-vehicles', [DealerDashboardController::class,'CancelRequestedVehicle'])->name('CancelRequestedVehicle');
    Route::get('/my-vehicles', [DealerDashboardController::class,'myVehicles'])->name('myVehicles');
    Route::get('/order-on-my-vehicles/{id}', [DealerDashboardController::class,'orderOnMyVehicle'])->name('orderOnMyVehicle');
    Route::post('/dealer-meeting-status', [DealerDashboardController::class,'dealerMeetingStatus'])->name('dealerMeetingStatus');

    Route::get('/dashboard', [DealerDashboardController::class,'index'])->name('dealer.dashboard');
    Route::get('/onlyCars', [DealerDashboardController::class,'onlyCars'])->name('onlyCars');
    Route::get('/onlyVans', [DealerDashboardController::class,'onlyVans'])->name('onlyVans');
    Route::post('/test', [DealerDashboardController::class,'test'])->name('test');
    Route::post('/filter-live-Sell', [DealerDashboardController::class,'filterLiveSell'])->name('filterLiveSell');
    Route::post('/dropdown', [DealerDashboardController::class,'dropdown'])->name('dropdown');
    Route::post('/dropdownfilter', [DealerDashboardController::class,'dropdownfilter'])->name('dropdownfilter');
    Route::post('/dropdownfilterforlivesell', [DealerDashboardController::class,'dropdownfilterforlivesell'])->name('dropdownfilterforlivesell');
    Route::post('/buyItNowVehicledDropdownfilter', [DealerDashboardController::class,'buyItNowVehicledDropdownfilter'])->name('buyItNowVehicledDropdownfilter');
    Route::get('/vehicle-detail/{id}', [DealerDashboardController::class,'vehicleDetail'])->name('vehicle.vehicleDetail');
    Route::get('/live-sell', [DealerDashboardController::class,'liveSell'])->name('vehicle.liveSell');
    Route::get('/buy-it-now', [DealerDashboardController::class,'buyItNow'])->name('buyItNow');

    Route::get('/completed-vehicle-detail/{id}', [DealerDashboardController::class,'completedVehicleDetails'])->name('completedVehicleDetails');
    Route::get('/completed-dealer-vehicle-detail/{id}', [DealerDashboardController::class,'completedDealersVehicleDetail'])->name('completedDealersVehicleDetail');

    Route::post('/buyItNowVehicle', [DealerDashboardController::class,'buyItNowVehicle'])->name('buyItNowVehicle');
    Route::post('/dealerToDealerVehicleFilter', [DealerDashboardController::class,'dealerToDealerVehicleFilter'])->name('dealerToDealerVehicleFilter');
    Route::get('/dealer-to-dealer', [DealerDashboardController::class,'dealerToDealer'])->name('dealerToDealer');
    Route::get('/dealer-vehicle-detail/{id}', [DealerDashboardController::class,'dealersVehicleDetail'])->name('dealersVehicleDetail');
    Route::post('/bid_vehcile', [BidedVehicleController::class,'bid'])->name('bid');
    Route::get('/bid-cancel/{id}', [BidedVehicleController::class,'cancelBid'])->name('cancelBid');
    Route::post('/order-vehicle-request', [OrderVehicleRequestController::class,'vehicleRequest'])->name('vehicleRequest');
    Route::get('/cancel-request/{id}', [OrderVehicleRequestController::class,'cancelRequest'])->name('cancelRequest');
    Route::post('/update-my-amount', [OrderVehicleRequestController::class,'updateAmount'])->name('updateAmount');
    Route::post('/dealer-vehicle-request', [DealerOrderRequestController::class,'orderVehicleRequest'])->name('orderVehicleRequest');
    Route::get('/dealer-vehicle-request-cancel/{id}', [DealerOrderRequestController::class,'cancelDealerRequest'])->name('cancelDealerRequest');
    //search routes
    Route::get('/did-not-win-search', [DealerDashboardController::class,'didNotWinSearch'])->name('didNotWinSearch');



    //
    Route::get('/add-vehicle-to-sell', [AddDealerVehicleController::class,'addVehicleToSellFromDealer'])->name('dealer.addVehicleToSellFromDealer');
    Route::post('/add-vehicle-to-sell', [AddDealerVehicleController::class,'addVehicleToSellFromDealerPost'])->name('dealer.addVehicleToSellFromDealerPost');
    Route::get('/media-condition', [AddDealerVehicleController::class, 'mediaCondition'])->name('dealer.mediaCondition');
    Route::post('/media-condition', [AddDealerVehicleController::class, 'mediaConditionPost'])->name('dealer.mediaConditionPost');
    Route::post('/vehicle-and-details', [AddDealerVehicleController::class, 'vehicleAndDetailsPost'])->name('dealer.vehicleAndDetailsPost');
    Route::get('/vehicle-listing', [AddDealerVehicleController::class, 'vehicleListing'])->name('dealer.vehicleListing');
    Route::post('/vehicle-listing', [AddDealerVehicleController::class, 'vehicleListingPost'])->name('dealer.vehicleListingPost');

    Route::get('/seller-details/{bided}/{id}/{slug}', [DealerChargesController::class, 'sellerDetails'])->name('sellerDetails');
    Route::get('/seller-requested-details/{slug}/{id}', [DealerChargesController::class, 'sellerRequestedDetails'])->name('sellerRequestedDetails');
    Route::get('/dealer-owner-requested-details/{slug}/{id}', [DealerChargesController::class, 'ownerDealerRequestedDetails'])->name('ownerDealerRequestedDetails');

    Route::get('/card-details', [DealerChargesController::class, 'cardDetails'])->name('cardDetails');
    Route::post('/card-details-create', [DealerChargesController::class, 'cardDetailsCreate'])->name('cardDetailsCreate');
    Route::get('/delivery-details', [DealerChargesController::class, 'deliveryDetailPage'])->name('deliveryDetailPage');
    Route::post('/stripe-payment', [DealerChargesController::class,'stripePayment'])->name('stripePayment');
    Route::get('/stripe', [DealerChargesController::class,'stripe']);
    Route::post('/stripe', [DealerChargesController::class,'stripePost'])->name('stripe.post');

    Route::post('/review-cancelation', [DealerChargesController::class,'reviewForCancel'])->name('reviewForCancel');
    Route::post('/schedule-meeting', [DealerChargesController::class,'scheduleMeeting'])->name('scheduleMeeting');
    Route::post('/owner-schedule-meeting', [DealerChargesController::class,'ownerScheduleMeeting'])->name('ownerScheduleMeeting');

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


