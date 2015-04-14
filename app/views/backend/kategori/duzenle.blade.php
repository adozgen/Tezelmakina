@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('kategori/kategoriduzenle/'.$kategori->id.'') }}">Kategori Düzenle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Kategori Düzenle <span>Bu Kısımdan Seçtiğiniz Kategoriyi Düzenleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <span class="title">Kategori Düzenle</span>
            </div>
            <div class="widget-content form-container">
                <form class="form-horizontal validate" action="{{ URL::to('kategori/kategoriduzenle/'.$kategori->id.'') }}" method="post">
                    <div class="control-group">
                        <label class="control-label" for="input00">Kategori Adı <span class="required">*</span></label>
                        <div class="controls">
                            <input value="{{$kategori->kategoriadi}}" name="kategoriadi" type="text" id="input00" class="span12" required>
                        </div>
                    </div>
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

@stop




<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')
@stop