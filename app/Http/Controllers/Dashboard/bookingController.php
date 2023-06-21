<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookingController extends Controller
{
    public function allbooking()
{
    $all = DB::table('booking_rooms')
        ->select(
            'booking_rooms.id',
            'booking_rooms.num_of_nights',
            'booking_rooms.num_of_guests',
            'booking_rooms.total_price',
            'booking_rooms.check_in',
            'booking_rooms.check_out',
            'booking_rooms.status',
            'booking_rooms.payment_status',
            'booking_rooms.payment_method',
            'hotels.Hotel_name',
            'users.name',
        )
        ->leftJoin('users', 'users.id', '=', 'booking_rooms.user_id')
        ->leftJoin('hotel_infos', 'booking_rooms.hotel_info_id', '=', 'hotel_infos.id')
        ->leftJoin('hotels', 'hotel_infos.hotel_id', '=', 'hotels.id')
        ->groupBy('booking_rooms.id')
        ->get();
    return view('hotels.show-invoice', compact('all'));
}
}
