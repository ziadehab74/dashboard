<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;


use App\Http\Traits\ApiResponser;
use App\Models\hotels;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponser;
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function Alluser()
    {
        $all= DB::table('users')
        ->get()
        ->where('approved',1);
        return view('backend.user.all_user' ,compact('all'));
    }
    public function AddUserIndex()
    {
       return view('backend.user.add_user');
    }
    public function Insertuser(Request $request)
    {
        $data= array();
        $data['name'] = $request->name;
        $data['email'] = $request->email ;
        $data['role'] = $request->role ;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('y-m-d H:i:s') ;
        $data['approved']= (1);
        $insert = DB::table('users')->insert($data);
        $courseN = 'false';
        return redirect()->back()->with('courseN',$courseN);


    }
    public function EditUser($id)
    {

        $edit = DB::table('users')->where('id',$id)->first();
        return view('backend.user.edit_user',compact('edit'));


    }
    public function UpdateUser(Request $request,$id)
    {
        $data= array();
        $data['name'] = $request->name;
        $data['email'] = $request->email ;
        $data['role'] = $request->role ;
        $data['password'] = Hash::make($request->password);
        $data['updated_at'] = date('y-m-d H:i:s') ;
        $update = DB::table('users')
        ->where('id',$id)
        ->update($data);

        $courseN = 'false';
        return redirect()->back()->with('courseN',$courseN);


    }
    public function DeleteUser(Request $request,$id)
    {

        $delete = DB::table('users')
        ->where('id',$id)
        ->delete();
        $courseN = 'false';
        return redirect()->back()->with('courseN',$courseN);



    }
    public function ApproveUser(Request $request)
    {
        $all= DB::table('users')
        ->get()
        ->where('approved',0);
        return view('backend.user.approve_user' ,compact('all'));



    }
    public function UpdateApproveUser(Request $request ,$id)
    {

        $data= array();
        $data['updated_at'] = date('y-m-d H:i:s') ;
        $data['approved']= (1);
        $update = DB::table('users')
        ->where('id',$id)
        ->update($data);

        $courseN = 'false';
        return redirect()->back()->with('courseN',$courseN);


    }


    // public function Login(RequestsLoginUserRequest $request)
    // {
    //     $hotels = hotels::where('email', $request->email)->first();

    //     if(!$hotels || !Hash::check($request->password, $hotels->password)) {

    //         return $this->error('The provided credentials are incorrect.', 401);
    //     }

    //     return $this->success([
    //         'token' => $hotels->createToken('api-auth-token')->plainTextToken,
    //         'user' => $hotels,
    //     ], 'You are logged!');
    // }


    public function Register(StoreUserRequest $request)
        {
            // dd($request->password);
            $request->Validated($request->all());

            $hotels = hotels::create([
                'Hotel_name'=>$request->Hotel_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);

            return $this->success([
                'user' => $hotels,
                'token' => $hotels->createToken('api-auth-token')->plainTextToken,
            ] ,'You are Registerd successfully');
        }

}
