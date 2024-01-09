<div class="modal fade" id="tambahfolder" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Folders</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="formsimpan" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Folder Name</label>
                        <input id="foldername" name="foldername" class="form-control" type="text"
                            placeholder="foldername" autofocus>
                        <span class="help-block text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Select Folder</label>
                        <input type="file" class="btn btn-light" id="files" name="files[]" multiple
                            directory="" webkitdirectory="" moxdirectory="" />
                        <span class="help-block text-danger"></span>
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
                url: "/addfolder",
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
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: `<strong>${response.sukses}</strong>`,
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        })
                        $('.help-block').empty();
                        $('.is-invalid').removeClass('is-invalid');
                        $('#tambahfolder').modal('hide');
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
                    // if (response.gagal) {
                    //     Swal.fire({
                    //         icon: 'success',
                    //         title: `<strong>${response.sukses}</strong>`,
                    //         showConfirmButton: false,
                    //         timer: 1000,
                    //         timerProgressBar: true,
                    //     })
                    // }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
