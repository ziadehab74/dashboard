<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelsController extends Controller
{
        // public function Register(StoreUserRequest $request)
    //     {
    //         // dd($request->password);
    //         $request->Validated($request->all());

    //         $hotels = hotels::create([
    //             'Hotel_name'=>$request->Hotel_name,
    //             'email'=>$request->email,
    //             'password'=>Hash::make($request->password),
    //         ]);

    //         return $this->success([
    //             'user' => $hotels,
    //             'token' => $hotels->createToken('api-auth-token')->plainTextToken,
    //         ] ,'You are Registerd successfully');
    //     }


    public function AllHotels()
    {
        $all = DB::table('hotels')
            ->leftJoin('review_hotels', 'hotels.id', '=', 'review_hotels.hotel_id')
            ->leftJoin('cities', 'hotels.city_id', '=', 'cities.id')

            ->select(
                'hotels.id',
                'hotels.Hotel_name',
                'hotels.email',
                'hotels.facilities',
                'hotels.application_documents',
                'cities.name_en',
                DB::raw('round(AVG(review_hotels.rate),2) as average_rate'),

            )
            ->groupBy('hotels.id', 'hotels.Hotel_name')
            ->get();
        return view('hotels.hotel_table', compact('all'));
    }
}
