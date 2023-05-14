<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelInfoResource;
use App\Models\city;
use App\Models\HotelInfo;
use App\Models\hotels;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;
use Validator;

class HotelInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use apiRsponseFormate;
    public function index()
    {
        //
        $hotelInfo = HotelInfo::get();
        return $this->apiResponse(
        HotelInfoResource::collection($hotelInfo)
        ,"successfuly" , 200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        Request $request,
    )
    {

        $hotelId = hotels::find($request->hotel_id);
        $cityID = city ::find($request->city_id);
        if(!$cityID)
        {
            return $this->apiResponse(null,"city not found" ,404) ;
        }
        if(!$hotelId)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }

        $hotelInfo = HotelInfo::create([
            "images"=>$request->images,
            "hotel_id"=>$request->hotel_id,
            "hotel_name"=>$request->hotel_name,
            "type_of_room"=>$request->type_of_room,
            "city_id"=>$request->city_id,
            "location"=> $request->location,
            "OPTIONS"=>$request->OPTIONS,
        ]);
        return $this->apiResponse($hotelInfo,"successfuly" , 200);
        //
    }
    public function update(
        Request $request,
    )
    {

        $hotel = HotelInfo::find($request->id);
        if(!$hotel)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'exists:App\Models\hotels,id',
            'city_id' => 'exists:App\Models\city,id',
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors()->first() ,404) ;
        }
        $hotel = $hotel->update($request->all());
        return $this->apiResponse($hotel ,"successfuly" , 200);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function show(HotelInfo $hotelInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelInfo $hotelInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelInfo  $hotelInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hotelInfo = HotelInfo::find($id);
        if(!$hotelInfo)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }
        $hotelInfo->delete();
        return $this->apiResponse($hotelInfo ,"successfuly" , 200);

    }
}
