@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('resim/resimlistele') }}">Resim Listele</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Resim Listele <span>Bu Kısımdan Sistemde Bulunan Tüm Resimleri Listeleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Resim Listesi</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>Resim Katagori</th>
                        <th>Resim Bilgileri</th>
                        <th>Resim</th>
                        <th width="10%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resimler as $resim)
                    <tr>
                        <td>{{$resim->resimler->makinaisim}}</td>
                        <td>{{$resim->resimbilgi}}</td>
                        <td><img src="{{ URL::to('Backend/makinaresim/'.$resim->resim.'') }}" class="img-responsive"></td>
                    <td width="10%">
                        <a href="{{ URL::to('resim/resimduzenle/'.$resim->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
                        <a onclick="return confirm('Seçili Resimyi Silmek İstediğinizden Eminmisiniz ? ')" href="{{ URL::to('resim/resimsil/'.$resim->id.'') }}" class="btn btn-mini btn-danger">Sil</a>
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