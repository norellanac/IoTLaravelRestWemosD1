<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Canjeaton</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/styleHMenu.css')}}" rel="stylesheet" type="text/css">
    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <!-- Sweet Alert -->
    <link href="../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- DEPENDENCIA PARA SEARCH EN SELECTS Latest compiled and minified CSS -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script>
<script>
    //https://marcbruederlin.github.io/particles.js/
    window.onload = function() {
        Particles.init({
            color: '#E89304',
            maxParticles: 130,
            connectParticles: true,
            speed: 1,
            selector: '.background',
            responsive: [{
                breakpoint: 425,
                options: {
                    color: '#E89304',
                    maxParticles: 30,
                    connectParticles: true,
                    speed: 1
                }
            }, {
                breakpoint: 320,
                options: {
                    color: '#E89304',
                    maxParticles: 15,
                    connectParticles: true,
                    speed: 1
                }
            }
            ]
        });
    };
</script>
<style>
    html,
    body {
        margin: 0;
        padding: 0;
    }

    .background {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        z-index: 0;
    }
</style>

<!-- Navigation Bar-->
<header id="topnav" >
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">

                <a href="{{url('/')}}" class="logo">
                    <img src="{{ asset('assets/images/logo-sm.png')}}" class="d-inline d-sm-none"  width="" alt="">
                    <img src="{{ asset('assets/images/logo.png')}}" class="d-none d-sm-block d-md-block d-lg-block" width=""  alt="">
                </a>

            </div>

            <!-- End Logo container-->
            @if(auth()->check())
                <div class="menu-extras topbar-custom" >

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="/storage/{{auth()->user()->url_image}}" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    @if(auth()->check())
                                        <a class="dropdown-item" href={{route('profile.index')}}>
                                            <i class="mdi mdi-account-circle m-r-5"></i>{{auth()->user()->name}} <span class="badge badge-info"> {{auth()->user()->getRoleNames()[0]}} </span></a>
                                    @endif
                                    <a class="dropdown-item" href="/wallet"><i class="mdi mdi-wallet m-r-5"></i>Mi billetera <span class="badge badge-warning">{{Auth::user()->wallet->points}}</span> </a>
                                    {{-- <a class="dropdown-item d-block" href="#"><i class="mdi mdi-settings m-r-5"></i>Ajustes</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{url('logout')}}"><i class="mdi mdi-power text-danger"></i>Cerrar sesión</a>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>


                    </ul>
                </div>
                <!-- end menu-extras -->
            @else
                <div class="menu-extras topbar-custom" >

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                </div>
                <!-- end menu-extras -->
            @endif

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->
    <div class="clearfix"></div>
    <!-- MENU Start -->
    <div class="visible-sm visible-xs navbar-custom ">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    @if(auth()->check())
                        @yield('menu')
                    @else
                        <li class="has-submenu">
                            <a href="{{url('/login')}}"><i class="mdi mdi-login"></i>Login</a>
                        </li>
                    @endif

                    {{--<li class="has-submenu">
                        <a href="#"><i class="mdi mdi-email"></i>Premios <i class="fas fa-angle-down visible-sm"></i></a>
                        <ul class="submenu">
                            <li><a href="{{url('store')}}">Todos los premios</a></li>
                            <li class="d-none"><a href="#">Video Juegos</a></li>
                        </ul>
                    </li>--}}

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
<div class="wrapper" style="opacity:0.7;">
    <div class="page-title-box invisible">
        <div class="container-fluid">

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- page-title-box -->

    <!-- end page content-->
</div>
@yield('content')

<!-- Footer -->
<footer class="footer">
    © 2019 Canjeaton <span class="d-none d-sm-inline-block">- Creado por <a href="http://10x.org/" target="_blank">10x Informatica</a></span>
</footer>
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
<!-- App js -->
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.min.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.pie.js#')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/curvedLines.js')}}"></script>
<script src="{{ asset('plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>

<script src="{{ asset('assets/js/Chart.bundle.js')}}"></script>


<!-- Chart JS -->
<script src="{{ asset('assets/js/plugins/chart.js/chart.min.js')}}"></script>
<!-- Grafics Dashboard-->
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="{{ asset('assets/js/appHMenu.js')}}"></script>


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
<!-- DEPENDENCIA PARA SEARCH EN SELECTS Latest compiled and minified CSS -->
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
</html>
