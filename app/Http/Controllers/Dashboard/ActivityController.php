<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function AllActivity()
    {
        $all = DB::table('activities')
            ->join('cities', 'activities.city_id', '=', 'cities.id')
            ->leftJoin('review_activities', 'activities.id', '=', 'review_activities.activity_id')
            ->join('categories', 'activities.category_id', '=', 'categories.id')
            ->leftJoin('hotels', 'activities.hotel_id', '=', 'hotels.id')
            ->select('activities.id','categories.name' ,'activities.activityName', 'cities.name_en as city',
            DB::raw('round(AVG(review_activities.rate),2) as avg_rating'),
            DB::raw('COUNT(review_activities.id) as total_reviews'), 'hotels.Hotel_name as Hotel_name','activities.activityPrice')
            ->groupBy('activities.id', 'activities.activityName', 'cities.name_en', 'hotels.Hotel_name')
            ->orderBy('avg_rating', 'desc')
            ->get();
            return view('activity.activity-table' ,compact('all'));

   }
}
