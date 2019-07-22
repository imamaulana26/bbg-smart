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

        <!-- Table User -->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_user()">
                    <i class="fa fa-fw fa-plus"></i> Tambah User
                </button>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover" id="tbl_user">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>NIP User</td>
                                    <td>Nama Lengkap</td>
                                    <td>Role User</td>
                                    <td>Group</td>
                                    <td>Jabatan</td>
                                    <td>Cabang</td>
                                    <td>Date Create</td>
                                    <td>Log On</td>
                                    <td>Last Login</td>
                                    <td class="text-center">Aksi</td>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Table User -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Add User -->
<div id="modal_user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" id="form_user">
                    <div class="form-group">
                        <label class="control-label col-sm-3">NIP User</label>
                        <div class="col-sm-4">
                            <?= tag_input('text', 'nip'); ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <?= tag_input('text', 'nama'); ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-5">
                            <?= tag_input('text', 'email'); ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Role User</label>
                        <div class="col-sm-4">
                            <select class="form-control selectpicker" name="role_id" id="role_id">
                                <option selected disabled>-- Please Select --</option>
                                <?php foreach ($role as $r) {
                                    echo "<option value='" . $r['id'] . "'>" . $r['role'] . "</option>";
                                } ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Jabatan</label>
                        <div class="col-sm-4">
                            <select class="form-control selectpicker" name="jabatan" id="jabatan">
                                <option selected disabled>-- Please Select --</option>
                                <?php $jabatan = array('Group Head', 'Dept. Head', 'Team Leader', 'Officer', 'Staff', 'TAD');
                                foreach ($jabatan as $jbtn) {
                                    echo "<option value='" . $jbtn . "'>" . $jbtn . "</option>";
                                } ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Group</label>
                        <div class="col-sm-7">
                            <select class="form-control selectpicker" name="group_id" id="group_id">
                                <option selected disabled>-- Please Select --</option>
                                <?php foreach ($group as $g) {
                                    echo "<option value='" . $g['group_id'] . "'>" . $g['group_name'] . " (" . $g['group_title'] . ")</option>";
                                } ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Cabang</label>
                        <div class="col-sm-9">
                            <select class="form-control selectpicker" name="cabang" id="cabang" data-live-search="true" data-size="10">
                                <option selected disabled>-- Please Select --</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group" id="toggle-jaringan" style="display: none">
                        <label class="control-label col-sm-3">Jaringan</label>
                        <div class="col-sm-9">
                            <select class="form-control selectpicker" name="jaringan[]" id="jaringan" data-live-search="true" multiple>
                                <option disabled>-- Please Select --</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save()">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Add User -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    var save_method, table;
    $(document).ready(function() {
        get_cabang();

        $('.selectpicker').selectpicker('refresh');

        table = $('#tbl_user').DataTable({
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': "<?= site_url(ucfirst('admin/user/list_user')) ?>",
                'type': 'post'
            },
            'columnDefs': [{
                'targets': [0, 1, 2, 3, 4, 5, 6, 10],
                'orderable': false
            }, ],
        });

        $('#toggle-jaringan').hide();
        $('#role_id').on('change', function() {
            if ($(this).val() > 3) {
                $('#toggle-jaringan').show();
            } else {
                $('#toggle-jaringan').hide();
            }
        });

        $('input').change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function get_cabang() {
        $.ajax({
            url: '<?= site_url(ucfirst('api_cabang/get_cabang')) ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $('#cabang').append('<option value="' + data[i].kd_cabang + '">' + data[i].nm_cabang + '</option>');
                    $('#jaringan').append('<option value="' + data[i].kd_cabang + '">' + data[i].nm_cabang + '</option>');
                }
                $('.selectpicker').selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function add_user() {
        save_method = 'add';
        $('#form_user')[0].reset();
        $('.selectpicker').selectpicker('refresh');
        $('#toggle-jaringan').hide();

        $('#modal_user').modal('show');
        $('.modal-title').text('Modal Tambah Data User');
        $('#nip').attr('readonly', false);
    }

    function edit_user(id) {
        save_method = 'update';
        $('#form_user')[0].reset();
        $('.modal-title').text('Modal Ubah Data User');

        $.ajax({
            url: '<?= site_url(ucfirst('admin/user/edit_user/')) ?>' + id,
            type: 'get',
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#modal_user').modal('show');
                $('[name="nip"]').val(data.nip_user).attr('readonly', true);
                $('[name="nama"]').val(data.nama);
                $('[name="group_id"]').val(data.group_id);
                $('[name="email"]').val(data.email);
                $('[name="jabatan"]').val(data.jabatan);
                $('select[name="role_id"]').val(data.role_id);
                $('select[name="cabang"]').val(data.cabang);
                $('.selectpicker').selectpicker('refresh');

                if (data.role_id > 3) {
                    $('#toggle-jaringan').css('display', 'block');
                    var x = data.id_cabang;
                    var arr = x.split('::');

                    $('#jaringan').selectpicker('val', arr);
                } else {
                    $('#toggle-jaringan').css('display', 'none');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function delete_user(id) {
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
                        url: '<?= site_url(ucfirst('admin/user/delete_user/')) ?>' + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data user telah berhasil dihapus", "success");
                            reload_table();
                        }
                    });
                }
            });
    }

    function save() {
        var url = '';
        if (save_method == 'add') url = '<?= site_url(ucfirst('admin/user/save_user')) ?>';
        else url = '<?= site_url(ucfirst('admin/user/update_user')) ?>';

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: $('#form_user').serialize(),
            success: function(data) {
                if (data.db_error) {
                    swal('Kesalahan!', data.db_error, 'warning');
                }

                if (data.status) {
                    swal('Sukses!', 'Data user telah berhasil disimpan', 'success');
                    $('#modal_user').modal('hide');

                    reload_table();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error[i]);
                    }
                }
            }
        });
    }
</script>