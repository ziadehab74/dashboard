<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HotelsController;
use App\Http\Controllers\Dashboard\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('Home');
});
Auth::routes(['verify'=>false]);
//*****************************hotels******************************

Route::get('/hotels',[LoginController::class,'showHotelsLoginForm'])->name('hotels.login-view');
Route::post('/hotels',[LoginController::class,'HotelsLogin'])->name('hotels.login');
Route::get('/hotels/register',[HotelsController::class,'showHotelsRegisterForm'])->name('hotels.register-view');
Route::post('/hotels/register',[HotelsController::class,'createHotels'])->name('hotels.register');
route::get('/all-hotel',[HotelsController::class,'AllHotels'])->name('AllHotels');
route::get('/waitingHotels',[HotelsController::class,'waitingHotels'])->name('waitingHotels');
route::get('/AcceptHotel/{id}',[HotelsController::class,'AcceptHotel'])->name('AcceptHotel');
route::get('/blockhotel/{id}',[HotelsController::class,'blockhotel'])->name('blockhotel');
route::get('/UpdateBlockedhotel/{id}',[HotelsController::class,'UpdateBlockedhotel'])->name('UpdateBlockedhotel');
route::get('/ViewBlockedhotel',[HotelsController::class,'ViewBlockedhotel'])->name('ViewBlockedhotel');
Route::get('/addhoteldash',[HotelsController::class,'addhotelsview'])->name('addhotelsview');
route::post('/Inserthotel',[HotelsController::class,'Inserthotel'])->name('Inserthotel');


//*****************************dashboard******************************
route::get('/dashboard',[DashboardController::class,'index'])->name('index');
// **********************************users***********************************
route::get('/all-user',[UserController::class,'all_user'])->name('all-user');
route::get('/add-users',[UserController::class,'AddUserIndex'])->name('AddUserIndex');
route::post('/insert-user',[UserController::class,'Insertuser'])->name('Insertuser');
route::get('/blocked-users',[UserController::class,'ViewBlockedUser'])->name('ViewBlockedUser');
route::get('/block-user/{id}',[UserController::class,'blockuser'])->name('blockuser');
route::get('/UpdateBlockedUser/{id}',[UserController::class,'UpdateBlockedUser'])->name('UpdateBlockedUser');
route::get('/EditUser/{id}',[UserController::class,'EditUser'])->name('EditUser');
route::post('/UpdateUser/{id}',[UserController::class,'UpdateUser'])->name('UpdateUser');

// **********************************activity***********************************
route::get('/all-activity',[ActivityController::class,'AllActivity'])->name('AllActivity');




















// Route::get('/hotels/dashboard',function(){
//     return view('hotels');
// })->middleware('auth:hotels');

// Route::get('/register', [RegisterController::class, 'create'])
//                         ->name('register')
//                         ->middleware('guest:user,hotels');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/alluser', [App\Http\Controllers\backend\UserController::class, 'Alluser'])->name('alluser');
// Route::get('/add-user-index', [App\Http\Controllers\backend\UserController::class, 'AddUserIndex'])->name('AddUserIndex');
// Route::post('/insert-user', [App\Http\Controllers\backend\UserController::class, 'Insertuser'])->name('insertuser');
// Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUser'])->name('Edituser');
// Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');
// Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUser'])->name('DeleteUser');
// Route::get('/approve_user', [App\Http\Controllers\backend\UserController::class, 'ApproveUser'])->name('ApproveUser');
// Route::get('/update_user_approve_user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateApproveUser'])->name('UpdateApproveUser');
