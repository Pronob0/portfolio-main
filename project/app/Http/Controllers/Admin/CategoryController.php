<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Gig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $data['categories']=Category::paginate(12);
        return view('admin.category.index',$data);
    }

    public function store(Request $request){

        $rules=
        [
            'name' => 'required|unique:categories|max:50',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $slug=Str::slug($request->name);
        $data = new Category();
        $input = $request->all();
        $data->slug=$slug;
        $data->fill($input)->save();
        $msg = 'Successfully Created Category';
        return response()->json($msg);
    }

    public function edit($slug){
        $data['category']=Category::where('slug',$slug)->first();
        return view('admin.category.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $rules=
        [
            'name' => 'required|max:50',
        ];
       
        $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          $slug=Str::slug($request->name);
          $input = $request->all();
          $input['slug']=$slug;
          $input['status']=$request->status;

          if(Category::where('slug',$input['slug'])->where('id','!=',$data->id)->exists()){
            return response()->json(array('errors' => [0 =>'This Name has already been taken.']));
        }
           $data->fill($input)->update();
          $msg = __('Data Updated Successfully.');
          return response()->json($msg);
    }


    public function destroy($id){
        $category=Category::findOrFail($id);
        Gig::where('category_id',$category->id)->delete();
        $category->delete();
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);

    }
}
