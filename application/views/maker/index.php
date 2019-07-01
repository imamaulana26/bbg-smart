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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><b>Daftar Nasabah Nota Analisa Pembiayaan - Reksus</b></center>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="tbl_reksus">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tgl. NAP</th>
                                <th>Cabang</th>
                                <th>Nomor Applikasi</th>
                                <th>Jenis Aplikasi</th>
                                <th>Nama Nasabah</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_reksus"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    $(document).ready(function() {
        get_data_reksus();
    });

    function get_data_reksus() {
        $.ajax({
            url: '<?= site_url('Maker/Nota/get_all_reksus') ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var row = '';
                for (var i = 0; i < data.length; i++) {
                    row += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + data[i].tgl_nap + '</td>' +
                        '<td>' + data[i].nm_cabang + '</td>' +
                        '<td>' + data[i].no_app + '</td>' +
                        '<td>' + data[i].jns_app + '</td>' +
                        '<td>' + data[i].nm_nasabah + '</td>' +
                        '<td class="text-center">' +
                        '<a href="javascript:void(0)" onclick="edit_reksus(' + data[i].no_app + ')"><i class="fa fa-fw fa-edit"></i></a>' +
                        '<a href="javascript:void(0)" onclick="delete_reksus(' + data[i].no_app + ')"><i class="fa fa-fw fa-trash"></i></a>' +
                        '</td></tr>';
                }
                $('#show_reksus').html(row);
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function edit_reksus(id) {
        window.location = '<?= site_url('Maker/Nota/reksus/') ?>' + id;
    }

    function delete_reksus(id) {
        swal({
                title: "Konfirmasi!",
                text: "Apakah anda yakin ingin menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            },
            function() {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('Maker/Nota/delete_reksus/') ?>" + id,
                    success: function(data) {
                        swal('Sukses!', 'Data menu telah berhasil dihapus', 'success');
                        get_data_reksus();
                    }
                });
            });
    }
</script>