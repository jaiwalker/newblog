

@extends('blog::template.main')


@section('content')

  <h1>{{ ucfirst($blog->name); }}</h1>
  <article>
   <p>
       {{ $blog->description }}
   </p>
  </article>
  <p><strong>{{ $blog->author }}</strong></p>
   
   <div>

     @if($comments_settings)

    <h4>Comments</h4>
       @if($comments = $blog->comments) 
                     
               @foreach($comments as $comment )
                   <div class="comment" style="box-shadow:  2px 2px 3px #888888;padding: 3px;">
                   <p></p>
                   <p> {{ $comment->comment }}</p> <small>  by {{ $comment->owner->email}}</small>
                   <br/>
                   </div>
               @endforeach
               
          @endif
      </div>
     
  @if($currentUser) 
    @include('blog::blogs.partials._comment_form')
    
  @endif    
  <br/>

  @endif 

@stop