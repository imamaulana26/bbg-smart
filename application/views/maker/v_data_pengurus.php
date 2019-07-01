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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> DATA PENGURUS
                    </div>
                    <div class="panel-body">
                        <form id="form_submit" class="form-vertical" action="" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Nama Pengurus</label>
                                        <?= tag_input('text', 'nm_pengurus') ?>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="selectpicker">
                                            <option selected value="0">-- Please Select --</option>
                                            <option value="L">Laki - laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-md-offset-1">
                                        <label>Tanggal Lahir</label>
                                        <div class="datepicker-center">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" name="dob_pengurus" id="dob_pengurus" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Jabatan</label>
                                        <select name="jbtn_pengurus" id="jbtn_pengurus" class="selectpicker">
                                            <option selected value="0">-- Please Select --</option>
                                            <?php $list = array(
                                                'Dirut/Presdir Pemilik', 'Direktur Pemilik', 'Komit/PresKom Pemilik', 'Komisaris Pemilik', 'Kuasa Direksi Pemilik',
                                                'Pemilik non Pengurus', 'Masyarakat', 'Ketum Pemilik', 'Ketua Pemilik', 'Sekre. Pemilik', 'Bend. Pemilik', 'Pemilik Lainnya',
                                                'Dirut/Presdir non Pemilik', 'Direktur non Pemilik', 'Komit/PresKom non Pemilik', 'Komisaris non Pemilik', 'Kuasa Direksi non Pemilik',
                                                'Ketum non Pemilik', 'Ketua non Pemilik', 'Sekre. non Pemilik', 'Bend. non Pemilik', 'non Pemilik Lainnya'
                                            );
                                            foreach ($list as $li) {
                                                echo "<option value='" . $li . "'>" . $li . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Pendidikan</label>
                                        <select name="pend_pengurus" id="pend_pengurus" class="selectpicker">
                                            <option selected value="0">-- Please Select --</option>
                                            <?php $list = array('SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3');
                                            foreach ($list as $li) {
                                                echo "<option value='" . $li . "'>" . $li . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-md-offset-1">
                                        <label>Status</label>
                                        <select name="sts_pengurus" id="sts_pengurus" class="selectpicker">
                                            <option selected value="0">-- Please Select --</option>
                                            <?php $list = array('Menikah', 'Belum Menikah', 'Duda', 'Janda');
                                            foreach ($list as $li) {
                                                echo "<option value='" . $li . "'>" . $li . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>NPWP Pengurus</label>
                                        <?= tag_input('text', 'npwp_pengurus') ?>
                                    </div>
                                    <div class="col-md-2 col-md-offset-1">
                                        <label>Nominal Saham (Rp)</label>
                                        <?= tag_input('text', 'nom_saham') ?>
                                    </div>
                                    <div class="col-md-1 col-md-offset-1">
                                        <label>% Saham</label>
                                        <?= tag_input('text', 'saham') ?>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-info" id="submit" value="Tambah Pengurus">
                        </form>

                        <?php error_reporting(false);
                        if (isset($_POST['submit'])) {
                            $_SESSION['post'][] = array(
                                'no_app' => $this->session->userdata('no_app'),
                                'nm_pengurus' => trim($nm_pengurus),
                                'gender' => $this->input->post('gender'),
                                'dob_pengurus' => $this->input->post('dob_pengurus', true),
                                'jbtn_pengurus' => $this->input->post('jbtn_pengurus'),
                                'sts_pengurus' => $this->input->post('sts_pengurus'),
                                'pend_pengurus' => $this->input->post('pend_pengurus'),
                                'npwp_pengurus' => $this->input->post('npwp_pengurus', true),
                                'nom_saham' => $this->input->post('nom_saham', true),
                                'saham' => $this->input->post('saham', true)
                            );
                        } else {
                            unset($_SESSION['post']);
                        }
                        ?>

                        <form id="form_pengurus" method="post" action="">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Pengurus</td>
                                        <td>Jenis Kelamin</td>
                                        <td>Tanggal Lahir</td>
                                        <td>Jabatan</td>
                                        <td>Pendidikan</td>
                                        <td>Status</td>
                                        <td>NPWP Pengurus</td>
                                        <td>Nominal Saham</td>
                                        <td>% Saham</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($_SESSION['post']) < 4) {
                                        for ($i = 0; $i < count($_SESSION['post']); $i++) {
                                            echo "<tr>";
                                            echo "<td>" . ($i + 1) . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['nm_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['gender'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['dob_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['jbtn_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['pend_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['sts_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['npwp_pengurus'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['nom_saham'] . "</td>";
                                            echo "<td>" . $_SESSION['post'][$i]['saham'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        unset($_SESSION['post']);
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-danger pull-right" name="reset" value="Hapus Data">
                        </form>
                        <span class="btn btn-success" id="save_pengurus" onclick="save()">Simpan Data</span>

                        <?php if (isset($_POST['reset'])) {
                            unset($_SESSION['post']);
                        } ?>

                    </div>
                    <div class="panel-footer">
                        <b>Isi panel footer</b>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    var sess = '<?= count($_SESSION['post']) ?>';
    if (sess > 2) {
        $('#submit').attr('disabled', true);
    } else {
        $('#submit').attr('disabled', false);
    }


    function save(){
        $.ajax({
            url: '<?= site_url('Maker/Pengurus/save') ?>',
            dataType: 'JSON',
            type: 'POST',
            data: $('#form_pengurus').serialize(),
            success: function(result){
                console.log(result);
                swal('Sukses!', 'Data pengurus telah berhasil disimpan', 'success');
            },
            error: function(){
                swal('Peringatan!', 'Data pengurus gagal disimpan', 'danger');
            }
        });
    }
</script>