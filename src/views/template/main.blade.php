<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Learning  Bootstrap </title>

	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	    <!-- Optional theme -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	    <!-- Custom styles for this template -->
	  <style id="holderjs-style" type="text/css"></style>
	     <script src="//code.jquery.com/jquery.js"></script>
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
               

	</head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="/blogs">Blogs</a></li>
                 @if (Auth::guest() )
                <li><a href="/register">Registration</a></li>
                @endif

                

              </ul>
               <ul class="nav navbar-nav navbar-right" style="padding-right:50px;">

                 @if($currentUser)
                     <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >

	                        <img src="{{ $currentUser->presenter()->gravatar() }}" alt="{{ $currentUser->email }}"/>
	                      <span class="caret"></span></a>
	                    <ul class="dropdown-menu" role="menu">
	                        {{--<li>{{ link_to_route('profile_path','Your profile',$currentUser->email) }}</li>--}}
	                        <li><a href="#">Another action</a></li>
	                        <li><a href="/user/logout">logout</a></li>

	                      <li class="divider"></li>
	                        <li class="dropdown-header">Nav header</li>
	                        <li><a href="#">Separated link</a></li>
	                        <li><a href="#">One more separated link</a></li>
	                    </ul>
                     </li>
                  @else
                         <li><a href="/login">Login</a></li>
                  @endif
                </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Carousel================================================== -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		@include('flash::message')

       @yield('content')


      <!-- START THE FEATURETTES -->

      {{--<hr class="featurette-divider">--}}

      {{--<div class="row featurette">--}}
        {{--<div class="col-md-7">--}}
          {{--<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>--}}
          {{--<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-5">--}}
          {{--<img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjI1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjMxcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NTAweDUwMDwvdGV4dD48L3N2Zz4=">--}}
        {{--</div>--}}
      {{--</div>--}}

      {{--<hr class="featurette-divider">--}}

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2014 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <!-- Latest compiled and minified JavaScript -->
      

</body></html>
<script>
               	    $('#flash-overlay-modal').modal();
               	    
               	    $('.comments__create-form').on('keydown',function(e){ 
               	        if(e.keyCode == 13){
               	               e.preventDefault();
               	               //console.log($this);
               	                $(this).submit();
               	        }
               	    });
               	  
               	  </script>