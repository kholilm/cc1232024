<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

<div class="modal fade" id="editnotif" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="notif/{{ $notif->id }}" class="formsimpan">
                <input type="hidden" name="_method" value="put">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input id="title" name="title" class="form-control" placeholder="Title"
                                    type="text" value="{{ $notif->title }}">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Body</label>
                                <input id="body" type="hidden" name="descriptions"
                                    value="{{ $notif->descriptions }}">
                                <trix-editor input="body"></trix-editor>
                            </div>
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm btn-save">Update</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('.formsimpan').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(e) {
                    $('.btn-save').prop('disabled', true)
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                complete: function() {
                    $('.btn-save').prop('disabled', false)
                    $('.btn-save').html('<i class="fas fa-save"></i> Update')
                },
                success: function(response) {
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: response.ok,
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        })
                        $('#editnotif').modal('hide')
                        reload_notif()
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
            return false;
        })
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
