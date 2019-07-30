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

        <div class="row">
            <!-- Table Group -->
            <div class="col-md-8">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_group()">
                    <i class="fa fa-fw fa-plus"></i> Tambah Group
                </button>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <table class="table table-bordered table-hover" id="tbl_group">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 20%">Group Code</th>
                                    <th>Group Name</th>
                                    <th style="width: 10%">Title</th>
                                    <th class="text-center" style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data_group">
                                <?php $no = 1;
                                foreach ($list as $li) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $li['group_id'] ?></td>
                                        <td><?= $li['group_name'] ?></td>
                                        <td><?= $li['group_title'] ?></td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="edit_group('<?= $li['group_id'] ?>')"><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="javascript:void(0)" onclick="delete_group('<?= $li['group_id'] ?>')"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. Table Group -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Department -->
<div id="modal_group" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title_group"></h4>
            </div>
            <div class="modal-body form">
                <form action="#" class="form-horizontal" id="form_group" autocomplete="off">
                    <?= tag_input('hidden', 'id') ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Group Code</label>
                            <div class="col-sm-4">
                                <?= tag_input('text', 'group_code') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Group Name</label>
                            <div class="col-sm-6">
                                <?= tag_input('text', 'group_name') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Title</label>
                            <div class="col-sm-3">
                                <?= tag_input('text', 'title') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_group()">
                    <i class="fa fa-fw fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-fw fa-remove"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Department -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    $(document).ready(function() {
        table = $('#tbl_group').DataTable({
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': "<?= site_url(ucfirst('admin/group/list_group')) ?>",
                'type': 'post'
            },
            'columnDefs': [{
                'targets': [0, 4],
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

    function add_group() {
        save_method = 'add';
        $('#form_group')[0].reset();
        $('#modal_group').modal('show');
        $('#title_group').text('Modal Tambah Data Group');
    }

    function edit_group(id) {
        save_method = 'update';
        $('#form_group')[0].reset();
        $('.modal-title').text('Modal Ubah Data Group');

        $.ajax({
            url: "<?= site_url(ucfirst('admin/group/edit_group/')) ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal_group').modal('show');
                $('[name="id"]').val(data.id);
                $('[name="group_code"]').val(data.group_id);
                $('[name="group_name"]').val(data.group_name);
                $('[name="title"]').val(data.group_title);
            }
        });
    }

    function delete_group(id) {
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
                        url: '<?= site_url(ucfirst('admin/group/delete_group/')) ?>' + id,
                        type: 'post',
                        success: function(data) {
                            swal("Sukses!", "Data group telah berhasil dihapus", "success");
                            reload_table();
                        }
                    });
                }
            });
    }

    function save_group() {
        var url = '';
        if (save_method == 'add') url = "<?= site_url(ucfirst('admin/group/save_group')) ?>";
        else url = "<?= site_url(ucfirst('admin/group/update_group')) ?>";

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $('#form_group').serialize(),
            success: function(data) {
                if (data.db_error) {
                    swal('Kesalahan!', data.db_error, 'warning');
                }

                if (data.status == true) {
                    swal('Sukses!', 'Data group telah berhasil disimpan', 'success');
                    $('#modal_group').modal('hide');

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