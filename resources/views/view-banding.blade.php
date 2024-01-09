@extends('layouts.main-input')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Banding</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-sm" id="btn-news">
                                            Add
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="refresh()">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-header -->
                            <div class="card-body table table-responsive text-center">
                                <table id="tb_news" class="table md-table table-sm table-bordered table-hover cell-border"
                                    width="100%">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th>No</th>
                                            <th>Tgl</th>
                                            <th>Site Banding</th>
                                            <th>QA Pengukur</th>
                                            <th>No.Lapor</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->$literation }}</td>
                                </tr>
                            @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="viewmodal" style="display: none"></div>
@endsection
