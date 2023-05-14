<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingRoomResource;
use App\Models\BookingRoom;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Validator;

class BookingRoomController extends Controller
{
    //
    use apiRsponseFormate;
    public function index()
    {
        $bookingRooms = BookingRoom::all();
        return $this->apiResponse( BookingRoomResource::collection($bookingRooms) , "successfuly" , 200);
    }
    public function getBookingRoomById($id)
    {
        $bookingRoom = BookingRoom::find($id);
        return $this->apiResponse(new BookingRoomResource($bookingRoom) , "successfuly" , 200);
    }
    public function getBookingRoomByUserId($id)
    {
        $bookingRoom = BookingRoom::where('user_id' , $id)->get();
        return $this->apiResponse(BookingRoomResource::collection($bookingRoom) , "successfuly" , 200);
    }
    public Function getBookingRoombyHotelID(Request $request){
        $bookingRoom = BookingRoom::where('hotel_id' , $request->hotel_id)->get();
        return $this->apiResponse(BookingRoomResource::collection($bookingRoom) , "successfuly" , 200);
    }
    public Function getBookingRoombyRoomID(Request $request){
        $bookingRoom = BookingRoom::where('room_id' , $request->room_id)->get();
        return $this->apiResponse(new BookingRoomResource($bookingRoom) , "successfuly" , 200);
    }
    public Function createBookingRoom(Request $request)
    {
      $validator =  Validator::make($request->all() ,
      (
        [
            'hotel_info_id' => [
                'required',
                'exists:App\Models\HotelInfo,id',

            ],
            'room_id' => [
                'required',
                'exists:App\Models\Room,id',

            ],
            'user_id' => [
                'required',
                'exists:App\Models\User,id',

            ],
            'num_of_nights' => 'required',
            'num_of_guests' => 'required',
            'total_price' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]));
        if($validator->fails())
        {
            return $this->apiResponse(null , $validator->errors()->first() , 404);
        }
        $bookingRoom = BookingRoom::create([
            'hotel_info_id' => $request->hotel_info_id,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'num_of_nights' => $request->num_of_nights,
            'num_of_guests' => $request->num_of_guests,
            'total_price' => $request->total_price,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => 'cash',
        ]);
        return $this->apiResponse(new BookingRoomResource($bookingRoom) , "successfuly" , 200);
    }


}
