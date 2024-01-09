@extends('layouts.main-input')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data News</h1>
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
                                            +. News
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
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Isi</th>
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

@section('pageScripts')
    <script>
        // tampilin data tablenya
        $(document).ready(function() {
            datanews() //penamaan
        })

        function refresh() {
            reload_table();
        }

        function reload_table() {
            table.ajax.reload(null, false);
        }

        $('#btn-news').on('click', function(e) {
            e.preventDefault()
            $.ajax({
                type: "get",
                url: "/news",
                dataType: "json",
                success: function(response) {
                    if (response.ok) {
                        $('.viewmodal').html(response.ok).show()
                        $('#tambahnews').modal('show')
                        $('.select2').select2({
                            theme: "bootstrap4"
                        });
                    }
                }
            });
        })


        function datanews() {
            table = $('#tb_news').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthMenu": [10, 50, 100],
                "order": [],
                "ajax": {
                    "url": '/news/data',
                    "method": 'post',
                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'descriptions',
                        name: 'descriptions',
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ],
            })
        }


        function edit_news(id) {
            $.ajax({
                type: "get",
                url: "/news/" + id + "/edit",
                dataType: "json",
                success: function(response) {
                    if (response.ok) {
                        $('.viewmodal').html(response.ok).show()
                        $('#editnews').modal('show')
                        $('.select2').select2({
                            theme: "bootstrap4"
                        });
                    }
                }
            });
        }

        // hapus_news penamaan di tombol delete controller
        function hapus_news(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "/news/" + id,
                        dataType: "json",
                        success: function(response) {
                            if (response.ok) {
                                Swal.fire(
                                    'Deleted!',
                                    `${response.ok}`,
                                    'success'
                                )
                                reload()
                            }
                        },
                        error: function(xhr, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    })
                }
            })
        }
    </script>
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/templated/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/templated/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/templated/tambahan/sweetalert2/dist/sweetalert2.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/templated/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/templated/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="/templated/dist/css/fontawesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('js')
    <!-- DataTables  & Plugins -->
    <script src="/templated/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/templated/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/templated/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/templated/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="/templated/tambahan/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Select2 -->
    <script src="/templated/plugins/select2/js/select2.full.min.js"></script>
@endsection
