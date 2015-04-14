@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('kategori/kategorilistele') }}">Kategori Listele</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Kategori Listele <span>Bu Kısımdan Sistemde Bulunan Tüm Kategorileri Listeleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">

    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Kategori Listesi</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th width="10%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($kategoriler as $kategori)
                    <tr>
                        <td>{{$kategori->kategoriadi}}</td>
                    <td width="10%">
                        <a href="{{ URL::to('kategori/kategoriduzenle/'.$kategori->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
                        <a onclick="return confirm('Seçili Kategoriyi Silmek İstediğinizden Eminmisiniz ? ')" href="{{ URL::to('kategori/kategorisil/'.$kategori->id.'') }}" class="btn btn-mini btn-danger">Sil</a>
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