@extends('layouts.main-3')

@section('content')
    <div class="content-wrapper">

        <!-- Content PDF -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <iframe src="/storage/file_pdf/<?= $datapdf->path_pdf ?>"
                                        style="height:770px;width:1100px;" title="Iframe Example"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

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
@endsection
