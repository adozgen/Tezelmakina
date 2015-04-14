@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('kullanici/kullanicilistele') }}">Kullanıcı Listele</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Kullanıcı Listele <span>Bu Kısımdan Sistemde Bulunan Tüm Kullanıcıları Listeleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">

    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Kullanıcı Listesi</span>
        </div>
        <div class="widget-content table-container">
            <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>E-Posta Adresi</th>
                        <th>Durum</th>
                        <th width="10%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->namesurname}}</td>
                        <td>{{$user->email}}</td>
                        <td><input class="aktif" data-id="{{$user->id}}" type="checkbox" data-provide="ibutton" data-label-on="AKTİF" data-label-off="PASİF" @if($user->is_active==1) checked @endif></td>
                    <td width="10%">
                        <a href="{{ URL::to('kullanici/kullaniciduzenle/'.$user->id.'') }}" class="btn btn-mini btn-primary">Düzenle</a>
                        <a onclick="return confirm('Seçili Kullanıcıyı Silmek İstediğinizden Eminmisiniz ? ')" href="{{ URL::to('kullanici/kullanicisil/'.$user->id.'') }}" class="btn btn-mini btn-danger">Sil</a>
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