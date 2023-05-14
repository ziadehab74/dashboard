<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookedActivityResource;
use App\Models\Activity;
use App\Models\BookedActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class BookedActivityController extends Controller
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

        $bookedActivity = BookedActivityResource::collection(BookedActivity::get());
        return  $this->apiResponse($bookedActivity , "Successfully" , 200);
    }
    public function getById($id)
    {
        //
        $bookedActivity = BookedActivity::find($id);
        if (!$bookedActivity) {
            return $this->apiResponse(null, "bookedActivity not found", 404);
        }
        $bookedActivity = new BookedActivityResource(BookedActivity::find($id));
        return  $this->apiResponse($bookedActivity , "Successfully" , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookedActivity(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'exists:App\Models\User,id',
            'activity_id' =>
            [
                'required',
                Rule::exists(Activity::class, 'id'),
            ],
            'date' => 'required',
            'number_of_people' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors()->first(), 404);
        }
        $bookedActivity = BookedActivity::create($request->all());
        $bookedActivity = new BookedActivityResource($bookedActivity);
        return $this->apiResponse($bookedActivity ,"booked Successfuly" , 201);
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
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function show(BookedActivity $bookedActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(BookedActivity $bookedActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookedActivity  $bookedActivity
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookedActivity $bookedActivity)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookedActivity  $bookedActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookedActivity $bookedActivity)
    {
        //
    }
}
