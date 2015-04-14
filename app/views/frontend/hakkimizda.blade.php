@extends('frontend.layoutt.master')
@section('content')
<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
          @foreach($bilgiler as $bilgi)
        <div class="col-md-7">
            <center> <p class="lead"><h2>HAKKIMIZDA</h2></p></center>
        <center><p class="lead">{{$bilgi->hakkimizda}}</p></center></br></br></br></br></br></br>
        </div>
        
        @endforeach
      </div><!-- /.row -->
@stop
@stop