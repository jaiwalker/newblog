@extends('blog::template.main')


@section('content')
<!-- Three columns of text below the carousel -->
      <div class="row">
     <h4>
     {{ ($currentUser) ?"welcome, ". $currentUser->email: "why dont you sign up " }}
     </h4>
      @foreach($blogs as $blog)
        <div class="col-lg-4">
          <img class="img-circle" src="http://lorempixel.com/140/140/business/" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>{{ $blog->name }}</h2>
          <p>{{ $blog->description }}</p>
          <p><a class="btn btn-default" href="blogs/{{$blog->id}}" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
      @endforeach
      </div><!-- /.row -->
<h3>Create new posts </h3>
<!-- Never menction blade .php and ;-->
@include('blog::blogs/partials/_form')

@stop