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
            <!-- Table Akses Menu -->
            <div class="col-md-8">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_akses()">
                    <i class="fa fa-fw fa-plus"></i> Tambah Akses Menu
                </button>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <table class="table table-bordered table-hover" id="tbl_akses">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Akses</th>
                                    <th>Nama Menu</th>
                                    <th>URL</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data_akses"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. Table Akses Menu -->

            <!-- Table Role User -->
            <?php if ($this->session->userdata('role_id') == 1) { ?>
                <div class="col-md-3">
                    <button class="btn btn-primary btn-add" style="margin-bottom: 10px" onclick="add_role()">
                        <i class="fa fa-fw fa-plus"></i> Tambah Role User
                    </button>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-hover" id="mydata-akses">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role User</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data_role"></tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <!-- /.Table Role User -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Akses -->
<div id="modal_akses" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title_akses"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" action="#" id="form_akses">
                    <?= tag_input('hidden', 'id') ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Akses User</label>
                            <div class="col-sm-4">
                                <select class="selectpicker" name="user" id="user">
                                    <option selected value="0">-- Please Select --</option>
                                    <?php foreach ($role as $r) {
                                        echo "<option value='" . $r['id'] . "' >" . $r['role'] . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Menu</label>
                            <div class="col-sm-5">
                                <select class="selectpicker" name="menu" id="menu">
                                    <option selected value="0">-- Please Select --</option>
                                    <?php foreach ($menu as $m) {
                                        echo "<option value='" . $m['id'] . "' data-icon='" . $m['icon'] . "'>" . $m['menu'] . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Status</label>
                            <div class="col-sm-8">
                                <label class="radio-inline"><input type="radio" name="aktif" value="1">Enable</label>
                                <label class="radio-inline"><input type="radio" name="aktif" value="0">Disable</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="validasi_akses()">
                    <i class="fa fa-fw fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-fw fa-remove"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Akses -->

<!-- Modal Add Role -->
<div id="modal_role" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title_role"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" id="form_role">
                    <?= tag_input('hidden', 'id') ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Role User</label>
                        <div class="col-sm-4">
                            <?= tag_input('text', 'role') ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_role()">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Add Role -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    var save_method;
    $(document).ready(function() {
        table = $('#tbl_akses').DataTable({
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': "<?= site_url(ucfirst('admin/access/list_akses')) ?>",
                'type': 'post'
            },
            'columnDefs': [{
                'targets': [0, 2, 3, 5],
                'orderable': false
            }, ],
        });

        get_data_role();

        $('input').change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $('#modal_role').on('show.bs.modal', function() {
            $('div').removeClass('has-error');
            $('span.help-block').empty();
        });
    });

    function validasi_akses() {
        // var regCode = /^\d+[a-z]?$/;
        // var regName = /^[a-z A-Z]+$/;
        var role = $('#user').val();
        var menu = $('#menu').val();

        var icon = document.getElementsByName('aktif');
        var iconVal = false;

        for (var i = 0; i < icon.length; i++) {
            if (icon[i].checked == true) iconVal = true;
        }

        if (role == '0') {
            swal('Akses user belum terpilih!');
            return false;
        } else if (menu == '0') {
            swal('Menu belum terpilih!');
        } else if (!iconVal) {
            swal('Status belum terpilih!');
        } else {
            save_akses();
        }
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function add_akses() {
        save_method = 'add';
        $('#form_akses')[0].reset();
        $('#modal_akses').modal('show');
        $('#title_akses').text('Modal Tambah Data Akses Menu');
        // reset value selectpicker
        $('.selectpicker').selectpicker('refresh');
    }

    function edit_akses(id) {
        save_method = 'update';
        $('#form_akses')[0].reset();
        $('#title_akses').text('Modal Ubah Data Akses Menu');

        $.ajax({
            url: '<?= site_url(ucfirst('admin/access/edit_akses/')) ?>' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#modal_akses').modal('show');
                $('[name="id"]').val(data.id);
                // set value to selectpicker
                $('select[name="user"]').val(data.role_id);
                $('select[name="menu"]').val(data.menu_id);
                $('.selectpicker').selectpicker('refresh');
                // set value to radio button
                $('input:radio[name="aktif"][value="' + data.active + '"]')[0].checked = true;
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function save_akses() {
        var url = '';
        if (save_method == 'add') url = '<?= site_url(ucfirst('admin/access/save_akses')) ?>';
        else url = '<?= site_url(ucfirst('admin/access/update_akses')) ?>';

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'JSON',
            data: $('#form_akses').serialize(),
            success: function(data) {
                if (data.msg) {
                    $('#form_akses')[0].reset();
                    $('#modal_akses').modal('hide');
                    swal(data.msg);
                } else {
                    swal('Sukses!', 'Data akses menu telah berhasil disimpan', 'success');
                    $('#modal_akses').modal('hide');

                    reload_table();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function delete_akses(id) {
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
                        url: '<?= site_url(ucfirst('admin/access/delete_akses/')) ?>' + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data akses menu telah berhasil dihapus", "success");
                            reload_table();
                        }
                    });
                }
            });
    }
    

    function add_role() {
        save_method = 'add';
        $('#form_role')[0].reset();
        $('#modal_role').modal('show');
        $('#title_role').text('Modal Tambah Data Role');
    }

    function save_role() {
        var url = '';
        if (save_method == 'add') url = '<?= site_url(ucfirst('admin/access/save_role')) ?>';
        else url = '<?= site_url(ucfirst('admin/access/update_role')) ?>';

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'JSON',
            data: $('#form_role').serialize(),
            success: function(data) {
                if (data.msg) {
                    swal(data.msg);
                }

                if (data.status) {
                    swal('Sukses!', 'Data role user telah berhasil disimpan', 'success');
                    $('#modal_role').modal('hide');

                    get_data_role();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error[i]);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function get_data_role() {
        $.ajax({
            type: 'post',
            url: '<?= site_url(ucfirst('admin/access/list_role')) ?>',
            dataType: 'JSON',
            success: function(data) {
                var row = '';

                for (var i = 0; i < data.length; i++) {
                    row += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + data[i].role + '</td>' +
                        '<td class="text-center">' +
                        '<a href="javascript:void(0)" onclick="edit_role(' + data[i].id + ')"><i class="fa fa-fw fa-edit"></i></a> ' +
                        '<a href="javascript:void(0)" onclick="delete_role(' + data[i].id + ')"><i class="fa fa-fw fa-trash"></i></a>' +
                        '</td></tr>';
                }
                $('#data_role').html(row);
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function delete_role(id) {
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
                        url: '<?= site_url(ucfirst('admin/access/delete_role/')) ?>' + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data role user telah berhasil dihapus", "success");
                            get_data_role();
                        }
                    });
                }
            });
    }

    function edit_role(id) {
        save_method = 'update';
        $('#form_role')[0].reset();
        $('#title_role').text('Modal Ubah Data Role');

        $.ajax({
            url: '<?= site_url(ucfirst('admin/access/edit_role/')) ?>' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#modal_role').modal('show');
                $('[name="id"]').val(data.id);
                $('[name="role"]').val(data.role);
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }
</script>