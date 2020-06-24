@extends('layouts.dependencias')
@section('tittleSite','IoT 10x Informatica')
@section('content')
  <div class="card">
    <div class="ex-page-content text-center">
      <img src="{{ asset('imgs/tenex-informatica.png') }}"  height="70px">
      <img src="{{ asset('imgs/iot.png') }}" class="img-fluid" height="200px">
      <a class="btn btn-info mb-5 waves-effect waves-light" href="{{url('login')}}"><i class="mdi mdi-home"></i> Inicio</a>
    </div>
  </div>
@endsection
