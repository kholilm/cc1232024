<!-- Modal -->
<div class="modal fade" id="editfile" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Input Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="file/{{ $file->id }}" enctype="multipart/form-data" class="formsimpan">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input id="menu" name="menu" class="form-control" placeholder="Title"
                                    type="text" value="{{ $file->menu }}">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Url</label>
                                <input id="url" name="url" class="form-control" placeholder="Url"
                                    type="text" value="{{ $file->url }}">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Order</label>
                                <input id="sort_menu" name="sort_menu" class="form-control" type="number"
                                    placeholder="Order" value="{{ $file->sort_menu }}">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Menu</label>
                                <select id="menu_id" name="menu_id" class="form-control select2">
                                    <option value="0">Menu Utama</option>
                                    @foreach ($datamenu as $menu)
                                        @if ($file->menu_id == $menu->id)
                                            <option value="{{ $menu->id_menu }}" selected>{{ $menu->menu }}</option>
                                        @else
                                            <option value="{{ $menu->id_menu }}">{{ $menu->menu }}</option>
                                        @endif
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
                                    placeholder="Icon" value="{{ $file->icon }}">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Type Menu</label>
                            <select name="jenis_menu" id="jenis_menu" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($jenismenu as $menu)
                                    @if ($file->jenis_menu == $menu)
                                        <option value="{{ $menu }}" selected>{{ $menu }}</option>
                                    @else
                                        <option value="{{ $menu }}">{{ $menu }}</option>
                                    @endif
                                @endforeach

                                <!-- $jenismenu in controller  -->
                                <!-- <option value="nav-bar">Nav-Bar</option> -->
                                <!-- <option value="side-bar">Side-bar</option> -->
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Select files</label>
                        <div>
                            <input type="file" class="btn btn-light" id="path_pdf" name="path_pdf">
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <!-- <label for="input-folder-3">Select files/folders</label>
                    <div class="file-loading">
                        <input id="input-folder-3" class="btn btn-light" name="input-folder-3[]" type="file" multiple>
                    </div> -->
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
                    <button type="submit" class="btn btn-primary btn-sm tombolSimpan">Simpan</button>
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
                        $('#editfile').modal('hide')
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

    $("#status").click(function() {
        var nilai = $("#status:checked").val();
        $('#is_active').val(nilai)
    });

    const menu = document.querySelector('#menu');
    const url = document.querySelector('#url');
    menu.addEventListener("keyup", function() {
        let preslug = menu.value
        preslug = preslug.replace(/ /g, "-");
        url.value = preslug.toLowerCase();
    });
    // menu.addEventListener('change', function() {
    //     fetch('/inputFiles/checkSlug?menu=' + menu.value)
    //         .then(response => response.json())
    //         .then(data => slug.value = data.slug)
    // })
</script>
