@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
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
     <form action=" " method="post" enctype="multipart/form-data">
       @csrf
       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Post Title</label>
           <input type="text" class="form-control"  value="{{$post->title}}" name="title" required>
           <p class="help-block text-danger"></p>
         </div>
       </div>

       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Categorie</label>
           <select class="form-control" name="categorie_id">
             @foreach($category as $row)
               <option value="{{$row->id}}"> <?php if($row->id == $post->categorie_id) echo "selected"; ?> {{$row->name}}</option>
               <option  >Rangpur</option>
             @endforeach
           </select>
         </div>
       </div>

       <div class="control-group">
         <div class="form-group col-xs-12 floating-label-form-group controls">
           <label>Post Image</label>
           <input type="file" class="form-control" required name="image"><br>
           Old image: <img src="{{URL::to($post->imgae)}}" style=" height: 40px; width:80px; " alt="">

         </div>
         <br><br>
       </div>
       <div class="control-group">
         <div class="form-group floating-label-form-group controls">
           <label>Post Details</label>
           <textarea rows="5" class="form-control"  required name="details">
             {{$post->details}}
           </textarea>

         </div>
       </div>
       <br>
       <div id="success"></div>
       <div class="form-group">
         <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
       </div>
     </form>
   </div>
 </div>
</div>
@endsection
