@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.categorie')}}" class="btn btn-danger">Add Category</a>
      <a href="{{route('all.category')}}" class="btn btn-info">All category</a>
      <a href="{{route('all.post')}}" class="btn btn-info">All Posts</a>
      <hr>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @endif
     <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
       @csrf
       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Post Title</label>
           <input type="text" class="form-control" placeholder="Post Title" name="title" required>
           <p class="help-block text-danger"></p>
         </div>
       </div>

       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Categorie</label>
           <select class="form-control" name="categorie_id">
             @foreach($category as $row)
               <option value="{{$row->id}}"> {{$row->name}}</option>
               <option  >Rangpur</option>
             @endforeach
           </select>
         </div>
       </div>

       <div class="control-group">
         <div class="form-group col-xs-12 floating-label-form-group controls">
           <label>Post Image</label>
           <input type="file" class="form-control" required name="image">

         </div>
       </div>
       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Post Details</label>
           <textarea rows="5" class="form-control" placeholder="Post Details"  required name="details"></textarea>

         </div>
       </div>
       <br>
       <div id="success"></div>
       <div class="form-group">
         <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
       </div>
     </form>
   </div>
 </div>
</div>
@endsection
