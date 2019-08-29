@extends('layouts.canjeaton')
@section('menu')
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="ion-pie-graph"></i>
            <span> Dashboard <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ route('metrics.index')}}>General</a></li>
            <li><a href={{ route('metrics.create')}}>Metricas por Seller</a></li>
            <li><a href={{ route('metrics.prod')}}>Metricas por Producto</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fas fa-dolly">
            </i> <span> Asignacion Stickers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href={{ route('assignment.create') }}>Asignar Productos</a></li>
            <li><a href={{ route('assignment.index') }}>Detalle de Asignaciones</a></li>
        </ul>
    </li>
@endsection