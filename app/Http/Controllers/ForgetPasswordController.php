<?php

namespace App\Http\Controllers;

use App\Models\ForgetPassword;
use App\Models\hotels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ForgetPasswordController extends Controller
{
    //
    public function generateOtp()
    {
        $otp = rand(100000, 999999);
        return $otp;
    }
    public function sendOtp(Request $requset)
    {
        ForgetPassword::where('email', $requset->email)->delete();
        $user = ($requset->type =='hotel')? hotels::where('email',$requset->email)->first()
        :   User::where('email', $requset->email)->first();
                if ($user == null) {
            return response()->json(['message' => 'Email is not registered'], 400);
        }
        $otp = $this->generateOtp();
        $data = 'Mail Verification';
        Mail::send('mail', ['data' => $data, 'otp' => $otp],
        function (Message $message) use ($requset) {
            $message->to($requset->email);
            $message->subject('Mail Verification');
        });
        $sendOtp =
        ForgetPassword::create([
            'email' => $requset->email,
            'otp' => $otp,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($sendOtp) {
            return response()->json(['message' => 'OTP sent successfully'], 200);
        } else {
            return response()->json(['message' => 'Something went wrong'], 400);
        }
    }

    public function verifyOtp(Request $requset)
    {
        $validator = Validator::make($requset->all(), [
            'password' => 'required|string|min:6',
        ]);
        $verifyOtp = ForgetPassword::where('email', $requset->email)->first();
        if ($verifyOtp == null) {
            return response()->json(['message' => 'Email is not registered'], 400);
        }
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        if ($verifyOtp->created_at->diffInMinutes() > 5) {
            $verifyOtp->delete();
            return response()->json([
                'message' => 'OTP expired',
                'email' => $requset->email,
                "hit" => "please resend otp"
            ], 400);
        }
        if ($verifyOtp->otp == $requset->otp )
        {

            $user = ($requset->type =='hotel')? hotels::where('email',$requset->email)->first()
            :   User::where('email', $requset->email)->first();
            if($user == null)
            {
                return response()->json(['message' => 'Email is not registered'], 400);
            }else if($user->email == $requset->email)
            {
                if($requset->type == 'hotel')
                {

                    $user->password = bcrypt($requset->password);
                    $user->save();
                    $verifyOtp->delete();
                }else{
                    $user->password = bcrypt($requset->password);
                    $user->save();
                    $verifyOtp->delete();
                }

                return response()->json(['message' => 'OTP verified successfully and change Password Successfuly '], 200);
            }else{
                return response()->json(['message' => 'email has problem '], 400);}

        } else {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }
    }

    // public function resetPassword(Request $requset)
    // {
    //     $user = User::where('email', $requset->email)->first();
    //     if ($user == null) {
    //         return response()->json(['message' => 'Email is not registered'], 400);
    //     }
    //     $otp = $this->generateOtp();
    //     $sendOtp =
    //     ForgetPassword::create([
    //         'email' => $requset->email,
    //         'otp' => $otp,
    //         'created_at' => date('Y-m-d H:i:s'),
    //     ]);
    //     if ($sendOtp) {
    //         return response()->json(['message' => 'OTP sent successfully'], 200);
    //     } else {
    //         return response()->json(['message' => 'Something went wrong'], 400);
    //     }
    // }
}
