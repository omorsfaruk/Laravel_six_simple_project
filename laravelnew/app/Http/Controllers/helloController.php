<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class helloController extends Controller
{
  public function about()
  {
    return view('pages.about');
  }
  public function contact()
  {
    return view('pages.contact');
  }
  public function index()
  {
     $post=DB::table('posts')->join('categories','posts.categorie_id','categories.id')
             ->select('posts.*','categories.name','categories.slug')->paginate(3);
     return view('pages.index',compact('post'));
  }
}
