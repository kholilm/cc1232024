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
    <script src="/templated/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/templated/dist/js/popper.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}



</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- Navbar -->
        @include('partial.navbar-tab')
        <!-- /.navbar -->

        <!-- Sidebar -->
        @include('partial/sidebar')
        <!-- /. -->

        <!-- Ifrane addtab -->
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
                <div class="nav-item dropdown">
                    <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">Close</a>
                    <div class="dropdown-menu mt-0">
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close
                            All Other</a>
                    </div>
                </div>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i
                        class="fas fa-angle-double-left"></i></a>
                <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i
                        class="fas fa-angle-double-right"></i></a>
                <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i
                        class="fas fa-expand"></i></a>
            </div>
            <div class="tab-content">
                <div class="tab-empty">
                    <h2 class="display-4">No tab selected!</h2>
                </div>
                <div class="tab-loading">
                    <div>
                        <h2 class="display-4">loading <i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. -->

        <!-- link -->
        <div class="viewmodal" style="display: :none"></div>

        <script>
            $('#btn-link').on('click', function(e) {
                e.preventDefault()
                $.ajax({
                    type: "get",
                    url: "/link",
                    dataType: "json",
                    success: function(response) {
                        if (response.ok) {
                            $('.viewmodal').html(response.ok).show()
                            $('#link').modal('show')
                            $('.select2').select2({
                                theme: "bootstrap4"
                            });
                        }
                    }
                });
            })
        </script>
        <!-- /. -->

        <!-- footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 kholilm</strong>
            All rights reserved.
        </footer>
        <!-- /. -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>
