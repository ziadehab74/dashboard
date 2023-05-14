<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserInterstedResource;
use App\Models\Category;
use App\Models\User_Intersted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class UserInterstedController extends Controller
{
    use apiRsponseFormate;
    //
    public function index()
    {
        $userIntersted = UserInterstedResource::collection(User_Intersted::get());
        return   $userIntersted;
    }
    public function getUserIntersted($id)
    // DB::table('user__intersteds')->where("userID" , $id)->get()
    {   $userIntersted = UserInterstedResource::collection(User_Intersted::where("userID" , $id)->get());
        if($userIntersted){
            return $this->apiResponse($userIntersted,"Successfuly" ,200);
        }
        return $this->apiResponse(null,"Not Found" ,404);
    }
    public function addUserInterstend(Request $request ,)
    {
    $values = $request['id'];
    $userID = $request['userID'];

    $validator = Validator::make($request->all(), [
     'userID' => 'exists:App\Models\User,id',
     'id' =>
     [
         'required',
         Rule::exists(Category::class, 'id'),
     ],
    ]);
    if ($validator->fails()) {
        return $this->apiResponse(null, $validator->errors()->first(), 404);
    }
    try {
        $userIntersted = User_Intersted::create([
            'userID' => $userID,
            'categoryId' => $values
        ]);
        return    $this->apiResponse(
            $values,
            "successfuly",
            200
        ) ;
    } catch (\Illuminate\Database\QueryException $ex) {
        $errorCode = $ex->errorInfo[1];
        if ($errorCode == 1062) {
            return $this->apiResponse(null, "Duplicate Entry", 404);
        }


    }
}
}
