<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::to('Frontend/docs/favicon.ico') }}">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('Frontend/docs/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ URL::to('Frontend/docs/dashboard.css') }}" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ URL::to('Frontend/docs/assets/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        @include('frontend.layout.header')  
      </nav>
        <div class="container-fluid">
      <div class="row">
        @include('frontend.layout.sidebar')
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
            @include('frontend.layout.dashboard')
            @yield('content')

          @include('frontend.layout.footer')
          </div>
                </div>
      </div>
             

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ URL::to('Frontend/docs/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('Frontend/docs/assets/js/docs.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ URL::to('Frontend/assets/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>
