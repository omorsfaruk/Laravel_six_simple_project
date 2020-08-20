@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.categorie')}}" class="btn btn-danger">Add categorie</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All categorie</a>
      <hr>
      <table class="table table-responsive">
          <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Slug Name</th>
            <th>created at</th>
            <th>Action</th>
          </tr>
          @foreach($category as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->slug}}</td>
            <td>{{$row->created_at}}</td>
            <td>
              <a href="{{URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
              <a href="#" class="btn btn-sm btn-info">Edit</a>
              <a href="{{URL::to('view/category/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
            </td>
          </tr>
          @endforeach
      </table>

   </div>
 </div>
</div>
@endsection
