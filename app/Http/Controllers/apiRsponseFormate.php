<?php
namespace app\Http\Controllers;

trait apiRsponseFormate
{
    public function apiResponse($data = null,$message=null,$status = null )
    {
        $array =
         [
            'message'=>$message,
            'statusCode'=>$status,
            'data' =>$data,

         ];
         return response($array , $status);
    }
}
