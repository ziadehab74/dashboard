<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CategoryController extends Controller
{
    use apiRsponseFormate;
    public function index()
    {
        //
        // $category =  Category ::all();
        $category =  Category ::get();

        return $this->apiResponse($category , "successfuly" , 200);
    }
    public function create(Request $request)
    {
        //
        $category = new Category();
        // $category->name = $request->name;
        // $category->save();
        // $data = array(
        //     'message' => 'Sucessfuly',
        //     'stutus code' => '200',
        //     'id' =>$category->id,
        //     'name'=>$category->name,
        //   );
         $category =  $category::create([
            'name' =>$request->name
          ]);
        return  $this->apiResponse($category , "successfuly" , 200);

    }
    public function update(Request $request)
    {

        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
       $validator =   Validator::make($request->all(),[
            'id'=>'required|exists:categories,id',
            'name'=>'required'
        ]);
        if($validator->fails()){
            return $this->apiResponse(null , $validator->errors()->first() , 404);
        }
        $category = Category::find($request->id);
        $category->name = $request->name;
        $result=$category->save();
        return $this->apiResponse($result , "successfully" , 200);


    }
    public function delete($id)
    {
        //
        // search id in data base
        // $category = Category::find($id);
        // $category = Category::where('id',$id);
        try{
            $category = Category::findorFail($id)->delete();

            return ["result"=>"record is deleted"];
        } catch(\Exception $e){
            return ["result"=>"record is not deleted"];
        }



    }
    public function addUserCategory(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'user_id' => 'required',
        ]);
        $categoryID = $request->category;
        $user_id = $request->user_id;
        // foreach ($categoryID as $category) {

        //     DB::table('user__intersteds')->insert([
        //         'user_id' => $user_id,
        //         'category_id' => $category,
        //     ]);
        // }

        return $categoryID;

    }
}
