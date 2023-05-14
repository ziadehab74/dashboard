<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookedActivityController;
use App\Http\Controllers\BookingRoomController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HotelInfoController;
use App\Http\Controllers\HotelReviewForAi;
use App\Http\Controllers\InterstedController;

use App\Http\Controllers\ReviewActivityController;
use App\Http\Controllers\ReviewHotelController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserInterstedController;
use App\Http\Controllers\VerifyEmailController;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\AuthHotelController;
use App\Http\Controllers\CityController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Hotels\HotelsController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[LoginController::class, 'logout']);

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($Router)
{
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);



});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth/hotel'
], function ($Router)
{
    Route::post('/logout', [AuthHotelController::class, 'logout']);
    Route::post('/refresh', [AuthHotelController::class, 'refresh']);
    Route::get('/user-profile', [AuthHotelController::class, 'userProfile']);
    Route::post('/register',[AuthHotelController::class,'register']);
    Route::post('/login',[AuthHotelController::class,'login']);

});
Route::post('/email/otp',[VerifyEmailController::class,'sendVerifyEmail']);

// Admin Routes
// Route::post('/register',[RegisterController::class, 'register']);
// Route::post('/login',[LoginController::class, 'login']);
// Route::post('/verification-notification', [EmailVerficationController::class, 'sendVerficationEmail'])->middleware('auth:sanctum');
// Route::get('verify-email/{id}/{hash}', [EmailVerficationController::class, 'verify'])->name('verification.verify');
Route::post('/forget-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('/reset-password', [NewPasswordController::class, 'reset']);
// Hotels Routes
Route::get('/Allhotles',[HotelsController::class,'index']);

//city
Route::get('/City',[CityController::class,'index']);
// interstance
// Route::get('/Intersted',[InterstedController::class,'index']);
// Route::post('/Interstecreated',[InterstedController::class,'create']);
// Route::put('/Intersted/update',[InterstedController::class,'update']);
// Route::delete('/Intersted/delete',[InterstedController::class,'delete']);
// category done
//user intersted
Route::get('/InterstedUser',[UserInterstedController::class,'index']);
Route::get('/InterstedUser/{id}',[UserInterstedController::class,'getUserIntersted']);
Route::post('/InterstedUser/add',[UserInterstedController::class,'addUserInterstend']);

/////////////////////////////////////////////////////////////////////////////
Route::get('/category',[CategoryController::class,'index']);
// Route::post('/category/adduser',[CategoryController::class,'addUserCategory']);

Route::post('/category/insert',[CategoryController::class,'create']);
Route::put('/category/update',[CategoryController::class,'update']);
Route::delete('/category/delete/{id}',[CategoryController::class,'delete']);

/////////////////////////////////////////////////////////////////////////////

// activities done
/////////////////////////////////////////////////////////////////////////////
Route::get('/activiy',[ActivityController::class,'index']);

    Route::post('/activiy/insert',[ActivityController::class,'create']);

Route::put('/activiy/update/{id}',[ActivityController::class,'update']);
Route::delete('/activiy/delete/{id}',[ActivityController::class,'delete']);
/////////////////////////////////////////////////////////////////////////////
// review activity
Route::get('review/activiy/{id}',[ReviewActivityController::class,'index']);
Route::get('review/activiy/review',[ReviewActivityController::class,'getAllReview']);

Route::post('review/activiy/insert',[ReviewActivityController::class,'create']);
Route::put('review/activiy/update/{id}',[ReviewActivityController::class,'update']);
Route::delete('review/activiy/delete/{id}',[ReviewActivityController::class,'destroy']);


// booked
Route::get('/activiy/booked',[BookedActivityController::class,'index']);
Route::get('/activiy/booked/{id}',[BookedActivityController::class,'getById']);
Route::post('/activiy/booked/bookActivity',[BookedActivityController::class,'bookedActivity']);
Route::put('/activiy/booked/updateActivity',[BookedActivityController::class,'update']); // هعمل انو ممكين يكنسل الرحله
Route::delete('/activiy/booked/deleteBookedActivity',[BookedActivityController::class,'delete']); // soft delete
/////////////////////////////////////////////////////////////////////////////
Route::get('/hotel',[HotelInfoController::class,'index']);
Route::post('/hotel/createHotel',[HotelInfoController::class,'create']);
Route::put('/hotel/updateHotel',[HotelInfoController::class,'update']);
Route::delete('/hotel/removeHotel/{id}',[HotelInfoController::class,'destroy']);

// review Hotel
Route::get('/hotel/review/{idHotel}',[ReviewHotelController::class,'index']);
Route::post('/hotel/review/createReview',[ReviewHotelController::class,'create']);
Route::delete('/hotel/review/delete/{id}',[ReviewHotelController::class,'delete']);

// rooms
//////////////////// done ///////////////////////////////////
Route::get('/hotel/rooms',[RoomsController::class,'index']);
Route::post('/hotel/rooms/insert',[RoomsController::class,'create']);
Route::get('/hotel/rooms/update/{id}',[RoomsController::class,'edit']);
Route::delete('/hotel/rooms/delete/{id}',[RoomsController::class,'destroy']);
//////////////////// done ///////////////////////////////////


// send Email
Route::get('send/Email',
function (){

Mail::to("amr.atef503092@gmail.com")->send(new SendEmail());
return "Email Send";
});

// booking Room
Route::get('/hotel/rooms/booked',[BookingRoomController::class,'index']);
Route::get('/hotel/rooms/getBookingRoomById/{id}',[BookingRoomController::class,'getBookingRoomById']);
Route::get('/hotel/rooms/getBookingRoomByUser/{id}',[BookingRoomController::class,'getBookingRoomByUserId']);
Route::post('/hotel/rooms/getBookingRoombyHotelID',[BookingRoomController::class,'getBookingRoombyHotelID']);
Route::post('/hotel/rooms/createBookingRoom',[BookingRoomController::class,'createBookingRoom']);
Route::post('/hotel/rooms/bookRoomID',[BookingRoomController::class,'getBookingRoombyRoomID']);

// verify Email
Route::post('/email/verify',[VerifyEmailController::class,'verifyEmail']);

// send  otp to email reset Password
Route::post('/password/sendotp',[ForgetPasswordController::class,'sendOtp']);
Route::post('/password/verifyotp',[ForgetPasswordController::class,'verifyOtp']);
// Route::post('/password/resetpassword',[ForgetPasswordController::class,'resetPassword']);

// Ai
Route::get('/ai',[HotelReviewForAi::class,'index']);
Route::get('/hotelInfoReview',[HotelReviewForAi::class,'hotelInfoReview']);
