<div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $title ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <?php $msg = $this->session->flashdata('msg');
        if (isset($msg)) echo $msg; ?>

        <div class="row">
            <div class="col-sm-6">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_menu()">
                    <i class="fa fa-fw fa-plus"></i> Tambah Menu
                </button>
                <div class="panel panel-default">
                    <table class="table table-striped table-bordered table-hover" id="tbl_menu">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Menu</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Menu -->
<div id="modal_menu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" action="#" id="form_menu">
                    <?= tag_input('hidden', 'id') ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nama Menu</label>
                            <div class="col-sm-6">
                                <?= tag_input('text', 'menu') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Pilih Icon</label>
                            <div class="col-sm-8">
                                <?php $icon_list = array(
                                    'fa fa-fw fa-dashboard',
                                    'fa fa-fw fa-align-justify',
                                    'fa fa-fw fa-user',
                                    'fa fa-fw fa-user-secret',
                                    'fa fa-fw fa-key',
                                    'fa fa-fw fa-sign-out',
                                    'fa fa-fw fa-refresh'
                                );
                                foreach ($icon_list as $icon) {
                                    echo "<label class='radio-inline'>
                                <input type='radio' name='icon' id='icon' value='" . $icon . "'><i class='" . $icon . "'></i>
                            </label>";
                                } ?>
                            </div>
                            <div class="col-sm-8 col-sm-offset-3">
                                <?php $icon_list = array(
                                    'fa fa-fw fa-folder',
                                    'fa fa-fw fa-folder-open',
                                    'fa fa-fw fa-file-text',
                                    'fa fa-fw fa-building'
                                );
                                foreach ($icon_list as $icon) {
                                    echo "<label class='radio-inline'>
                                <input type='radio' name='icon' id='icon' value='" . $icon . "'><i class='" . $icon . "'></i>
                            </label>";
                                } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save">
                    <i class="fa fa-fw fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-fw fa-remove"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/_footer'); ?>

<script>
    var save_method, table;

    $(document).ready(function() {
        get_data();

        $('#btn_save').click(function() {
            validasi();
            return false;
        });

        $('input').change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    function validasi() {
        var icon = document.getElementsByName('icon');
        var iconVal = false;

        for (var i = 0; i < icon.length; i++) {
            if (icon[i].checked == true) iconVal = true;
        }

        if (!iconVal) {
            swal('Icon menu belum terpilih!');
        } else {
            save();
        }
    }

    function add_menu() {
        save_method = 'add';
        $('#form_menu')[0].reset();
        $('#modal_menu').modal('show');
        $('.modal-title').text('Modal Tambah Menu');
    }

    function save() {
        var url = '';

        if (save_method == 'add') url = "<?= site_url(ucfirst('admin/menu/save_menu')) ?>";
        else url = "<?= site_url(ucfirst('admin/menu/update_menu')) ?>";

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $('#form_menu').serialize(),
            success: function(data) {
                if (data.msg) {
                    // $('#form_menu')[0].reset();
                    // $('#modal_menu').modal('hide');
                    swal(data.msg);
                }

                if(data.status){
                    swal('Sukses!', 'Data menu telah berhasil disimpan', 'success');
                    $('#modal_menu').modal('hide');

                    get_data();
                } else {
                    for(var i=0; i<data.inputerror.length; i++){
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error[i]);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function get_data() {
        $.ajax({
            url: '<?= site_url(ucfirst('admin/menu/list_menu')) ?>',
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                var row = '';
                for (var i = 0; i < data.length; i++) {
                    row += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td><i class="' + data[i].icon + '"></i> ' + data[i].menu + '</td>' +
                        '<td class="text-center">' +
                        '<a href="javascript:void(0)" onclick="edit_menu(' + data[i].id + ')"><i class="fa fa-fw fa-edit"></i></a> ' +
                        '<a href="javascript:void(0)" onclick="delete_menu(' + data[i].id + ')"><i class="fa fa-fw fa-trash"></i></a>' +
                        '</td></tr>';
                }
                $('#show_data').html(row);
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function edit_menu(id) {
        save_method = 'update';
        $('#form_menu')[0].reset();
        $('.modal-title').text('Modal Ubah Menu');

        $.ajax({
            url: '<?= site_url(ucfirst('admin/menu/edit_menu/')) ?>' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#modal_menu').modal('show');
                $('[name="id"]').val(data.id);
                $('[name="menu"]').val(data.menu);
                $('input:radio[name="icon"][value="' + data.icon + '"]')[0].checked = true;
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function delete_menu(id) {
        swal({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Hapus",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '<?= site_url(ucfirst('admin/menu/delete_menu/')) ?>' + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data menu telah berhasil dihapus", "success");
                            get_data();
                        }
                    });
                }
            });
    }
</script>