<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\hotels;
use App\Models\ReviewHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HotelsController extends Controller
{
    public function index()
{
 $cities =DB::table('cities')->select('id','name_en')->get();
return view('hotels.add-activity',compact('cities'));
}
    public function HotelsLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('hotels')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/Hotel_dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public function showHotelsLoginForm()
    {
        return view('hotels.login', ['url' => route('hotels.login-view'), 'title'=>'hotels']);
    }
    public function AllHotels()
    {
        $all = DB::table('hotels')
            ->leftJoin('review_hotels', 'hotels.id', '=', 'review_hotels.Hotel_id')
            ->leftJoin('hotel_infos', 'hotels.id', '=', 'hotel_infos.hotel_id')
            ->leftJoin('cities', 'hotel_infos.id', '=', 'cities.name_en')

            ->select(
                'hotels.id',
                'hotels.Hotel_name',
                'hotels.email',
                'hotels.facilities',
                'hotels.application_documents',
                'cities.name_en',
                DB::raw('round(AVG(review_hotels.rate),2) as average_rate'),

            )
            ->where('status', 1)

            ->groupBy('hotels.id', 'hotels.Hotel_name')
            ->get();
        return view('hotels.hotel_table', compact('all'));
    }
    public function showHotelsRegisterForm()
    {
        return view('hotels.register', ['route' => route('hotels.register-view'), 'title'=>'hotels']);
    }
      public function Hotel_dashboard()
    {
        return view('hotel_dashboard');
    }

    protected function createHotels(Request $request)
    {
        // $this->validator($request->all())->validate();
        $hotels = hotels::create([
            'Hotel_name' => $request['Hotel_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'facilities' => $request['facilities'],
            'city_id'=> $request['city_id'],
            'owner_name'=> $request['owner_name'],
            'application_documents'=> $request['application_documents'],
            'status'=>0,
        ]);
        return redirect()->intended('Hotel_dashboard');
    }
    public function city()
    {
        $cities = city::all();

        return view('hotels.register', compact('cities'));
    }
    public function waitingHotels(Request $request)
    {
        $all = DB::table('hotels')
        ->leftJoin('hotel_infos', 'hotels.id', '=', 'hotel_infos.hotel_id')
        ->leftJoin('cities', 'hotel_infos.id', '=', 'cities.name_en')
            ->select(
                'hotels.id',
                'hotels.Hotel_name',
                'hotels.email',
                'hotels.facilities',
                'hotels.application_documents',
                'cities.name_en',

            )
            ->where('status', 0)

            ->groupBy('hotels.id', 'hotels.Hotel_name','hotels.email', 'hotels.facilities', 'hotels.application_documents', 'cities.name_en')
            ->get();
        return view('hotels.waiting_hotels', compact('all'));

    }
    public function AcceptHotel(Request $request, $id)
    {
        $data = array();
        $data['updated_at'] = date('y-m-d H:i:s');
        $data['status'] = (1);
        $update = DB::table('hotels')
            ->where('id', $id)
            ->update($data);
        $courseN = 'false';
        return redirect()->back()->with('courseN', $courseN);
    }
    public function blockhotel(Request $request, $id)
    {
        $data = array();
        $data['updated_at'] =date('y-m-d H:i:s');
        $data['status'] =  (2);
        $update = DB::table('hotels')
            ->where('id', $id)
            ->update($data);
        $courseN = 'false';
        return redirect()->back()->with('courseN', $courseN);
      }
      public function UpdateBlockedhotel(Request $request, $id)
      {
          $data = array();
          $data['updated_at'] = date('y-m-d H:i:s');
          $data['status'] = (1);
          $update = DB::table('hotels')
              ->where('id', $id)
              ->update($data);
          $courseN = 'false';
          return redirect()->back()->with('courseN', $courseN);
      }
      public function ViewBlockedhotel(Request $request)
      {
        $all = DB::table('hotels')
        ->leftJoin('hotel_infos', 'hotels.id', '=', 'hotel_infos.hotel_id')
        ->leftJoin('cities', 'hotel_infos.id', '=', 'cities.name_en')
                ->select(
            'hotels.id',
            'hotels.Hotel_name',
            'hotels.email',
            'hotels.facilities',
            'hotels.application_documents',
            'cities.name_en',

        )
        ->where('status', 2)

        ->groupBy('hotels.id', 'hotels.Hotel_name','hotels.email', 'hotels.facilities', 'hotels.application_documents', 'cities.name_en')
        ->get();
          return view('hotels.blocked_hotels', compact('all'));
      }
      protected function validator(array $data)
      {
          return Validator::make($data, [
              'Hotel_name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'facilities' => ['required', 'string', 'max:255'],
              'city_id' => ['required', 'string', 'max:255'],
              'owner_name' => ['required', 'string', 'max:255'],
              'application_documents' => ['required', 'string', 'max:255'],


          ]);
      }
      public function addhotelsview()
      {
          return view('hotels.add-hotel');
      }
      public function Inserthotel(Request $request)
      {
          try {
            $hotels = hotels::create([
                'Hotel_name' => $request['Hotel_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'facilities' => $request['facilities'],
                'city_id'=> $request['city_id'],
                'owner_name'=> $request['owner_name'],
                'application_documents'=> $request['application_documents'],
                'status'=>('0'),
            ]);

              $insert = DB::table('hotels')->insert($hotels);
          } catch (\Illuminate\Database\QueryException $ex) {
              // handle the duplicate entry error
              if ($ex->errorInfo[1] == 1062) {
                  $this->validator($request->all())->validate();
              }
          }
          $courseN = 'false';
          return redirect()->back()->with('courseN', $courseN);
      }
}
