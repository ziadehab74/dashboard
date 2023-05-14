<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use App\Models\User;
use App\Models\VerifyEmail;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class VerifyEmailController extends Controller
{
    public function generateOtp()
    {
        $otp = rand(100000, 999999);
        return $otp;
    }
    //
    public function verifyEmail(Request $request)
    {

        $email = $request->email;
        // check if email is null
        if($email == null)
        {
            return response()->json(['message'=>'Email is required'],400);
        }
        $verifyEmail = VerifyEmail::where('email',$email)->first();
        // check if email is registered
        if($verifyEmail == null)
        {
            return response()->json(['message'=>'Email is not registered'],400);
        }
        if($verifyEmail->created_at->diffInMinutes() > 5)
        {
            $verifyEmail->delete();
            return response()->json([
                'message'=>'OTP expired',
                'email'=>$email,
                "hit"=>"please resend otp"
        ],400);
        }
        if($verifyEmail->otp == $request->otp)
        {
            $verifyEmail->delete();
            if($request->type != 'hotel')
            {
                $user = User::where('email',$email)->first();
                $user->email_verified_at = 1;
                $user->save();
            }else{
                $hotel = hotels::where('email',$email)->first();
                $hotel->email_verified_at = date('Y-m-d H:i:s');
                $hotel->save();
            }

            return response()->json(['message'=>'Email verified successfully'],200);
        }
        else
        {
            return response()->json(['message'=>'Invalid OTP'],400);
        }

    }
    public function sendVerifyEmail(Request $request)
    {
        $email = $request->email;
        // check if email is null
        if($email == null)
        {
            return response()->json(['message'=>'Email is required'],400);
        }else{
            $date = date('Y-m-d H:i:s');
            $otp = $this->generateOtp();
            $data = 'Mail Verification';
            // send otp
            Mail::send('mail', ['data' => $data, 'otp' => $otp],
            function (Message $message) use ($request) {
                $message->to($request->email);
                $message->subject('Mail Verification');
            });
            VerifyEmail::create([
                'email'=>$request->email,
                'otp' => $otp,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
            return response()->json(['message'=>'Email sent successfully'],200);
        }
    }


}
