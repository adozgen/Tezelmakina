@extends('backend.admin.layout.master')
@section('breadcrumb')
<li>
    <a href="{{ URL::to('panel') }}">Panel</a>
</li>
@stop
@section('alttitle')
<h1 id="main-heading">
    Panel <span>Bu Kısımdan Sisteminize Ait Güncellemeleri Takip Edebilirsiniz</span>
</h1>
@stop
@section('content')
Bu kısım index blade kısmı
@stop
<!-- Bu kısım bu viewe ait css dosyaları -->
@section('css')
@stop




<!-- Bu kısım bu viewe ait js dosyaları -->
@section('js')

@stop