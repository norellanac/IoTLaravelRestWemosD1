@extends('layouts.admin')
@section('menu')
    <li>
        <a href="/home" class="waves-effect">
            <i class="fas fa-chart-line "></i>
            <span>Inicio</span>
        </a>
    </li>
    {{--<li>
        <a href="javascript:void(0);" class="waves-effect">
            <i class="fas fa-user-tag"></i>
            <span>Dispositivos
                <span class="float-right menu-arrow">
                    <i class="mdi mdi-plus"></i>
                </span>
            </span>
        </a>
        <ul class="submenu">
            <li><a href="{{url('/records/')}}">Reportes</a></li>
            <li><a href="{{url('/search')}}">Buscar</a></li>
        </ul>
    </li>--}}
    <li>
        <a href="{{ url('records') }}" class="waves-effect">
            <i class="fas fa-file-alt"></i>
            <span>Reportes</span>
        </a>
    </li>
    <li>
        <a href="{{ url('search') }}" class="waves-effect">
            <i class="fas fa-search"></i>
            <span>Buscar</span>
        </a>
    </li>
@endsection
