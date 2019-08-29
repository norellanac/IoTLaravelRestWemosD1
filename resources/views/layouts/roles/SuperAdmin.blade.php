@extends('layouts.admin')
@section('menu')
    <li>
        <a href="/home" class="waves-effect">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="ion-pie-graph"></i>
            <span> Dashboard <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ url('metrics.index')}}>General</a></li>
            <li><a href={{ url('metrics.create')}}>Metricas por Seller</a></li>
            <li><a href={{ url('metrics.prod')}}>Metricas por Producto</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect">
            <i class="typcn typcn-group"></i>
            <span>Usuarios
                <span class="float-right menu-arrow">
                    <i class="mdi mdi-plus"></i>
                </span>
            </span>
        </a>
        <ul class="submenu">
            <li><a href="{{url('/users')}}">Ver</a></li>
            <li><a href="{{url('/users/create')}}">Agregar</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect">
            <i class="fas fa-user-tag"></i>
            <span>Distribuidor
                <span class="float-right menu-arrow">
                    <i class="mdi mdi-plus"></i>
                </span>
            </span>
        </a>
        <ul class="submenu">
            <li><a href="{{url('/sellers')}}">Ver</a></li>
            <li><a href="{{url('/sellers/create')}}">Agregar</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-sticker"></i> <span> Stickers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href="{{url('/search')}}">Buscar Stickers</a></li>
            <li><a href="{{url('/bulk')}}">Carga Masiva De Stickers</a></li>
            <li><a href={{ url('stickers.create') }}>Nuevo Stickers <i class="mdi mdi-plus"></i></a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-sticker"></i>
            <span>Canjear Stickers
                <span class="float-right menu-arrow">
                    <i class="mdi mdi-plus"></i>
                </span>
            </span>
        </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href="{{url('/exchanges')}}">Canjear</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-money-check-alt">
            </i> <span> Ventas <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href="{{url('/sales')}}">Todas la ventas</a></li>
            <li><a href={{ url('sales.create') }}>Nueva Venta <i class="mdi mdi-plus"></i></a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fas fa-dolly">
            </i> <span> Asignacion Stickers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href={{ url('assignment.create') }}>Asignar Productos</a></li>
            <li><a href={{ url('assignment.index') }}>Detalle de Asignaciones</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect">
            <i class="mdi mdi-tag-multiple"></i>
            <span>Tipo de sticker
                <span class="float-right menu-arrow">
                    <i class="mdi mdi-plus"></i>
                </span>
            </span>
        </a>
        <ul class="submenu">
            <li><a href="{{url('/stickers_types')}}">Ver</a></li>
            <li><a href="{{url('/stickers_types/create')}}">Agregar</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cart-arrow-down"></i>
            <span> Productos <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ url('products.create') }}>Crear Productos</a></li>
            <li><a href={{ url('products.index') }}>Ver Productos</a></li>
            <li><a href={{ url('categories.index')}}>Categorias</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-gift"></i>
            <span> Premios <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ url('gifts.create') }}>Crear Premios</a></li>
            <li><a href={{ url('gifts.index') }}>Ver Premios</a></li>
            <li><a href={{ url('specialPrice') }}> Special Price Gifts</a></li>
            <li><a href={{ url('store') }}> Tienda o Catalogo</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ url('tracking') }}" class="waves-effect">
            <i class="fas fa-truck"></i>
            <span>Envios</span>
        </a>
    </li>
@endsection
