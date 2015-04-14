<aside id="sidebar">
    <nav id="navigation" class="collapse">
        <ul>
            <li @if(Request::segment(1)=='Ayarlar') class="active" @endif>
                <span title="Ayarlar">
                    <i class="icon-home"></i>
                    <span class="nav-title">Ayarlar</span>
                </span>
                <ul class="inner-nav">
                    <li @if(Request::segment(2)=='Hakkımızda') class="active" @endif><a href="{{ URL::to('hakkimizda/hakkimizdalistele') }}"><i class="icon-list"></i> Hakkımızda</a></li>
                <li @if(Request::segment(2)=='Hakkımızda') class="active" @endif><a href="{{ URL::to('iletisim/iletisim') }}"><i class="icon-list"></i> İletişim</a></li>
                
                </ul>
            </li>
            <li @if(Request::segment(1)=='kullanici') class="active" @endif>
                <span title="Kullanıcı">
                    <i class="icon-official"></i>
                    <span class="nav-title">Kullanıcı</span>
                </span>
                <ul class="inner-nav">
                    <li @if(Request::segment(2)=='kullaniciekle') class="active" @endif><a href="{{ URL::to('kullanici/kullaniciekle') }}"><i class="icon-plus-sign"></i> Kullanıcı Ekle</a></li>
                    <li @if(Request::segment(2)=='kullanicilistele') class="active" @endif><a href="{{ URL::to('kullanici/kullanicilistele') }}"><i class="icon-list"></i> Kullanıcı Listesi</a></li>
                </ul>
            </li>
            <li @if(Request::segment(1)=='kategori') class="active" @endif>
                <span title="Kategori">
                    <i class="icon-align-justify"></i>
                    <span class="nav-title">Kategori</span>
                </span>
                <ul class="inner-nav">
                    <li @if(Request::segment(2)=='kategoriekle') class="active" @endif><a href="{{ URL::to('kategori/kategoriekle') }}"><i class="icon-plus-sign"></i> Kategori Ekle</a></li>
                    <li @if(Request::segment(2)=='kategorilistele') class="active" @endif><a href="{{ URL::to('kategori/kategorilistele') }}"><i class="icon-list"></i> Kategori Listesi</a></li>
                </ul>
            </li>
            <li @if(Request::segment(1)=='makinadetay') class="active" @endif>
                <span title="Makinalar">
                    <i class="icon-archive"></i>
                    <span class="nav-title">Makinalar</span>
                </span>
                <ul class="inner-nav">
                    <li @if(Request::segment(2)=='makinaekle') class="active" @endif><a href="{{ URL::to('makinadetay/makinaekle') }}"><i class="icon-plus-sign"></i> Makina Ekle</a></li>
                    <li @if(Request::segment(2)=='makinalistele') class="active" @endif><a href="{{ URL::to('makinadetay/makinalistele')}}"><i class="icon-list"></i> Makina Listele</a></li>
                </ul>
            </li>
            <li @if(Request::segment(1)=='makresim') class="active" @endif>
                <span title="Makina Resimleri">
                    <i class="icon-archive"></i>
                    <span class="nav-title">Makina Resimleri</span>
                </span>
                <ul class="inner-nav">
                    <li @if(Request::segment(2)=='resimyukle') class="active" @endif><a href="{{ URL::to('resim/resimyukle') }}"><i class="icon-plus-sign"></i>Resim Ekle</a></li>
                    <li @if(Request::segment(2)=='resimlistele') class="active" @endif><a href="{{ URL::to('resim/resimlistele')}}"><i class="icon-list"></i> Resim Listele</a></li>
                </ul>
            </li>
            
            
        </ul>
    </nav>
</aside>

<div id="sidebar-separator"></div>