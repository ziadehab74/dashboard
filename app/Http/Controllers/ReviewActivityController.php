<?php

namespace App\Http\Controllers;

use App\Models\ReviewActivity;
use App\Http\Requests\StoreReviewActivityRequest;
use App\Http\Requests\UpdateReviewActivityRequest;
use Illuminate\Http\Request;
use Validator;

class ReviewActivityController extends Controller
{
    use apiRsponseFormate;

    public function index($id)
    {
        //
       $reviewActivity =  ReviewActivity::where("activity_id" ,$id)->get();
       return $this->apiResponse($reviewActivity ,"successfuly" , 200);
    }


    public function create(Request $request )
    {
        //
        $validator =  Validator::make($request->all(),[
            'activity_id'=>'required|exists:activities,id',
            'user_id'=>'required|exists:users,id',
            'comment'=>'required',
            'rate'=>'required',
        ]);
        if($validator->fails()){
            return $this->apiResponse(null , $validator->errors()->first() , 404);
        }
        $reviewActivity =  ReviewActivity::create($request->all());
        return $this->apiResponse($reviewActivity , "create activity Successfuly " , 200);
    }
    public function getAllReview(Request $request )
    {
        //
        $reviewActivity =  ReviewActivity::get();
        return $this->apiResponse($reviewActivity , "create activity Successfuly " , 200);
    }
    public function destroy($id)
    {
        //
        $reviewActivity = ReviewActivity::find($id);
        if(!$reviewActivity){
            return $this->apiResponse(null , "reviewActivity not found" , 404);
        }
        $reviewActivity->delete();
        return $this->apiResponse($reviewActivity , "delete reviewActivity Successfuly" , 200);
    }

}
