@extends('frontend.layoutt.master')
@section('header')
<ul class="dropdown-menu" role="menu">
    @foreach($kategoriler as $kategori)
    <a class="btn btn-lg btn-primary" href="kategoriler/{{$kategori->slug}}" role="button">{{$kategori->kategoriadi}}</a>
<!--            <li><a href="kategoriler/{{$kategori->slug}}">{{$kategori->kategoriadi}}</a></li>-->
            @endforeach
<!--                    <li><a href="#">{{ Session::get('kategori')}}</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>-->
                  </ul>
@stop
@section('content')
<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
          @foreach($resimler as $resim)
        <div class="col-lg-4">
          <img src="{{ URL::to('Backend/makinaresim/'.$resim->resim.'') }}" class="img-responsive">
       
              <b></br>{{$resim->resimisim}}</b></br></br></br></br>
        </div><!-- /.col-lg-4 -->
        
        @endforeach
      </div><!-- /.row -->
@foreach($resimler as $resim)
@if($resim->id%2==1)

      <div class="row featurette">
          
            
        <div class="col-md-7">
            <p class="lead"><b>{{$resim->resimisim}}</b></p>
          <p class="lead">{{$resim->resimbilgi}}</p></br></br></br></br></br></br>
        </div>
        <div class="col-md-5">
            
          <img src="{{ URL::to('Backend/makinaresim/'.$resim->resim.'') }}" class="img-responsive"></br></br></br></br></br></br>
        </div>
          
      </div>
@else
    <div class="row featurette">
        <div class="col-md-5">
          <img src="{{ URL::to('Backend/makinaresim/'.$resim->resim.'') }}" class="img-responsive"></br></br></br></br></br></br>
        </div>
        <div class="col-md-7">
          <p class="lead">{{$resim->resimisim}}</p>
          <p class="lead">{{$resim->resimbilgi}}</p>
        </div>
      </div>
@endif
@endforeach
{{$resimler->links()}}
@stop