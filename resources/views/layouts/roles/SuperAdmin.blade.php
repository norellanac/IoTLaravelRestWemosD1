
<li>
  <a href="/home" class="waves-effect">
    <i class="fas fa-chart-line "></i>
    <span>Inicio</span>
  </a>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
    <i class="fas fa-file-alt"></i>
    <span>Reportes
      <span class="float-right menu-arrow">
        <i class="mdi mdi-plus"></i>
      </span>
    </span>
  </a>
  <ul class="submenu">
    <li><a href="{{url('/records/')}}"> Ultimos registros </i></a></li>
    <li><a href="{{url('/search')}}">Por Fechas</a></li>
  </ul>
</li>
<li>
  <a href="javascript:void(0);" class="waves-effect">
    <i class="fas fa-file-alt"></i>
    <span>Dispositivos
      <span class="float-right menu-arrow">
        <i class="mdi mdi-plus"></i>
      </span>
    </span>
  </a>
  <ul class="submenu">
    <li><a href="{{url('/device/')}}"> Ver</i></a></li>
    <li><a href="{{url('/device/create')}}">Crear</a></li>
  </ul>
</li>
{{--<li>
<a href="{{ url('search') }}" class="waves-effect">
<i class="fas fa-search"></i>
<span>Buscar</span>
</a>
</li>--}}
