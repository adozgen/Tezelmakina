@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('iletisim/iletisim') }}">İletişim</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    İletişim <span>Bu Kısımdan İletişim Sayfasını Kontrol Edebilirsiniz</span>
</h1>
@stop
@section('content')

<div class="row-fluid">

    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">İletişim</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                       <th>Email</th>
                        <th>Tel</th>
                        <th>Adres</th>
                        <th width="10%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($iletisim as $bilgi)
                    <tr>
                        <td>{{$bilgi->email}}</td>
                        <td>{{$bilgi->tel}}</td>
                        <td>{{$bilgi->adres}}</td>
                        
                    <td width="10%">
                        <a href="{{ URL::to('iletisim/iletisimduzenle/'.$bilgi->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
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
{{HTML::style('Backend/plugins/ibutton/jquery.ibutton.css')}}


@stop




<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')
<!-- DataTables -->
<script src="{{ URL::to('Backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('Backend/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::to('Backend/plugins/ibutton/jquery.ibutton.min.js') }}"></script>

<script type="text/javascript">
$('.aktif').on('change', function() {
    var id = $(this).attr('data-id');
    if ($(this).is(':checked')) {
        var aktif = 1;
    } else {
        var aktif = 0;
    }
$.getJSON("{{ URL::to('kullanici/kullaniciaktif/') }}/" + id + '/' + aktif, function(event) {
        $.pnotify.defaults.history = false;
        $.pnotify({
            title: event.title,
            text: event.text,
            type: event.type
        });
    });
});
</script>
@stop