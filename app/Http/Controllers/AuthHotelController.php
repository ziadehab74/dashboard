<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthHotelController extends Controller
{
    //
    use apiRsponseFormate;
    public function register(Request $request)
    {

        $data = hotels::create([
            'Hotel_name' => $request->Hotel_name    ,
            'email' => $request->email,
            'facilities'=>$request->facilities,
            'owner_name'=>$request->owner_name,
            'image'=>$request->image,
            'application_documents'=>$request->application_documents,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(compact('data'), 201);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = Auth::guard('hotel-api')->attempt($credentials)) {
                return response()->json(['message' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token'], 500);
        }
        $hotel = hotels::where('email', $request->email)->first();

        return $this->createNewToken($token);
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('hotel-api')->factory()->getTTL() * 60,
            'user' => auth()->guard('hotel-api')->user(),
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->guard('hotel-api')->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->guard('hotel-api')->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->guard('hotel-api')->user());
    }
}
