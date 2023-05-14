<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\ReviewResource;
use App\Models\Activity;
use App\Models\Category;
use App\Models\city;
use App\Models\hotels;
use App\Models\ReviewActivity;
use Illuminate\Http\Request;
use Validator;
class ActivityController extends Controller
{
    use apiRsponseFormate;

    public function index()
    {
        //
        // $category =  Category ::all();
        $activity =  ActivityResource::collection(Activity::get());
        return $this->apiResponse($activity,"successfully" ,200) ;
        //   $activity =  ReviewResource::collection(ReviewActivity::get());
        //  return $activity  ;
    }
    public function create(Request $request)
    {
        $activity = new Activity();
        $city =  city::find($request->city_id);

        if(!$city)
        {
            return $this->apiResponse(null,"city not found" ,404) ;
        }

        $hotels =  hotels::find($request->hotel_id);

        if(!$hotels)
        {
            return $this->apiResponse(null,"hotel not found" ,404) ;
        }

        $category =  Category::find($request->category_id);

        if(!$category)
        {
            return $this->apiResponse(null,"category not found" ,404) ;
        }

        $activity  =  $activity::create([
            "activityName" => $request->activityName,
            "activityPrice" => $request->activityPrice,
            "description" => $request->description,
            "openTime" => $request->openTime,
            "closeTime" => $request->closeTime,
            "location" =>$request->location,
            "category_id" => $request->category_id,
            "hotel_id" => $request->hotel_id,
            "city_id" => $request->city_id,
            "images" => $request->images,
        ]);
        return $this->apiResponse($activity ,"Successfuly",200);
    }
    public function update(Request $request , $id)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'activityName' => 'required',
                'activityPrice' => 'required',
                'description' => 'required',
                'openTime' => 'required',
                'closeTime' => 'required',
                'location' => 'required',
                'city_id' =>  'required:exists:cities,id',
                'images' => 'required',
                'category_id' => [
                    'required',
                    'exists:categories,id',

                ],

            ]

        );
        if($validator->fails())
        {
            return $this->apiResponse(null , $validator->errors()->first() , 404);
        }
        $activity = Activity::find($id);
        if(!$activity)
        {
            return $this->apiResponse(null , "Not found" , 404);
        }
        $activity->update($request->all());

        if($activity)
        {
            return $this->apiResponse($activity , "Update Succesfuly" , 200);
        }else
        {
            return $this->apiResponse(null , "Update Error" , 400);

        }
    }
    public function delete($id)
    {

        try{
            $activity = Activity::find($id);
            if(!$activity)
            {
                return $this->apiResponse(null , "Not found" , 404);
            }
            $activity->delete();
        return $this->apiResponse($activity , "Delete Succesfuly" , 200);
        } catch (\Exception $e) {
            return $this->apiResponse(null , $e->getMessage() , 400);
        }

    }

}
