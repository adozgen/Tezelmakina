@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('makinadetay/makinaekle') }}">Makina Ekle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Makina Ekle <span>Bu Kısımdan Sisteme Makina Ekleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <span class="title">Makina Ekle</span>
            </div>
            <div class="widget-content form-container">
                <form class="form-horizontal validate" action="{{ URL::to('makinadetay/makinaekle') }}" method="post" enctype="Multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="input00">Makina İsim <span class="required">*</span></label>
                        <div class="controls">
                            <input name="makinaisim" type="text" id="input00" class="span12" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Makina Kategori </label>
                        <div class="controls">
                            <select name="makinakategori" id="input01" class="span12 select2 required">
                                @foreach($kategoriler as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->kategoriadi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
<!--                    <div class="control-group">
                        <label class="control-label" for="input03">Makina Resim <span class="required">*</span></label>
                        <div class="controls">
                            <input data-provide="fileinput" name="makinaresim" type="file" id="input03" class="span12" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input04">Makina Fiyat <span class="required">*</span></label>
                        <div class="controls">
                            <input name="makinafiyat" type="text" id="input04" class="span12" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input02">Makina Özellikleri <span class="required">*</span></label>
                        <div class="controls">
                            <textarea name="makinaozellik" class="span12 cleditor" required></textarea>
                        </div>
                    </div>-->
                    
<!--                    <div class="control-group">
                        <label class="control-label" for="input04">Makina Fiyat </label>
                        <div class="controls">
                            <input name="makinafiyat" type="text" id="input04" class="span12" >
                        </div>
                    </div>-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Kaydet</button>
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