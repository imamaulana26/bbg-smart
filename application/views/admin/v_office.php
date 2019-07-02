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

        <!-- Table Office -->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_office()">
                    <i class="fa fa-fw fa-plus"></i> Tambah List Office
                </button>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover" id="tbl_office">
                            <thead>
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th style="width: 120px">Kode Cabang</th>
                                    <th>Nama Cabang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Table Office -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Office -->
<div id="modal_office" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" id="form_office" action="#">
                    <div class="form-body">
                        <?= tag_input('hidden', 'id') ?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Kode Cabang</label>
                            <div class="col-sm-4">
                                <?= tag_input('text', 'kd_cabang') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nama Cabang</label>
                            <div class="col-sm-8">
                                <?= tag_input('text', 'nm_cabang') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="save()">
                        <i class="fa fa-fw fa-save"></i> Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-fw fa-remove"></i> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Add Office -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    var save_method, table;
    $(document).ready(function() {
        table = $('#tbl_office').DataTable({
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': "<?= site_url(ucfirst('admin/office/list_office')) ?>",
                'type': 'post'
            },
            'columnDefs': [{
                'targets': [0, 3],
                'orderable': false
            }, ],
        });

        $('input').change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function add_office() {
        save_method = 'add';
        $('#form_office')[0].reset();
        $('#modal_office').modal('show');
        $('.modal-title').text('Modal Tambah Daftar Cabang');
    }

    function save() {
        var url = '';

        if (save_method == 'add') url = "<?= site_url(ucfirst('admin/office/save_office')) ?>";
        else url = "<?= site_url(ucfirst('admin/office/update_office')) ?>";

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $('#form_office').serialize(),
            success: function(data) {
                console.log(data.status);
                if (data.status) {
                    swal('Sukses!', 'Data cabang telah berhasil disimpan', 'success');
                    $('#modal_office').modal('hide');

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

    function edit_office(id) {
        save_method = 'update';
        $('#form_office')[0].reset();
        $('.modal-title').text('Modal Ubah Daftar Cabang');

        $.ajax({
            url: "<?= site_url(ucfirst('admin/office/edit_office/')) ?>"+id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#modal_office').modal('show');
                $('[name="id"]').val(data.id);
                $('[name="kd_cabang"]').val(data.kd_cabang.replace('ID', ''));
                $('[name="nm_cabang"]').val(data.nm_cabang);
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function delete_office(id) {
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
                        url: "<?= site_url(ucfirst('admin/office/delete_office/')) ?>" + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data cabang telah berhasil dihapus", "success");
                            reload_table();
                        }
                    });
                }
            });
    }
</script>