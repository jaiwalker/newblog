<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{{URL::action('Jai\Authentication\Controllers\UserController@editUser')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New</a>
    </div>
</div>
@if( ! $blogs->isEmpty() )
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Blog name</th>
            <th>Author name</th>
            <th>Last Updated</th>
            <th>Active</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td style="width:30%">{{ucfirst($blog->name)}}</td>
                <td style="width:30%">{{ucfirst($blog->author)}}</td>
                <td style="width:30%">{{$blog->updated_at}}</td>
                 <td>{{$blog->status ? '<i class="fa fa-circle green"></i>' : '<i class="fa fa-circle-o red"></i>'}}</td>
                <td style="witdh:10%">
                    @if(! $blog->protected)
                    <a href="{{URL::action('AdminBlogController@edit', ['id' => $blog->id])}}"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="{{URL::action('AdminBlogController@delete',['id' => $blog->id, '_token' => csrf_token()])}}" class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>
                    @else
                        <i class="fa fa-times fa-2x light-blue"></i>
                        <i class="fa fa-times fa-2x margin-left-12 light-blue"></i>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
<span class="text-warning"><h5>No blogs found.</h5></span>
@endif