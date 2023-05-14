<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use App\Models\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\VerificationEmail;
use Validator;
use App\Notifications\EmailVerificationNotification;
use App\Models\VrifyEmail;
class AuthController extends Controller
{
    use apiRsponseFormate;
    //
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function generateOtp()
    {
        $otp = rand(100000, 999999);
        return $otp;
    }
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'status'=>'required',
            'nationality'=>'required',
            'location'=>'required',
            'profile_image'=>'required',
            'birthday'=> 'required'
        ]);
        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors()->first(),422);
        }
        $user = User::create(
            array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password) ,
                    'location'=>$request->location,
                    ]
                ));
                // $date = date('Y-m-d H:i:s');
                // $otp = $this->generateOtp();
                // $data = 'Mail Verification';
                // send otp
                // Mail::send('mail', ['data' => $data, 'otp' => $otp],
                // function (Message $message) use ($request) {
                //     $message->to($request->email);
                //     $message->subject('Mail Verification');
                // });
                // VerifyEmail::create([
                //     'email'=>$request->email,
                //     'otp' => $otp,
                //     'created_at' => $date,
                //     'updated_at' => $date,
                // ]);
                // send otp end
            return $this->apiResponse($user,'User Register Successfully',200);
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }


}
