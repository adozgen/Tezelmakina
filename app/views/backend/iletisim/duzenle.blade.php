@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('iletisim/iletisimduzenle/'.$iletisim->id.'') }}">İletişim Düzenle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    İletişim Düzenle <span>Bu Kısımdan Seçtiğiniz İletişimyi Düzenleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <span class="title">İletişim Düzenle</span>
            </div>
            <div class="widget-content form-container">
                <form class="form-horizontal validate" action="{{ URL::to('iletisim/iletisimduzenle/'.$iletisim->id.'') }}" method="post">
<!--                    <div class="control-group">
                        <label class="control-label" for="input00">İletişim Adı <span class="required">*</span></label>
                        <div class="controls">
                            <input value="{{$iletisim->iletisim}}" name="kategoriadi" type="text" id="input00" class="span12" required>
                        </div>
                    </div>-->
<div class="control-group">
                        <label class="control-label" for="input00">Tel <span class="required">*</span></label>
                        <div class="controls">
                            <input value="{{$iletisim->tel}}" name="tel" type="text" id="input00" class="span12" required>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="input01">E-Posta Adresi <span class="required">*</span></label>
                        <div class="controls">
                            <input value="{{$iletisim->email}}" name="email" type="email" id="input01" class="span12" required>
                        </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="input02">İletişim <span class="required">*</span></label>
                        <div class="controls">
                            
                            <textarea name="adres" class="span12 cleditor" >{{$iletisim->adres}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Guncelle</button>
                        <button type="reset" class="btn btn-danger" type="reset">İptal Et</button>
                        <button onclick="geridon()" type="button" class="btn btn-inverse pull-right">Geri Dön</button>
                    </div>
                    {{Form::token()}}
                </form>
            </div>
        </div>


    </div>
</div>

@stop




<!-- Bu kısım bu viewe ait css dosyaları -->
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::to('Backend/plugins/select2/select2.css') }}" media="screen">
    <!-- CLEditor -->
    <link rel="stylesheet" href="{{ URL::to('Backend/plugins/cleditor/jquery.cleditor.css') }}" media="screen">
        @stop




        <!-- Bu kısım bu viewe ait js dosyaları -->
        @section('js')
        <!-- Select2 -->
        <script src="{{ URL::to('Backend/plugins/select2/select2.min.js') }}"></script>
        <!-- CLEditor -->
        <script src="{{ URL::to('Backend/plugins/cleditor/jquery.cleditor.min.js') }}"></script>
        <script src="{{ URL::to('Backend/plugins/cleditor/jquery.cleditor.icon.min.js') }}"></script>
        <script src="{{ URL::to('Backend/plugins/cleditor/jquery.cleditor.table.min.js') }}"></script>
        <script src="{{ URL::to('Backend/plugins/cleditor/jquery.cleditor.xhtml.min.js') }}"></script>
        {{HTML::script('Backend/custom-plugins/bootstrap-fileinput.min.js')}}
        @stop