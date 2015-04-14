@extends('frontend.layout.detay')
@section('content')
<div class="container marketing">
          @foreach($mbilgiler as $makale)
           <div class="row featurette">
        <div class="col-md-7">
          <img src="{{ URL::to('Backend/makinaresim/'.$makale->resim.'') }}" class="img-responsive"></br></br></br></br></br></br>
        </div>
        <div class="col-md-5">
          <p class="lead">{{$makale->resimisim}}</p>
          <p class="lead">{{$makale->resimbilgi}}</p>
        </div>            
      </div>
        
               
                         <center><p><a class="btn btn-lg btn-primary" href="{{URL::route('makinalar')}}" role="button">GERİ</a></p></center>

               
        @endforeach
      </div><!-- /.row -->
@stop
@stop