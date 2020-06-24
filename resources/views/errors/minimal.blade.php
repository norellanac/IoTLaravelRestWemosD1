<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('imgs/icons/iot.svg')}}">

        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">

                    <div class="ex-page-content text-center">
                        <h1 class="text-dark">

                            <span class="text-danger">@yield('code')</span>
                            {{-- }}<span class="text-danger">5</span><span class="text-success">0</span><span class="text-info">0</span> --}}
                        </h1>
                        <h4 class="">@yield('message')</h4><br>

                        <a class="btn btn-info mb-5 waves-effect waves-light" href="{{url('/login/')}}"><i class="mdi mdi-home"></i> ir a inicio</a>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">© 2019  Derechos reservados <i class="mdi mdi-heart text-danger"></i> <a href="http://10x.org/"> 10x Informatica. </a> </p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

</html>
