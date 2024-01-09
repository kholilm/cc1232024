<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CC23 | {{ $title }}</title>

    <link href="/templated/dist/img/cc123.png" rel="shorcut icon">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link rel="stylesheet" href="/templated/dist/css/fontgoogle.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/templated/plugins/fontawesome-free/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="/templated/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="/templated/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/templated/dist/css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="/templated/dist/css/bootstrap-icons.css"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/templated/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/templated/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/templated/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/templated/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/templated/dist/css/font-awesome.min.css">



    <!-- jQuery -->
    <script src="/templated/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/templated/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    {{-- <script src="/templated/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- ChartJS -->
    <script src="/templated/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/templated/plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/templated/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="/templated/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/templated/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/templated/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/templated/dist/js/adminlte.js"></script>
    {{-- <script src="/templated/dist/js/pages/dashboard.js"></script> --}}
    {{-- <script src="/templated/dist/js/pages/bootstrap.min.js"></script> --}}
    <script src="/templated/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/templated/dist/js/popper.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/templated/dist/img/cc123.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @include('partial/navbar-tab')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partial/sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 OMTS BPP</strong>
            All rights reserved.
        </footer>
    </div>
    @yield('pageScripts')
</body>

</html>
