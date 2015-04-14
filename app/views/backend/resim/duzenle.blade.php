@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('resim/resimduzenle/'.$resim->id.'') }}">Resim Düzenle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Resim Ekle <span>Bu Kısımdan Seçmiş Olduğunuz Resimyi Düzenleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <span class="title">Resim Düzenle</span>
            </div>
            <div class="widget-content form-container">
                <form class="form-horizontal validate" action="{{ URL::to('resim/resimduzenle/'.$resim->id.'') }}" method="post" enctype="Multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="input00">Resim İsim <span class="required">*</span></label>
                        <div class="controls">
                            <input value="{{$resim->resimisim}}" name="resimisim" type="text" id="input00" class="span12" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input01">Resim Kategori </label>
                        <div class="controls">
                            <select name="resimkategori" id="input01" class="span12 select2 required">
                                @foreach($makinalar as $kategori)
                                <option value="{{$kategori->id}}" @if($resim->makina==$kategori->id) selected @endif>{{$kategori->makinaisim}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input03">Resim <span class="required">*</span></label>
                        <div class="controls">
                            <input data-provide="fileinput" name="resim"  type="file" id="input03" class="span12" required>
                        </div>
                    </div>
                    @if($resim->resim!='')
                    <div class="control-group">
                        <label class="control-label">Geçerli Resim </label>
                        <div class="controls">
                            <img src="{{URL::to('Backend/makinaresim/'.$resim->resim.'')}}"/>
                        </div>
                    </div>
                    @endif
                    <div class="control-group">
                        <label class="control-label" for="input02">Resim İçerik </label>
                        <div class="controls">
                            <textarea name="resimbilgi" class="span12 cleditor">{{$resim->resimbilgi}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Güncelle</button>
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