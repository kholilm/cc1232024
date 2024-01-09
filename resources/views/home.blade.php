@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- caraousel -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/templated/dist/img/caraousel11.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/templated/dist/img/caraousel8.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/templated/dist/img/caraousel4.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Timelime example  -->
                @if ($news->count())
                    {{-- $posts ambil dari controller  --}}
                    @foreach ($news as $n)
                        <div class="row">
                            <div class="col-md-12">
                                <!-- The time line -->
                                <div class="timeline">
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-green"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i
                                                    class="fas fa-clock"></i>{{ $n->created_at->diffForHumans() }}</span>
                                            <h1 class="timeline-header" style="color:black">
                                                {{ $n->title }}, <a class="small">{{ $n->name }}</a>
                                            </h1>
                                            <div class="timeline-body">
                                                {!! $n->descriptions !!}
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-sm">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->

                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    @endforeach
                @else
                    <p class="text-center fs-4"> No post found</p>
                @endif
                <div class="d-flex justify-content-end">
                    {{ $news->links() }}
                </div>
            </div>
            <!-- /.timeline -->

        </section>


        <!-- smallbox 1 -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>SIMONE</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="http://10.14.150.160/simonev2/" target="_blank" class="small-box-footer">SIMONE <i
                                    class="bi bi-rocket-takeoff-fill"></i></a>
                            <a href="https://connect-gateway.pln.co.id/backend123/backend/auth/signin" target="_blank"
                                class="small-box-footer">PLN MOBILE <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>Finesse</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-secret"></i>
                            </div>
                            <a href="https://dcpccefnsa.cc.iconpln.co.id:8445/desktop/container/landing.jsp?locale=en_US"
                                target="_blank" class="small-box-footer">
                                Finesse <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="https://drcpccefnsb.cc.iconpln.co.id" target="_blank" class="small-box-footer">
                                Finesse DRC <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>CRM</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="http://10.14.152.42:8080/crmv3/" target="_blank" class="small-box-footer">CRM <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://crm.cc.iconpln.co.id:8080" target="_blank" class="small-box-footer">CRM
                                Domain
                                <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>APKT</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="http://10.68.35.95" target="_blank" class="small-box-footer">APKT <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://10.68.35.95/pages/home/ticket.aspx?" target="_blank"
                                class=" small-box-footer">APKT Monitor <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>AP2T</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-secret"></i>
                            </div>
                            <a href="http://10.72.35.8/ap2t/Login.aspx" target="_blank" class="small-box-footer">AP2T <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://10.68.35.72" target="_blank" class="small-box-footer">AP2T WEB PLN <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class="small-box bg-gradient-primary">
                            <div class="inner">
                                <h6>ACMT & SIP</h6>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="https://10.72.35.8/acmt/" target="_blank" class="small-box-footer">ACMT <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://10.14.150.147/sip/login" target="_blank" class="small-box-footer">SIP <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- smallbox 2 -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>TOOLS CC</h4>
                                <div class="image">
                                    <img src="/templated/dist/img/cc123.png" alt="Image" height="50"
                                        width="50">
                                </div>
                                <!-- <br> -->
                            </div>
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <a href="http://10.14.151.51:8383/chat123/#" target="_blank" class="small-box-footer">CHAT CC
                                <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://10.23.123.118/mancc" target="_blank" class="small-box-footer">MAN CC <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>SYSCCA NEW SRST</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-secret"></i>
                            </div>

                            <a href="https://10.23.123.11/agentdesktop" target="_blank" class="small-box-footer">SYSCCA
                                <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="https://10.23.123.11:3033" target="_blank" class="small-box-footer">SYSCCA Cert <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>-</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-secret"></i>
                            </div>
                            <a href="http://stimulusrm.pln.co.id/" target="_blank" class="small-box-footer">Stimulus RM &
                                Rupiah Beban <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="https://docs.google.com/spreadsheets/d/1C-7UgROUsNVXS6AM25HFEjNtucFxLinNl1EdWBVjUA4/edit?usp=sharing"
                                target="_blank" class="small-box-footer">Tiket Open Subsektor PLN <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            <!-- <a href="https://docs.google.com/spreadsheets/d/1-j2poPolyi1WPFTRAg3bdPJNmoTMB5s0x6gEBStEkrg/edit?usp=sharing" target="_blank" class="small-box-footer">ICONNET (Progress Laporan) <i class="fas fa-arrow-circle-right"></i></a>
                                                                                                                                                                                                                                                                                                                                                            <a href="https://forms.gle/8QY6GeWTBrKdqv859" target="_blank" class="small-box-footer">ICONNET (Penginputan Data) <i class="fas fa-arrow-circle-right"></i></a> -->

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>P2APST</h4>
                                <!-- <div class="image">
                                                                                                                                                                                                                                                                                                                                                                    <img src="/assets/templated/dist/img/cc123.png" alt="Image" height="65" width="65">
                                                                                                                                                                                                                                                                                                                                                                </div> -->
                            </div>
                            <div class="icon">
                                <i class="fa fa-bolt" aria-hidden="true"></i>
                            </div>
                            <a href="https://10.68.35.68/dacen/default/index.php" target="_blank"
                                class="small-box-footer">P2APST PC Genap <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="http://10.70.1.78/dacen/default/index.php" target="_blank"
                                class="small-box-footer">P2APST PC Ganjil <i class="fas fa-arrow-circle-right"></i></a>
                            <a href="https://hosting3.iconpln.net.id:2096/" target="_blank"
                                class="small-box-footer">Email P2APST <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- smallbox 3 -->
                    <div class="container">

                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-2">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h6>SLA</h6>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bug" aria-hidden="true"></i>
                                    </div>
                                    <a href="http://10.68.35.93/sla/index.php" target="_blank"
                                        class="small-box-footer">SLA <i class="fas fa-arrow-circle-right"></i></a>
                                    <a href="http://10.68.35.93/cari_history/index.php" target="_blank"
                                        class="small-box-footer">Cari History <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            {{-- <div class="col-lg-2 col-2">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h8>Verifikasi Akun</h8>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bug" aria-hidden="true"></i>
                                </div>
                                <a href="https://connect-gateway.pln.co.id/backend123/backend/auth/signin" target="_blank" class="small-box-footer">PLN MOBILE <i class="fas fa-arrow-circle-right"></i></a>
                                <!-- <a href="http://apps.iconpln.co.id:7777/Panas-1.0" target="_blank" class="small-box-footer">PANAS <i class="fas fa-arrow-circle-right"></i></a> -->
                            </div>
                        </div> --}}

                            <div class="col-lg-2 col-2">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h6>Listriqu & ITSM</h6>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bug" aria-hidden="true"></i>
                                    </div>
                                    <a href="https://listriqu.com/listriqu-home/login.php" target="_blank"
                                        class="small-box-footer">ListriQu <i class="fas fa-arrow-circle-right"></i></a>
                                    <a href="http://10.1.86.28/HEAT" target="_blank" class="small-box-footer">ITSM <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-2">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h6>NICE - SIUJANG</h6>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-bug" aria-hidden="true"></i>
                                    </div>
                                    <a href="http://10.14.155.18/NiceApplications/Desktop/XbapApplications/NiceDesktop.xbap"
                                        target="_blank" class="small-box-footer">NICE <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                    <a href="https://siujang.esdm.go.id/" target="_blank" class="small-box-footer">SI
                                        UJANG <i class="fas fa-arrow-circle-right"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="inner">
                                        <img src="/templated/dist/img/14.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Contact Center Balikpapan </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ./Left col -->

                        <!-- right col -->
                        <section class="col-lg-6 connectedSortable">
                            <div class="col">
                                <div class="card shadow">
                                    <div class="inner">
                                        <img src="/templated/dist/img/asqw1.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ./right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->

                <!-- card image -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            <div class="card shadow" style="width: 19rem;">
                                <div class="">
                                    <img src="/templated/dist/img/10.jpeg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="inner">
                                <video controls>
                                    <source src="/templated/dist/video/vid1.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div> --}}

                        <div class="col-lg">
                            <div class="card shadow" style="width: 19rem;">
                                <div class="">
                                    <img src="/templated/dist/img/1511.jpeg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg">
                            <div class="card shadow" style="width: 19rem;">
                                <div class="">
                                    <img src="/templated/dist/img/1511.jpeg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <!-- di -->
                        <div region="center" border="false">
                            <div id="tt" class="easyui-tabs" fit="true" border="false" plain="true"
                                cache="false">
                            </div>

                        </div>
                        <!-- bats -->
                    </div>
                </div>
                <!-- ./card image -->
        </section>
        <!-- /.content -->
    </div>
@endsection
