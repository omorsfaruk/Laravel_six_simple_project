@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.categorie')}}" class="btn btn-danger">Add category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All category</a>
      <hr>
        <div class="">

        <p>Category Name:{{$post->name}}</p>
        <h3>{{$post->title}}</h3>
        <img src="{{URL::to($post->image)}}" height="340px;">
        <p>{{$post->details}}</p>

    </div>
   </div>
 </div>
</div>
@endsection
