<!-- Modal -->
<div class="modal fade" id="tambahfile" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input Files</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="view-inputdata" method="post" class="formsimpan" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input id="menu" name="menu" class="form-control" placeholder="Title"
                                    type="text">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Url</label>
                                <input id="url" name="url" class="form-control" placeholder="Url"
                                    type="text">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Order</label>
                                <input id="sort_menu" name="sort_menu" class="form-control" type="number"
                                    placeholder="Order">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Menu</label>
                                <select id="menu_id" name="menu_id" class="form-control select2">
                                    <option value="0">Menu Utama</option>
                                    @foreach ($datamenu as $menu)
                                        <option value="{{ $menu->id_menu }}">{{ $menu->menu }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Controller</label>
                                <input id="controller" name="controller" class="form-control" type="text" placeholder="Controller">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div> -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Icon</label>
                                <input id="icon" name="icon" class="form-control" type="text"
                                    placeholder="Icon">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Type Menu</label>
                            <select name="jenis_menu" id="jenis_menu" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($jenismenu as $menu)
                                    <option value="{{ $menu }}">{{ $menu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label>Select files</label>
                        <div>
                            <img class="img-preview img-fluid">
                            <input type="file" class="btn btn-light" id="path_pdf" name="path_pdf">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>

                    <br>
                    <div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="form-check-label">
                                        <input type="checkbox" value="1" id="status" name="status">
                                        Status Aktif
                                    </label>
                                    <input type="hidden" name="is_active" id="is_active">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm btn-save">Simpan</button>
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
        $('.formsimpan').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: new FormData($('.formsimpan')[0]),
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function(e) {
                    $('.btn-save').prop('disabled', true)
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                complete: function() {
                    $('.btn-save').prop('disabled', false)
                    $('.btn-save').html('<i class="fas fa-save"></i> Save')
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
                        reload_table()
                        $('#tambahfile').modal('hide')
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass(
                                'is-invalid')
                            $('[name="' + key + '"]').next().text(value)
                            if (value.length === 0) {
                                $('[name="' + key + '"]').removeClass(
                                    'is-invalid')
                            }
                        })
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
            return false;
        })
    })


    $("#status").click(function() {
        var nilai = $("#status:checked").val();
        $('#is_active').val(nilai)
    });
    $('#menu').on('keyup', function(e) {
        e.preventDefault()
        const menu = $('#menu').val()
        const pres = menu.replace(/ /g, "-");
        $('#url').val(pres)
    })
</script>
