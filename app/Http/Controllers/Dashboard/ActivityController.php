<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function AllActivity()
    {
        $all = DB::table('activities')
        ->select(
            'activities.id',
            'categories.name',
            'activities.activityName',
            'cities.name_en as city',
            DB::raw('ROUND(AVG(review_activities.rate),2) as avg_rating'),
            DB::raw('COUNT(review_activities.id) as total_reviews'),
            'hotels.Hotel_name as hotel_name',
            'activities.activityPrice'
        )
        ->join('cities', 'activities.city_id', '=', 'cities.id')
        ->leftJoin('review_activities', 'activities.id', '=', 'review_activities.activity_id')
        ->join('categories', 'activities.category_id', '=', 'categories.id')
        ->leftJoin('hotels', 'activities.hotel_id', '=', 'hotels.id')
        ->groupBy('activities.id', 'categories.name', 'activities.activityName', 'cities.name_en', 'hotels.Hotel_name')
        ->orderByDesc('avg_rating')
        ->get();
            return view('activity.activity-table' ,compact('all'));

   }
   protected function creatactivity(Request $request)
   {
       $activity = Activity::create([
           'activityName' => $request['activityName'],
           'activityPrice' => $request['activityPrice'],
           'description' => $request['description'],
           'openTime' => $request['openTime'],
           'closeTime'=> $request['closeTime'],
           'category_id'=> $request['category_id'],
           'hotel_id'=> $request['hotel_id'],
           'city_id'=>$request['city_id'],
       ]);
       return redirect()->intended('Hotel_dashboard');
   }
   public function showinsertactivity()
   {

       return view('hotels.add-activity');
   }
}
