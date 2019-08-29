@extends('layouts.userInterface')
{{-- Esta vista es un layout correspondiente a un rol (usa un layout padre(userInterface)), será llamada por otras vistas  --}}
@section('menu')
    <li class="has-submenu">
        <a href="{{url('/sales')}}"><i class="mdi mdi-truck-fast"></i>Ventas</a>
    </li>
    <li class="has-submenu">
        <a href="{{url('/tracking')}}"><i class="mdi mdi-truck-fast"></i>Envios</a>
    </li>
    <li class="has-submenu">
        <a href="{{url('/sellers')}}"><i class="fas fa-address-book"></i>Clientes</a>
    </li>
    <li class="has-submenu">
        <a href="{{url('/profile')}}"><i class="mdi mdi-account-circle"></i>Perfil</a>
    </li>
@endsection