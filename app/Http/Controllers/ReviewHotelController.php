<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewHotelResource;
use App\Models\hotels;
use App\Models\ReviewHotel;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewHotelController extends Controller
{
    use apiRsponseFormate;
    //
    public function index($idHotel)
    {
        //
        return$this->apiResponse(
            ReviewHotelResource::collection(
            ReviewHotel::where("hotel_id",$idHotel)->get())
            ,"successfuly",200);
    }
    public function create(Request $request)
    {
        //
        $hotelID = hotels::find($request->Hotel_id);
        if(!$hotelID)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }
        $userID = User::find($request->userID_id);
        if(!$userID)
        {
            return $this->apiResponse(null,"user not found" ,404) ;
        }
        $createReview = ReviewHotel::create($request->all());

        return $this->apiResponse(new ReviewHotelResource($createReview), "create review in hotel successfuly",
        200);
    }
    public function allReview()
    {

        //
        return ReviewHotelResource::collection(ReviewHotel::all());
    }
    public function delete( $id)
    {
        //

      try{
        $review = ReviewHotel::find($id);
        if(!$review)
        {
            return $this->apiResponse(null,"review not found" ,404) ;
        }
        $review->delete();
        return $this->apiResponse(null,"review deleted successfuly" ,200) ;
    }catch(\Exception $ex){
        return $this->apiResponse(null,$ex->getMessage() ,404) ;
    }
    }

}
