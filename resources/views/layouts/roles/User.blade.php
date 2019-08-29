@extends('layouts.userInterface')
{{-- Esta vista es un layout correspondiente a un rol (usa un layout padre(userInterface)), será llamada por otras vistas  --}}
@section('menu')
    <li class="has-submenu">
        <a href="#"><i class="mdi mdi-gift"></i>Premios <i class="fas fa-angle-down visible-sm"></i></a>
        <ul class="submenu">
            <li><a href="{{url('/store')}}">Catálogo de premios</a></li>
            <li><a href="{{url('/awards')}}">Mis premios canjeados</a></li>
        </ul>
    </li>
    <li class="has-submenu">
        <a href="{{url('/exchanges')}}"><i class="mdi mdi-sticker"></i>Canjear</a>
    </li>
    <li class="has-submenu">
        <a href="{{url('/contactenos')}}"><i class="fas fa-address-book"></i>Contacto</a>
    </li>
    <li class="has-submenu">
        <a href="{{url('/wallet')}}"><i class="mdi mdi-wallet"></i>Billetera</a>
    </li>
@endsection