<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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
    return view('welcome');
});
Auth::routes();
Route::get('/hotels',[LoginController::class,'showHotelsLoginForm'])->name('hotels.login-view');
Route::post('/hotels',[LoginController::class,'HotelsLogin'])->name('hotels.login');

Route::get('/hotels/register',[RegisterController::class,'showHotelsRegisterForm'])->name('hotels.register-view');
Route::post('/hotels/register',[RegisterController::class,'createHotels'])->name('hotels.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hotels/dashboard',function(){
    return view('hotels');
})->middleware('auth:hotels');
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






// Route::get('/datatable', function () {
//     return view('backend.datatable');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
