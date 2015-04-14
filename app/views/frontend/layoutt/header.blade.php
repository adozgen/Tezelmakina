<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                            
                <a class="btn btn-lg btn-primary" href="{{URL::route('anasayfa')}}" role="button">TEZEL ET MAKİNALARI</a>  
<!--              <a class="navbar-brand" href="#"></a>-->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{URL::route('anasayfa')}}">Anasayfa</a></li>
                <li><a href="{{URL::route('hakkimizda')}}">Hakkımızda</a></li>
                <li><a href="{{URL::route('iletisim')}}">İletişim</a></li>
<!--                <li><a href="{{ URL::to('kategoriler')}}">Kategoriler</a></li>-->
                <li class="dropdown">
                    
                  <a href="{{ URL::to('/')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kategoriler <span class="caret"></span></a>
                  @yield('header')
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>