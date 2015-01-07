@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: blog user
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        {{-- successful message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif
        @if($errors->has('model') )
            <div class="alert alert-danger">{{$errors->first('model')}}</div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title bariol-thin">{{isset($blog->id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-user"></i> Create'}} user</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        {{--<a href="{{URL::action('Jai\Authentication\Controllers\UserController@postEditProfile',["user_id" => $user->id])}}" class="btn btn-info pull-right" {{! isset($user->id) ? 'disabled="disabled"' : ''}}><i class="fa fa-user"></i> Edit profile</a>--}}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <h4>Blog data</h4>
                    {{Form::model($blog, [ 'url' => URL::action('AdminBlogController@edit')] ) }}
                    {{-- Field hidden to fix chrome and safari autocomplete bug --}}
{{--                    {{Form::password('__to_hide_password_autocomplete', ['class' => 'hidden'])}}--}}
                    <!-- email text field -->
                    <div class="form-group">
                        {{Form::label('name','Name: *')}}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name', 'autocomplete' => 'on'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('name')}}</span>
                   
                    <div class="form-group">
                        {{Form::label("description","Description")}}
                        {{Form::textarea('description', $blog->description, ['class' => 'form-control', ])}}
                    </div>
                    <div class="form-group">
                        {{Form::label("author","Author Name: ")}}
                        {{Form::text('author', $blog->author, ['class' => 'form-control', 'placeholder' => 'name', 'autocomplete' => 'on'])}}
                    </div> 
                     <div class="form-group">
                        {{Form::label("status"," Status active: ")}}
{{--                        {{Form::select('status', ["1" => "Yes", "0" => "No"], (isset($blog->status) && $blog->status) ? $blog->status : "0", ["class"=> "form-control"] )}}--}}
                        {{Form::radio('status',1,($blog->status==1?true:false)) }}
                          {{Form::label("status"," Status Not active: ")}}
                        {{Form::radio('status',0,($blog->status==0?true:false)) }}
                    </div>
                    {{Form::hidden('id')}}
                    {{Form::hidden('form_name','editpost')}}
                    {{--<a href="{{URL::action('Jai\Authentication\Controllers\UserController@deleteUser',['id' => $user->id, '_token' => csrf_token()])}}" class="btn btn-danger pull-right margin-left-5 delete">Delete user</a>--}}
                    {{Form::submit('Save', array("class"=>"btn btn-info pull-right "))}}
                    {{Form::close()}}
                    </div>
                    {{--<div class="col-md-6 col-xs-12">--}}
                        {{--<h4><i class="fa fa-users"></i> Groups</h4>--}}
                        {{--@include('laravel-authentication-acl::admin.user.groups')--}}

                        {{-- group permission form --}}
                        {{--<h4><i class="fa fa-lock"></i> Permission</h4>--}}
                        {{-- permissions --}}
                        {{--@include('laravel-authentication-acl::admin.user.perm')--}}
                    {{--</div>--}}
                </div>
            </div>
      </div>
</div>
@stop

@section('footer_scripts')
<script>
    $(".delete").click(function(){
        return confirm("Are you sure to delete this item?");
    });
</script>
@stop