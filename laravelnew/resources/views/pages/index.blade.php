@extends('welcome')
@section('content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($post as $row)
    <div class="post-preview">
      <a href="{{URL::to('view/post/'.$row->id)}}">

        <h3 class="post-subtitle">
          <img src="{{URL::to($row->imgae)}}" style="height:300px:" alt="">
        </h3>
        <h2 class="post-title">
          {{$row->title}}
        </h2>
      </a>
      <p class="post-meta">Category
        <a href="#">{{$row->name}}</a>
        on Slug {{$row->slug}}</p>
    </div>
    @endforeach

    <hr>

    <hr>
    <!-- Pager -->
    <div class="clearfix">
      <a     {{$post->links()}}</a>
    </div>
  </div>
</div>
@endsection
