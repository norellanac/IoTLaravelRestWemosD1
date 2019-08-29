@extends('layouts.canjeaton')
@section('menu')
    <li>
        <a href="/home" class="waves-effect">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-sticker"></i> <span> Stickers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href="{{url('/search')}}">Buscar Stickers</a></li>
            <li><a href="{{url('/bulk')}}">Carga Masiva De Stickers</a></li>
            <li><a href={{ route('stickers.create') }}>Nuevo Stickers <i class="mdi mdi-plus"></i></a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-gift"></i>
            <span> Premios <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ route('gifts.create') }}>Crear Premios</a></li>
            <li><a href={{ route('gifts.index') }}>Ver Premios</a></li>
            <li><a href={{ url('specialPrice') }}> Special Price Gifts</a></li>
            <li><a href={{ url('store') }}> Tienda o Catalogo</a></li>
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
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fas fa-dolly">
            </i> <span> Asignacion Stickers <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu collapse" aria-expanded="false">
            <li><a href={{ route('assignment.create') }}>Asignar Productos</a></li>
            <li><a href={{ route('assignment.index') }}>Detalle de Asignaciones</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cart-arrow-down"></i>
            <span> Productos <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span> </a>
        <ul class="submenu">
            <li><a href={{ route('products.create') }}>Crear Productos</a></li>
            <li><a href={{ route('products.index') }}>Ver Productos</a></li>
            <li><a href={{ route('categories.index')}}>Categorias</a></li>
        </ul>
    </li>
@endsection