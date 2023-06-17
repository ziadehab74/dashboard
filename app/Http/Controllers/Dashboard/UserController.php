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
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiResponser;
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function all_user(){
        $all = DB::table('users')
        ->get()
        ->whereNotIn('type',3);
        ;
    return view('users.all-user', compact('all'));
      }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nationality' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],


        ]);
    }
    public function AddUserIndex()
    {
        return view('users.add-user');
    }
    public function Insertuser(Request $request)
    {
        try {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['status'] = $request->status;
            $data['nationality'] = $request->nationality;
            $data['password'] = Hash::make($request->password);

            $insert = DB::table('users')->insert($data);
        } catch (\Illuminate\Database\QueryException $ex) {
            // handle the duplicate entry error
            if ($ex->errorInfo[1] == 1062) {
                $this->validator($request->all())->validate();
            }
        }
        $courseN = 'false';
        return redirect()->back()->with('courseN', $courseN);
    }
    public function EditUser($id)
    {
        $edit = DB::table('users')->where('id', $id)->first();
        return view('users.edit-user', compact('edit'));
    }
    public function UpdateUser(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['status'] = $request->status;
        $data['nationality'] = $request->nationality;
        $data['password'] = Hash::make($request->password);
        $update = DB::table('users')->update($data);
        $courseN = 'false';
        $courseN = 'false';
        return redirect()->back()->with('courseN',$courseN);
         }

    public function blockuser(Request $request, $id)
    {
        $data = array();
        $data['updated_at'] =date('y-m-d H:i:s');
        $data['type'] =  (3);
        $update = DB::table('users')
            ->where('id', $id)
            ->update($data);
        $courseN = 'false';
        return redirect()->back()->with('courseN', $courseN);
      }
    public function ViewBlockedUser(Request $request)
    {
        $all = DB::table('users')
            ->get()
            ->where('type', 3);
        return view('users.blocked_user', compact('all'));
    }
    public function UpdateBlockedUser(Request $request, $id)
    {
        $data = array();
        $data['updated_at'] = date('y-m-d H:i:s');
        $data['type'] = (1);
        $update = DB::table('users')
            ->where('id', $id)
            ->update($data);
        $courseN = 'false';
        return redirect()->back()->with('courseN', $courseN);
    }
}
