@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
  Blog Settings
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
                        <h3 class="panel-title bariol-thin">{{isset($currentUser->id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-user"></i> Create'}} Blog s</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-xs-12">
                    <h4>Settings </h4>
                    {{Form::model($settings,[ 'route' => 'postEditSettings'] ) }}
                     @foreach($settings as $setting)
                    <!-- email text field -->
                    <div class="form-group">
                        Name : {{ $setting->name }}  <br/>
                        Description : {{$setting->description}} <br/>
                        {{Form::label('comments','Comments: *')}}
                       
                        @if($setting->status == 1)
                        ON::{{ Form::radio($setting->name, '1',  true, ['id' => 'Comments']) }}
                        OFF::{{ Form::radio($setting->name, '0',  null, ['id' => 'Comments']) }}
                        @else
                         ON::{{ Form::radio($setting->name, '1',  null, ['id' => 'Comments']) }}
                         OFF::{{ Form::radio($setting->name, '0',  true, ['id' => 'Comments']) }}
                        @endif
                    </div>
                    <span class="text-danger">{{$errors->first('comments')}}</span>
                    @endforeach
                    {{Form::hidden('form_name','blogsettings')}}
                    {{Form::submit('Save', array("class"=>"btn btn-info pull-right "))}}
                    {{Form::close()}}
                    </div>
                  
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