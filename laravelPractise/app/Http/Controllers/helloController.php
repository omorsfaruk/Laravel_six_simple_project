<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
