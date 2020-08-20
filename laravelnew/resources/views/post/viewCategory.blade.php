@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.categorie')}}" class="btn btn-danger">Add category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All category</a>
      <hr>
        <div class="">
      <ol>
        <li>Category Name:{{$sohel->name}}</li>
        <li>Slug Name:{{$sohel->slug}}</li>
        <li>Created at:{{$sohel->created_at}}</li>
      </ol>
    </div>
   </div>
 </div>
</div>
@endsection
