<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

<div class="modal fade" id="tambahnotif" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Notifications</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="formsimpan" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input id="title" name="title" class="form-control" placeholder="Title"
                                    type="text" required autofocus>
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Body</label>
                                <input id="body" type="hidden" name="descriptions">
                                <trix-editor input="body"></trix-editor>
                            </div>
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm tombolSimpan">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tombolSimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formsimpan')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "/notif",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(e) {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.tombolSimpan').prop('disabled', false);
                    $('.tombolSimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: `<strong>${response.ok}</strong>`,
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        })
                        $('.help-block').empty();
                        $('.is-invalid').removeClass('is-invalid');
                        $('#tambahnotif').modal('hide');
                        reload_table();
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid')
                            $('[name="' + key + '"]').next().text(value)
                            if (value.length === 0) {
                                $('[name="' + key + '"]').removeClass('is-invalid')
                            }
                        })
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
