   <br/>
  {{ Form::open(['route' => 'comment_path','class'=>'comments__create-form', 'method' => 'post']) }}
        {{ Form::hidden('blog_id',$blog->id) }}
        <div class="form-group">
            {{ Form::label('comment', 'Add a Comment', ['class' => 'control-label']) }}
            {{ Form::textarea('comment', NULL, ['class' => 'form-control']) }}
            {{ $errors->first('comment', '<span class="error">:message</span>') }}
        </div>
    
    {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
    
    {{ Form::close() }}
    <br/>
    <br/>