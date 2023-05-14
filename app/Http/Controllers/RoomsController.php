<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    use apiRsponseFormate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = RoomResource::collection(Room::all());
        return $this->apiResponse($rooms,"successfuly",200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $rooms = Room::create([
            "Hotel_id" => $request->Hotel_id,
            "numnberOfBeds" => $request->numnberOfBeds,
            "booked" => $request->booked,
            "priceperDay" => $request->priceperDay,
            "images" => $request->images,
            "descripions" => $request->descripions,

        ]);
        return $rooms;

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
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $rooms = Room::find($id);
        $rooms = $rooms->update($request->all());
        return $this->apiResponse($rooms , "succsessfly" ,200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rooms $rooms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rooms = Room::find($id);
        $rooms->delete();
        return $this->apiResponse(null , "delete successfuly" ,200);
    }
}
