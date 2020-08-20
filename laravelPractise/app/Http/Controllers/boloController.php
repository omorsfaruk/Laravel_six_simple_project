<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class boloController extends Controller
{
  
    public function addCategorie()
    {
      return view('post.addcategorie');
    }
    public function storeCategory(Request $request)
    {
         $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255|min:2',
        'slug' => 'required|unique:categories|max:255|min:2',
        ]);

       $data=array();
       $data['name']=$request->name;
       $data['slug']=$request->slug;
       $category=DB::table('categories')->insert($data);
       //return response()->json($data);
       if ($category){
         $notification=array(
           'messege'=>'Successfully Category Inserted',
           'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);
       }else{
         $notification=array(
           'messege'=>'something went wrong!',
           'alert-type'=>'error'
         );
         return Redirect()->back()->with($notification);
       }
    }
    public  function allCategory()
    {
      $category=DB::table('categories')->get();
      return view('post.all_category',compact('category'));
    }
    public function viewCatetory($id)
    {
      $category=DB::table('categories')->where('id',$id)->first();
      //return response()->json($category);
      return view('post.viewCategory')->with('sohel',$category);
    }
    public function deleteCatetory($id)
    {
      $delete=DB::table('categories')->where('id',$id)->delete();
      $notification=array(
        'messege'=>'Successfully Category deleted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
}
