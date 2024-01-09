<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CC23 | {{ $title }}</title>
    <link href="/templated/dist/img/cc123.png" rel="shorcut icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/templated/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/templated/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="/templated/dist/css/trix.css">
    @yield('css')
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/templated/dist/img/cc123.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @include('partial/navbar-input')
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright © 2023 kholilm All rights reserved.</strong>
        </footer>
    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/templated/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/templated/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/templated/dist/js/adminlte.min.js"></script>
    <script type="text/javascript" src="/templated/dist/js/trix.js"></script>
    @yield('js')
    @yield('pageScripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
</body>

</html>
