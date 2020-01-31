<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>@yield('tittleSite')</title>
  <meta content="Admin Dashboard" name="description" />
  <meta content="Themesbrand" name="author" />
  <link rel="shortcut icon" href="{{ asset('https://image.flaticon.com/icons/svg/2016/2016736.svg')}}">
  <!-- DataTables -->
  <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
  <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">
  <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  <!-- jQuery  -->
  <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css')}}">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
  <script>
  $(function () {
    $('select').selectpicker();
  });
  //por cada select que encuentra en la pagina agrega un atributo ::data-live-search::
  var selects = document.getElementsByTagName('select');
  for (let index = 0; index < selects.length; index++) {
    document.getElementsByTagName("select")[index].setAttribute("data-live-search", "true");
  }
  </script>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper">
    <div class="topbar">
      <div class="topbar-left">
        <a href="{{url('home')}}" class="logo">
          <span><img src="https://image.flaticon.com/icons/svg/2016/2016736.svg" width="15%" alt=""> IoT</span>
          <i><img src="https://image.flaticon.com/icons/svg/2016/2016736.svg" alt="" width="35%"></i>
        </a>
      </div>
      <nav class="navbar-custom">
        <ul class="navbar-right d-flex list-inline float-right mb-0">
          <li class="dropdown notification-list">
            <div class="dropdown notification-list nav-pro-img">
              <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="https://image.flaticon.com/icons/svg/145/145843.svg" alt="user" class="rounded-square">
              </a>
              <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                @if(auth()->check())
                  <a class="dropdown-item" href={{url('/')}}>
                    <i class="mdi mdi-account-circle m-r-5"></i>{{auth()->user()->name}}   </a>
                    {{--<a class="dropdown-item text-danger" ><i class="mdi mdi-account-circle text-danger"></i><span class="badge badge-info"> {{auth()->user()->getRoleNames()}} </span></a> --}}
                  @endif
                  {{--<a class="dropdown-item" href="/wallet"><i class="mdi mdi-wallet m-r-5"></i>Mi billetera <span class="badge badge-warning">{{Auth::user()}}</span></a> --}}
                  {{-- <a class="dropdown-item d-block" href="#"><i class="mdi mdi-settings m-r-5"></i>Ajustes</a> --}}
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i>Cerrar sesión</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" >
                    @csrf
                  </form>
                </div>
              </div>
            </li>
          </ul>
          <ul class="list-inline menu-left mb-0">
            <li class="float-left">
              <button class="button-menu-mobile open-left waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
              </button>
            </li>
          </ul>
        </nav>
      </div>
      <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
          <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
              @include('layouts.roles.'.  auth()->user()->getRoleNames()[0]  )
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">@yield('page_title')</h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">@yield('page_description')</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- end row -->
            @yield('content')
          </div>
        </div>
        <footer class="footer">
          © 2019  <span class="d-none d-sm-inline-block">- Creado por <a href="http://10x.org/" target="_blank">10x Informatica</a></span>
        </footer>
      </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/js/waves.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{ asset('plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <!-- Datatable init js -->

    <script src="{{ asset('assets/pages/datatables.init.js')}}"></script>


    <!-- Peity JS -->
    <script src="{{ asset('plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js')}}"></script>
    <script src="{{ asset('plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{ asset('assets/pages/dashboard.js')}}"></script>
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-md-datetimepicker/js/moment-with-locales.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-md-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js')}}"></script>


    <script src="{{ asset('plugins/flot-chart/jquery.flot.min.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/curvedLines.js')}}"></script>
    <script src="{{ asset('plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ asset('assets/pages/flot.init.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('plugins/chart.js/chart.min.js')}}"></script>
    <!-- Grafics Dashboard-->
    <script src="{{ asset('assets/pages/general-init.js')}}"></script>
    <script src="{{ asset('assets/pages/reports-init.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ asset('assets/pages/form-advanced.js')}}"></script>
    <script src="{{ asset('plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{ asset('plugins/chartist/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('assets/pages/chartist.init.js')}}"></script>



    <script>
    //Bloquear doble envio de formulario******
    enviando = false; //Obligaremos a entrar el if en el primer submit
    function checkSubmit() {
      if (!enviando) {
        enviando= true;
        return true;
      } else {
        //Si llega hasta aca significa que pulsaron 2 veces el boton submit
        alert("El formulario ya se esta enviando");
        return false;
      }
    }
  </script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
  <script>
  $(function () {
    $('select').selectpicker();
  });
  //por cada select que encuentra en la pagina agrega un atributo ::data-live-search::
  var selects = document.getElementsByTagName('select');
  for (let index = 0; index < selects.length; index++) {
    document.getElementsByTagName("select")[index].setAttribute("data-live-search", "true");
  }
  </script>
  @yield('sectionJS')

</body>
</html>
