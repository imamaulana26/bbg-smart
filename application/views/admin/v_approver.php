<?php
function rand_string($length){
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $size = strlen($char);
    for ($i = 0; $i < $length; $i++) {
        $str = $char[rand(0, $size-1)];
        echo $str;
    }
}
$angka1 = range(0, 9);
shuffle($angka1);
$angka2 = range(0, 9);
shuffle($angka2);
$code1 = implode("", array_rand($angka1, 3));
$code2 = implode("", array_rand($angka2, 3));
$generate = $code1."-".$code2;
?>

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
            <!-- Table Office -->
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-fw fa-plus"></i> Request
                    </button>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="tbl_approver">
                                <thead>
                                    <tr>
                                        <th style="width: 13%">Code</th>
                                        <th>Pemohon</th>
                                        <th>Keterangan</th>
                                        <th>Penyetujuan</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <tr>
                                        <td><?= rand_string(3)."-".$generate ?></td>
                                        <td>
                                            <p>Imam (Help Desk) <br><span class="text-muted">helpdesk@syariahmandiri.co.id</span></p>
                                        </td>
                                        <td><span class="text-muted">Pengajuan : <?= date('d F Y') ?></span><br>Permohonan perubahan data cabang ID0010001 menjadi ID0010001a</td>
                                        <td>02 Jul 19</td>
                                        <td class="text-center"><p class="label label-danger">Pending</p></td>
                                        <td class="text-center">Aksi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. Table Office -->
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->