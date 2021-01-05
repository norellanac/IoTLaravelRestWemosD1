
<li>
  <a href="/home" class="waves-effect">
    <i class="fas fa-chart-line "></i>
    <span>Inicio</span>
  </a>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
      <i class="typcn typcn-group"></i><span>Usuarios <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
  </a>
  <ul class="submenu">
      <li><a href="{{ url('users') }}">Ver</a></li>
      <li><a href="{{ url('users/create') }}">Agregar</a></li>
  </ul>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
      <i class="typcn typcn-group"></i><span>Empresas <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
  </a>
  <ul class="submenu">
      <li><a href="{{ url('company') }}">Ver</a></li>
      <li><a href="{{ url('company/create') }}">Agregar</a></li>
  </ul>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
      <i class="typcn typcn-group"></i><span>Area <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
  </a>
  <ul class="submenu">
      <li><a href="{{ url('area') }}">Ver</a></li>
      <li><a href="{{ url('area/create') }}">Agregar</a></li>
  </ul>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
    <i class="ion-pie-graph"></i><span>Reportes <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
  </a>
  <ul class="submenu">
    <li><a href="{{url('/records/')}}"> Ultimos registros </i></a></li>
    <li><a href="{{url('/search')}}">Por Fechas</a></li>
  </ul>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
    <i class="fas fa-laptop"></i><span>Dispositivos <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
  </a>
  <ul class="submenu">
    <li><a href="{{url('/device/')}}"> Ver</i></a></li>
    <li><a href="{{url('/device/create')}}">Crear</a></li>
  </ul>
</li>