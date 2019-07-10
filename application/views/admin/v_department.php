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
            <!-- Table Department -->
            <div class="col-md-6">
                <button class="btn btn-primary" style="margin-bottom: 10px" onclick="add_dept()">
                    <i class="fa fa-fw fa-plus"></i> Tambah Department
                </button>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <table class="table table-striped table-bordered table-hover" id="tbl_dept">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Code</th>
                                    <th>Department Name</th>
                                    <th>Divisi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data_dept"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. Table Department -->
            <!-- Table Divisi -->
            <div class="col-md-6">
                <button class="btn btn-primary btn-add" style="margin-bottom: 10px" onclick="add_div()">
                    <i class="fa fa-fw fa-plus"></i> Tambah Divisi
                </button>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <table class="table table-striped table-bordered table-hover" id="tbl_div">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Divisi Code</th>
                                    <th>Divisi Name</th>
                                    <th>Segment</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data_role"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.Table Divisi -->
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal Department -->
<div id="modal_dept" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title_dept"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" action="#" id="form_dept">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Department Code</label>
                            <div class="col-sm-4">
                                <?= tag_input('text', 'dept_code') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Department Name</label>
                            <div class="col-sm-6">
                                <?= tag_input('text', 'dept_name') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Divisi</label>
                            <div class="col-sm-6">
                                <!-- <select name="divisi" id="divisi" class="form-control selectpicker">
                                    <option selected disabled>-- Please Select --</option>
                                </select> -->
                                <?= tag_input('text', 'divisi') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_dept()">
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

<!-- Modal Divisi -->
<div id="modal_div" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="title_div"></h4>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal" action="#" id="form_div">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Divisi Code</label>
                            <div class="col-sm-4">
                                <?= tag_input('text', 'div_code') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Divisi Name</label>
                            <div class="col-sm-6">
                                <?= tag_input('text', 'div_name') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Segment</label>
                            <div class="col-sm-6">
                                <?= tag_input('text', 'segment') ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_div()">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /. Modal Divisi -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    $(document).ready(function() {
        $('#tbl_div').DataTable();
        $('#tbl_dept').DataTable();
    });

    function add_dept() {
        save_method = 'add';
        $('#form_dept')[0].reset();
        $('#modal_dept').modal('show');
        $('#title_dept').text('Modal Tambah Department');
    }

    function add_div() {
        save_method = 'add';
        $('#form_div')[0].reset();
        $('#modal_div').modal('show');
        $('#title_div').text('Modal Tambah Divisi');
    }

    function save_dept() {
        var url = '';
        if (save_method == 'add') url = "<?= site_url(ucfirst('admin/department/save_dept')) ?>";
        else url = "<?= site_url(ucfirst('admin/department/edit_dept')) ?>";

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $('#form_dept').serialize(),
            success: function(data) {
                if (data.status) {
                    swal('Sukses!', 'Data department telah berhasil disimpan', 'success');
                    $('#modal_dept').modal('hide');
                }
            }
        });
    }

    function save_div() {

    }
</script>