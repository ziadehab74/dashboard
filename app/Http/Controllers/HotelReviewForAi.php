<?php

namespace App\Http\Controllers;

use App\Http\Resources\AiResourceReview;
use App\Http\Resources\HotelInfoReviewResource;
use App\Models\HotelInfo;
use Illuminate\Http\Request;

class HotelReviewForAi extends Controller
{
    //
    public function index()
    {
        $hotelInfo = HotelInfo::all();
        $hotelInfo = AiResourceReview::collection($hotelInfo);
        return $hotelInfo;
    }
    public function hotelInfoReview()
    {
        $hotelInfo = HotelInfo::all();
        $hotelInfo = HotelInfoReviewResource::collection($hotelInfo);
        return $hotelInfo;
    }

}
