@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('hakkimizda/hakkimizdalistele') }}">Hakkımızda</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Hakkımızda <span>Bu Kısımdan Hakkımızda Sayfasını Kontrol Edebilirsiniz</span>
</h1>
@stop
@section('content')

<div class="row-fluid">

    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Hakkımızda</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>Hakkımızda</th>
                        <th width="10%">İşlem</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($hakkimizda as $hak)
                    <tr>
                        <td>{{$hak->hakkimizda}}</td>
                    <td width="10%">
                        <a href="{{ URL::to('hakkimizda/hakkimizdaduzenle/'.$hak->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
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