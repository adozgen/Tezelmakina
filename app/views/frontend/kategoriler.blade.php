@extends('frontend.layout.master')
@section('sidebar')
           @foreach($makinalar as $makina) 
           {{Session::put('makslug',$makina->slug)}}
           <li><p><a class="btn btn-lg btn-primary" href="{{$makina->slug}}" role="button">{{$makina->makinaisim}}</a></p></li>
           
            @endforeach
@stop
@section('content')
<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
          @foreach($mbilgiler as $makale)
        <div class="col-lg-4">
          <img src="{{ URL::to('Backend/makinaresim/'.$makale->resim.'') }}" class="img-responsive">
       
              <b></br>{{$makale->resimisim}}</b>
              <p><a class="btn btn-default" href="{{$makale->resimisim}}/{{$makale->id}}" role="button">Özellikleri Görüntüle &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
        @endforeach
      </div><!-- /.row -->  
@stop