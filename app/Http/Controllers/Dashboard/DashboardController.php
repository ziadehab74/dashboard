<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewHotelResource;
use App\Models\Activity;
use App\Models\BookedActivity;
use App\Models\booking;
use App\Models\BookingRoom;
use App\Models\hotels;
use App\Models\ReviewActivity;
use App\Models\ReviewHotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


  public function index()
  {
      $users = User::count();
      $hotels= hotels::count();
      $activity = Activity::count();
      $bookingRoom = BookingRoom::count();
      $bookingActivity= BookedActivity::count();
      $totalBooking=$bookingRoom+$bookingActivity;
      $ReviewHotel= ReviewHotel::count();
      $ReviewActivity = ReviewActivity::count();
      $reviews=$ReviewHotel+$ReviewActivity;
      return view('dashboard' ,compact('users' , 'hotels', 'activity','totalBooking','reviews'));
  }
}
