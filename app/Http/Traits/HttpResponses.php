<?php
namespace App\Traits;
trait HttpResponses{
protected function success($data ,$message=null,$code=200)
    {
            return response()->json([
                'status'=>'request was succesful.',
                'message'=> $message,
                'data' => $data

            ],$code);

    }

//     @param  string
//  @param  int
//      @param  array|string|null
//      @return \Illuminate\Http\JsonResponse
    protected function error($data ,$message=null,$code=200)
    {
            return response()->json([
                'status'=>'request was handled.',
                'message'=> $message,
                'data' => $data

            ],$code);

    }

}
