<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class postController extends Controller
{
  public function writePost()
  {
    $category=DB::table('categories')->get();
    return view('post.writepost',compact('category'));
    return view('post.writepost');
  }
  public function storePost(Request $request)
  {
    $validatedData = $request->validate([
    'title' => 'required|max:155',
    'details' => 'required|max:1000',
    //'imgae' => 'required | mimes:jpeg,jpg,png,PNG | max:3000',
    ]);
    $data=array();
    $data['title']=$request->title;
    $data['categorie_id']=$request->categorie_id;
    $data['details']=$request->details;
    $imgae=$request->file('imgae');
    if ($imgae) {
       $imgae_name= hexdec(uniqid());
       $ext=strtolower($imgae->getClientOriginalExtension());
       $imgae_full_name=$imgae_name.'.'.$ext;
       $upload_path='public/frontend/';
       $imgae_url=$upload_path.$imgae_full_name;
       $success=$imgae->move($upload_path,$imgae_full_name);
       $data['imgae']=$imgae_url;
       DB::table('posts')->insert($data);
       $notification=array(
         'messege'=>'Successfully Post Inserted',
         'alert-type'=>'success'
       );
       return Redirect()->back()->with($notification);
    }else{
      DB::table('posts')->insert($data);
      $notification=array(
        'messege'=>'Successfully Post Inserted',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
  }
  public function allPost()
  {
    $post=DB::table('posts')
        ->join('categories','posts.categorie_id','categories.id')
        ->select('posts.*','categories.name')
        ->get();
    return view('post.allpost',compact('post'));
  }
  public function viewPost($id)
  {
    $post=DB::table('posts')
        ->join('categories','posts.categorie_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
          return view('post.viewpost',compact('post'));
  }
  public function editPost($id)
  {
    $category=DB::table('categories')->get();
    $post=DB::table('posts')->where('id',$id)->first();
    return view('post.editpost',compact('category','post'));
  }
  public function deletePost($id)
  {
    $delete=DB::table('posts')->where('id',$id)->delete();
    if($delete)
    {
      $notification=array(
        'messege'=>'Successfully Post deleted ',
        'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }else {
      $notification=array(
        'messege'=>'something went wrong!',
        'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }
  }
}
