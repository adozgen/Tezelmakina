@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('makinadetay/makinalistele') }}">Makale Listele</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Makina Listele <span>Bu Kısımdan Sistemde Bulunan Tüm Makinaları Listeleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Makina Listesi</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>Makina İsmi</th>
                        <th>Kategori Adı</th>
<!--                        <th>Makina Özellikleri</th>
                        <th>Makina Fiyat</th>-->
                        <th width="10%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($makinadetay as $makina)
                    <tr>
                        <td>{{$makina->makinaisim}}</td>
                        <td>{{$makina->kategoriler->kategoriadi}}</td>
<!--                        <td>{{$makina->makinaozellik}}</td>
                        <td>{{$makina->makfiyat}}</td>-->
                    <td width="10%">
                        <a href="{{ URL::to('makinadetay/makinaduzenle/'.$makina->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
                        <a onclick="return confirm('Seçili Makinaya Ait Bilgileri Silmek İstediğinizden Eminmisiniz ? ')" href="{{ URL::to('makinadetay/makinasil/'.$makina->id.'') }}" class="btn btn-mini btn-danger">Sil</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>


@stop




<!-- Bu kısım bu viewe ait css dosyaları -->
@section('css')


@stop




<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')
<!-- DataTables -->
<script src="{{ URL::to('Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('Backend/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::to('Backend/plugins/ibutton/jquery.ibutton.min.js') }}"></script>

@stop