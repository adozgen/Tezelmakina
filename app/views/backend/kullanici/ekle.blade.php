@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
<a href="{{ URL::to('kullanici/kullaniciekle') }}">Kullanıcı Ekle</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
Kullanıcı Ekle <span>Bu Kısımdan Sisteme Kullanıcı Ekleyebilirsiniz</span>
</h1>
@stop
@section('content')
<div class="row-fluid">
<div class="span12">
<div class="widget">
<div class="widget-header">
<span class="title">Kullanıcı Ekle</span>
</div>
<div class="widget-content form-container">
<form class="form-horizontal validate" action="{{ URL::to('kullanici/kullaniciekle') }}" 
method="post" enctype="Multipart/form-data">
<div class="control-group">
<label class="control-label" for="input00">Ad Soyad <span class="required">*</span></label>
<div class="controls">
<input name="adsoyad" type="text" id="input00" class="span12" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="input01">E-Posta Adresi <span class="required">*</span></label>
<div class="controls">
<input name="email" type="email" id="input01" class="span12" required>
</div></div>
<div class="control-group">
<label class="control-label" for="input02">Şifre <span class="required">*</span></label>
<div class="controls">
<input name="password" type="password" id="input02" class="span12" required>
</div></div>
<div class="control-group">
<label class="control-label" for="input03">Profil Resmi</label>
<div class="controls">
<input name="profil" type="file" id="input03" data-provide="fileinput">
</div>
</div>
<div class="form-actions">
<button type="submit" class="btn btn-success">Kaydet</button>
<button type="reset" class="btn btn-danger" type="reset">İptal Et</button>
<button onclick="geridon()" type="button" class="btn btn-inverse pull-right">Geri Dön</button>
</div>
{{Form::token()}}
</form></div></div></div></div>
@stop
<!-- Bu kısım bu viewe ait css dosyaları -->
@section('css')
@stop
<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')
{{HTML::script('Backend/custom-plugins/bootstrap-fileinput.min.js')}}
@stop