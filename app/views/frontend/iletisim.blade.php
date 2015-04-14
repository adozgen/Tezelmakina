@extends('frontend.layoutt.master')
@section('content')
<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <table class="table table-striped data">
                <thead>
                    <tr>
                        <th>EMAİL ADRESİ</th>
                        <th>TEL NO</th>
                        <th>ADRES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($bilgiler as $bilgi)
                    <tr>
                        <td>{{$bilgi->email}}</td>
                        <td>{{$bilgi->tel}}</td>
                        <td>{{$bilgi->adres}}</td>
                    @endforeach

                    </tbody>
            </table>
      </div><!-- /.row -->
@stop
@stop