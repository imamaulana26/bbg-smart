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
                <form class="form-vertical" id="form_nsbh">
                    <?= tag_input('hidden', 'method', $this->uri->segment(3) == '' ? 'save' : 'update') ?>
                    <div class="panel-group" id="accordion">
                        <!-- DATA NASABAH -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="cursor: pointer">
                                    <h4 class="panel-title">
                                        <i class="fa fa-users"></i> DATA NASABAH
                                    </h4>
                                </span>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Nomor Aplikasi</label>
                                                <?= tag_input('text', 'no_app', date('ymd') . mt_rand(), 'readonly') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Jenis Aplikasi</label>
                                                <select class="form-control selectpicker" id="jns_app" name="jns_app">
                                                    <option selected value="Baru">BARU</option>
                                                    <option value="Top Up">TOP UP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Jenis Aplikasi</label>
                                                <select class="form-control selectpicker" id="referensi" name="referensi">
                                                    <option selected value="Referal BSM">Referal BSM</option>
                                                    <option value="Referal Non BSM">Referal Non BSM</option>
                                                    <option value="Canvasing">Canvasing</option>
                                                    <option value="Walk-in">Walk-in</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Tanggal NAP</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_nap', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_nap"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Tgl. Nasabah Funding</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_funding', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_funding"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Tgl. Nasabah Lending</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_lending', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_lending"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nama Nasabah</label>
                                                <?= tag_input('text', 'nm_nasabah') ?>
                                                <div id="error-nm_nasabah"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Nama Cabang</label>
                                                <select class="form-control selectpicker" name="nm_cabang" id="nm_cabang" data-live-search="true" data-size="10">
                                                    <option selected value="0">-- Please Select --</option>
                                                </select>
                                                <div id="error-nm_cabang"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Kunjungan Oleh</label>
                                                <?= tag_input('text', 'visitor') ?>
                                                <div id="error-visitor"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Kunjungan</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_visit', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_visit"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Kunjungan Ke</label>
                                                <select class="form-control selectpicker" name="tmpt_visit" id="tmpt_visit">
                                                    <option selected value="0">-- Please Select --</option>
                                                    <option value="Kantor">Kantor</option>
                                                    <option value="Rumah">Rumah</option>
                                                    <option value="Toko">Toko</option>
                                                    <option value="Pabrik">Pabrik</option>
                                                    <option value="Gudang">Gudang</option>
                                                </select>
                                                <div id="error-tmpt_visit"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Nomor CIF</label>
                                                <?= tag_input('text', 'no_cif') ?>
                                                <div id="error-no_cif"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>BBRM / NIP</label>
                                                <?= tag_input('text', 'nip_bbrm') ?>
                                                <div id="error-nip_bbrm"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>BM / NIP</label>
                                                <?= tag_input('text', 'nip_bm') ?>
                                                <div id="error-nip_bm"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Jenis Nasabah</label>
                                                <select class="selectpicker" name="jns_usaha" id="jns_usaha">
                                                    <?php if ($this->uri->segment(2) == 'Reksus') { ?>
                                                        <option value="Badan Usaha">Badan Usaha</option>
                                                    <?php } else { ?>
                                                        <option value="Perorangan">Perorangan</option>
                                                        <option value="Badan Usaha">Badan Usaha</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./panel-body -->
                            </div>
                        </div>
                        <!-- /DATA NASABAH -->

                        <!-- INFORMASI PEMOHON -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="cursor: pointer">
                                    <h4 class="panel-title">
                                        <i class="fa fa-info-circle"></i> INFORMASI PEMOHON
                                    </h4>
                                </span>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <!-- panel-body -->
                                <div class="panel-body">
                                    <!-- badan-usaha -->
                                    <div id="bdn_usaha" style="display: none">
                                        <p class="text-center">BADAN HUKUM / NON BADAN HUKUM</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nama Pemohon</label>
                                                    <?= tag_input('text', 'nm_pemohon') ?>
                                                    <div id="error-nm_pemohon"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Nomor NPWP Nasabah</label>
                                                    <?= tag_input('text', 'no_npwp') ?>
                                                    <div id="error-no_npwp"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nomor Akta Pendirian</label>
                                                    <?= tag_input('text', 'no_akta_pendirian') ?>
                                                    <div id="error-no_akta_pendirian"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Tgl. Akta Pendirian</label>
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                            <?= tag_input('text', 'tgl_akta_pendirian', '', 'placeholder="yyyy-mm-dd"') ?>
                                                        </div>
                                                        <div id="error-tgl_akta_pendirian"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nomor Akta Terakhir</label>
                                                    <?= tag_input('text', 'no_akta_terakhir') ?>
                                                    <div id="error-no_akta_terakhir"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Tgl. Akta Terakhir</label>
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                            <?= tag_input('text', 'tgl_akta_terakhir', '', 'placeholder="yyyy-mm-dd"') ?>
                                                        </div>
                                                        <div id="error-tgl_akta_terakhir"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contact Person</label>
                                                    <?= tag_input('text', 'c_person') ?>
                                                    <div id="error-c_person"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <select name="jabatan" id="jabatan" class="selectpicker">
                                                        <option selected value="0">-- Please Select --</option>
                                                        <option value="Direktur Utama">Direktur Utama</option>
                                                        <option value="Direktur">Direktur</option>
                                                        <option value="Komisaris Utama">Komisaris Utama</option>
                                                        <option value="Komisaris">Komisaris</option>
                                                        <option value="Perseroan Komanditer">Perseroan Komanditer</option>
                                                    </select>
                                                    <div id="error-jabatan"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Alamat Sesuai Akta</label>
                                                    <textarea class="form-control" name="almt_akta" id="almt_akta" rows="3"></textarea>
                                                    <div id="error-almt_akta"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Alamat Kantor</label>
                                                    <textarea class="form-control" name="almt_kantor1" id="almt_kantor1" rows="3"></textarea>
                                                    <div id="error-almt_kantor1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #/badan-usaha -->

                                    <!-- perorangan -->
                                    <div id="perorangan" style="display: block">
                                        <p class="text-center">PERORANGAN</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nomor KTP</label>
                                                    <div class="input-group">
                                                        <?= tag_input('text', 'no_ktp') ?>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-search" id="btn_find" onclick="find()" style="cursor: pointer"></i>
                                                        </div>
                                                    </div>
                                                    <div id="error-no_ktp"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nama Nasabah</label>
                                                    <?= tag_input('text', 'nm_nsbh', '', 'readonly') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Nomor NPWP Nasabah</label>
                                                    <?= tag_input('text', 'no_npwp_nsbh') ?>
                                                    <div id="error-no_npwp_nsbh"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Nama Ibu Kandung</label>
                                                    <?= tag_input('text', 'nm_ibu', '', 'readonly') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <?= tag_input('text', 'tmpt_lahir', '', 'readonly') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                            <?= tag_input('text', 'tgl_lahir', '', 'placeholder="yyyy-mm-dd" readonly') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Usia</label>
                                                    <?= tag_input('text', 'usia', '', 'readonly') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <select name="agama" id="agama" class="form-control" style="pointer-events: none">
                                                        <option selected value="0">-- Please Select --</option>
                                                        <option value="1">Islam</option>
                                                        <option value="2">Kristen</option>
                                                        <option value="3">Khatolik</option>
                                                        <option value="4">Hindu</option>
                                                        <option value="5">Budha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>No. Telepon Nasabah</label>
                                                    <?= tag_input('text', 'no_telp') ?>
                                                    <div id="error-no_telp"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="form-group">
                                                    <label>No. HP Nasabah</label>
                                                    <?= tag_input('text', 'no_hp') ?>
                                                    <div id="error-no_hp"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Kode Pos KTP</label>
                                                    <?= tag_input('text', 'kd_pos_ktp', '', 'readonly') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="form-group">
                                                    <label>Kode Pos Domisili</label>
                                                    <?= tag_input('text', 'kd_pos_dom') ?>
                                                    <div id="error-kd_pos_dom"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Alamat KTP</label>
                                                    <textarea class="form-control" name="almt_ktp" id="almt_ktp" rows="3" readonly></textarea>
                                                    <div id="error-almt_ktp"></div>
                                                    <label style="cursor: pointer"><input type="checkbox" id="verify" onclick="get_verify()"> Alamat domisili sama dengan KTP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Alamat Domisili</label>
                                                    <textarea class="form-control" name="almt_dom" id="almt_dom" rows="3"></textarea>
                                                    <div id="error-almt_dom"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Pendidikan Terakhir</label>
                                                    <select class="selectpicker" name="pendidikan" id="pendidikan">
                                                        <option selected value="0">-- Please Select --</option>
                                                        <?php $arr_pend = array('SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3');
                                                        foreach ($arr_pend as $pend) {
                                                            echo "<option value='" . $pend . "'>" . $pend . "</option>";
                                                        } ?>
                                                    </select>
                                                    <div id="error-pendidikan"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label>Status Pernikahan</label>
                                                    <select name="sts_nikah" id="sts_nikah" class="selectpicker">
                                                        <option selected value="0">-- Please Select --</option>
                                                        <option value="Menikah">Menikah</option>
                                                        <option value="Cerai">Cerai</option>
                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                    </select>
                                                    <div id="error-sts_nikah"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Spouse -->
                                        <div id="spouse" style="display: none">
                                            <hr>
                                            <p class="text-center">INFORMASI PASANGAN PEMOHON PERORANGAN</p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nomor KTP</label>
                                                        <div class="input-group">
                                                            <?= tag_input('text', 'no_ktp_spouse') ?>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-search" id="btn_spouse" onclick="find_spouse()" style="cursor: pointer"></i>
                                                            </div>
                                                        </div>
                                                        <div id="error-no_ktp_spouse"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nama Spouse</label>
                                                        <?= tag_input('text', 'nm_spouse', '', 'readonly') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label>Pendidikan Terakhir</label>
                                                        <select class="selectpicker" name="pend_spouse" id="pend_spouse">
                                                            <option selected value="0">-- Please Select --</option>
                                                            <?php $arr_pend = array('SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3');
                                                            foreach ($arr_pend as $pend) {
                                                                echo "<option value='" . $pend . "'>" . $pend . "</option>";
                                                            } ?>
                                                        </select>
                                                        <div id="error-pend_spouse"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <?= tag_input('text', 'tmpt_lahir_spouse', '', 'readonly') ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-md-offset-2">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <div class="datepicker-center">
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                </div>
                                                                <?= tag_input('text', 'tgl_lahir_spouse', '', 'placeholder="yyyy-mm-dd" readonly') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <!-- / Spouse -->

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>No. Kartu Keluarga</label>
                                                    <?= tag_input('text', 'no_kk', '', 'readonly') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-2">
                                                <div class="form-group">
                                                    <label>Tgl. Kartu Keluarga</label>
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                            <?= tag_input('text', 'tgl_kk', '', 'placeholder="yyyy-mm-dd"') ?>
                                                        </div>
                                                    </div>
                                                    <div id="error-tgl_kk"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Nasabah Termasuk Pihak Terkait Bank</label>
                                                    <label class="radio-inline"><input type="radio" name="nsbh_bank" value="Y">Ya</label>
                                                    <label class="radio-inline"><input type="radio" name="nsbh_bank" value="N">Tidak</label>
                                                    <div id="error-nsbh_bank"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- #/perorangan -->
                                </div>
                                <!-- ./panel-body -->
                            </div>
                        </div>
                        <!-- /INFORMASI PEMOHON -->

                        <!-- INFORMASI USAHA -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapseThere" style="cursor: pointer">
                                    <h4 class="panel-title">
                                        <i class="fa fa-building"></i> INFORMASI USAHA
                                    </h4>
                                </span>
                            </div>
                            <div id="collapseThere" class="panel-collapse collapse">
                                <!-- panel-body -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Entitas Legal</label>
                                                <select name="entitas" id="entitas" class="selectpicker">
                                                    <option selected value="0">-- Please Select --</option>
                                                    <option value="PT">Perusahaan Terbatas (PT)</option>
                                                    <option value="CV">Commaditer Venootschap (CV)</option>
                                                    <option value="PERSERO">Perseroan Terbatas (PERSERO)</option>
                                                    <option value="PERUM">Perseroan Umum (PERUM)</option>
                                                    <option value="PERUSDA">Perseroan Daerah (PERUSDA)</option>
                                                    <option value="Lainnya">Badan Hukum Lainnya</option>
                                                    <option value="Perorangan">Perorangan</option>
                                                </select>
                                                <div id="error-entitas"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Nama Usaha Nasabah</label>
                                                <?= tag_input('text', 'nm_usaha_nsbh') ?>
                                                <div id="error-nm_usaha_nsbh"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Jenis Usaha Nasabah</label>
                                                <?= tag_input('text', 'jns_usaha_nsbh') ?>
                                                <div id="error-jns_usaha_nsbh"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Bekerjasama dengan BPJS ketenagakerjaan?</label>
                                                <p></p>
                                                <label class="radio-inline"><input type="radio" name="bpjs" value="Y">Ya</label>
                                                <label class="radio-inline"><input type="radio" name="bpjs" value="N">Tidak</label>
                                                <div id="error-bpjs"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>SKDP / SITU / SKDU</label>
                                                <?= tag_input('text', 'no_skdp') ?>
                                                <div id="error-no_skdp"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Berlaku</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_skdp', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_skdp"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>SIUP</label>
                                                <?= tag_input('text', 'no_siup') ?>
                                                <div id="error-no_siup"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Berlaku</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_siup', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_siup"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>TDP</label>
                                                <?= tag_input('text', 'no_tdp') ?>
                                                <div id="error-no_tdp"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Berlaku</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_tdp', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_tdp"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Alamat Usaha</label>
                                                <textarea class="form-control" name="almt_usaha" id="almt_usaha" rows="3"></textarea>
                                                <label style="cursor: pointer"><input type="checkbox" id="almt" onclick="get_alamat()"> <i>Alamat kantor sama dengan alamat usaha</i></label>
                                                <div id="error-almt_usaha"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Alamat Kantor</label>
                                                <textarea class="form-control" name="almt_kantor2" id="almt_kantor2" rows="3"></textarea>
                                                <div id="error-almt_kantor2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Lama Usaha</label>
                                                <?= tag_input('text', 'lama_usaha') ?>
                                                <div id="error-lama_usaha"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Lama Usaha Sejenis</label>
                                                <?= tag_input('text', 'lama_jns_usaha') ?>
                                                <div id="error-lama_jns_usaha"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sektor Ekonomi LSMK</label>
                                                <select name="sektor_lsmk" id="sektor_lsmk" class="form-control selectpicker" data-live-search="true" data-size="10">
                                                    <option selected value="0">-- Please Select --</option>
                                                </select>
                                                <div id="error-sektor_lsmk"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Bidang Usaha LSMK</label>
                                                <select name="bid_lsmk" id="bid_lsmk" class="form-control" style="pointer-events: none">
                                                    <option selected value="0">-- Please Select --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>No. Akta Pendirian Usaha</label>
                                                <?= tag_input('text', 'no_akta_pendirian_usaha') ?>
                                                <div id="error-no_akta_pendirian_usaha"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tgl. Akta Pendirian</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_akta_pendirian_usaha', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_akta_pendirian_usaha"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>No. Akta Terakhir Usaha</label>
                                                <?= tag_input('text', 'no_akta_terakhir_usaha') ?>
                                                <div id="error-no_akta_terakhir_usaha"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Tgl. Akta Terakhir</label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_akta_terakhir_usaha', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                    <div id="error-tgl_akta_terakhir_usaha"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Pengesahan Kementrian Hukum & HAM</label>
                                                <?= tag_input('text', 'no_pengesahan') ?>
                                                <div id="error-no_pengesahan"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>No. Penerimaan Pemberitahuan Perubahan Data Perseroan</label>
                                                <?= tag_input('text', 'no_penerimaan') ?>
                                                <div id="error-no_penerimaan"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nama Notaris</label>
                                                <?= tag_input('text', 'nm_notaris') ?>
                                                <div id="error-nm_notaris"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./panel-body -->
                            </div>
                        </div>
                        <!-- /INFORMASI USAHA -->

                        <!-- DISCLAIMER -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapseFour" style="cursor: pointer">
                                    <h4 class="panel-title">
                                        <i class="fa fa-exclamation-triangle"></i> DISCLAIMER
                                    </h4>
                                </span>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <!-- panel-body -->
                                <div class="panel-body">
                                    <p>Dengan ini saya <?= "<b>" . $name . "</b>" ?> menyatakan bahwa semua data atau informasi yang diberikan dalam formulir ini adalah benar, akurat, dan lengkap serta dapat dipertanggung jawabkan, 
                                    jika terdapat kerucangan dalam pengisian data maka saya bersedia menerima konsekuensi yang berlaku.</p>
                                    <center>
                                        <label style="cursor: pointer"><input type="checkbox" id="disclaim" onclick="disclaimer()"> Saya menyatakan bahwa memahami dengan baik semua pernyataan diatas.</label><br><br>
                                        <span class="btn btn-primary" id="btn_disclaimer" onclick="save()">Setuju dan Simpan</span>
                                    </center>
                                </div>
                                <!-- ./panel-body -->
                            </div>
                        </div>
                        <!-- /DISCLAIMER -->
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php $this->load->view('templates/_footer'); ?>

<script>
    $(document).ready(function() {
        get_cabang();
        get_lsmk();
        $('.selectpicker').selectpicker('refresh');
        edit();
        $('#btn_disclaimer').hide();

        $('#jns_usaha').change(function() {
            if ($(this).val() == 'Badan Usaha') {
                $('#perorangan').css('display', 'none');
                $('#bdn_usaha').css('display', 'block');
            } else {
                $('#perorangan').css('display', 'block');
                $('#bdn_usaha').css('display', 'none');
            }
        });

        if ($('#jns_usaha').val() == 'Badan Usaha') {
            $('#perorangan').css('display', 'none');
            $('#bdn_usaha').css('display', 'block');
        } else {
            $('#perorangan').css('display', 'block');
            $('#bdn_usaha').css('display', 'none');
        }

        $('#sts_nikah').change(function() {
            if ($(this).val() == 'Menikah') {
                $('#spouse').css('display', 'block');
            } else {
                $('#spouse').css('display', 'none');
            }
        });

        $('#sektor_lsmk').change(function() {
            $('#bid_lsmk').val($(this).val());
            $('.selectpicker').selectpicker('refresh');
        });

        // $('#btnAdd').click(function() {
        //     var num = $('.clonedInput').length,
        //         newNum = new Number(num + 1),
        //         newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow');
        //     newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Entry #' + newNum);

        //     $('#entry' + num).after(newElem);
        //     $('#btnDel').attr('disabled', false);

        //     if (newNum == 3) {
        //         $('#btnAdd').attr('disabled', true);
        //     }
        // });

        // $('#btnDel').click(function() {
        //     var num = $('.clonedInput').length;
        //     // Berapa banyak form duplikasi yang telah dibuat
        //     $('#entry' + num).slideUp('slow', function() {
        //         $(this).remove();
        //         // Jika hanya satu form, disable tombol remove 
        //         if (num - 1 === 1) {
        //             $('#btnDel').attr('disabled', true);
        //             $('#btnAdd').attr('disabled', false);
        //         }
        //     });
        // });
        // $('#btnDel').attr('disabled', true);

    });

    function get_verify() {
        if (document.getElementById('verify').checked) {
            $('#kd_pos_dom').val($('#kd_pos_ktp').val());
            $('#almt_dom').val($('#almt_ktp').val());
        } else {
            $('#kd_pos_dom').val('');
            $('#almt_dom').val('');
        }

    }

    function disclaimer() {
        if (document.getElementById('disclaim').checked) {
            $('#btn_disclaimer').show();
        } else {
            $('#btn_disclaimer').hide();
        }
    }

    function get_alamat() {
        if (document.getElementById('almt').checked) {
            $('#almt_kantor2').val($('#almt_usaha').val());
        } else {
            $('#almt_kantor2').val('');
        }
    }

    function get_cabang() {
        $.ajax({
            url: '<?= site_url('api_cabang/get_cabang') ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $('#nm_cabang').append('<option value="' + data[i].kd_cabang + '">' + data[i].nm_cabang + '</option>');
                }
                $('.selectpicker').selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function get_lsmk() {
        $.ajax({
            url: '<?= site_url('data_lsmk/get_lsmk') ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $('#sektor_lsmk').append('<option value="' + data[i].id_kode + '">' + data[i].id_kode + ' - ' + data[i].sekon_lsmk + '</option>');
                    $('#bid_lsmk').append('<option value="' + data[i].id_kode + '">' + data[i].id_kode + ' - ' + data[i].format_lsmk + '</option>');
                }
                $('.selectpicker').selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function find() {
        var nik = $('#no_ktp').val();

        $.ajax({
            url: '<?= site_url('api_dukcapil/get_data/') ?>' + nik,
            type: 'post',
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn_find').removeClass('fa-search').addClass('fa-spin').addClass('fa-refresh');
            },
            success: function(data) {
                if (nik != '') {
                    $('#btn_find').removeClass('fa-spin').removeClass('fa-refresh').addClass('fa-search');
                    console.log(data);
                    var tgl_lhr = data.TGL_LHR;
                    var thn = new Date();

                    $('[name="nm_nsbh"]').val(data.NAMA_LGKP);
                    $('[name="tmpt_lahir"]').val(data.TMPT_LHR);
                    $('[name="nm_ibu"]').val(data.NAMA_LGKP_IBU);
                    $('[name="tgl_lahir"]').val(tgl_lhr);
                    $('[name="agama"]').val(data.AGAMA);
                    $('[name="no_kk"]').val(data.NO_KK);
                    $('[name="kd_pos_ktp"]').val(data.KODE_POS);
                    $('[name="kd_pos_dom"]').val('');
                    $('[name="almt_ktp"]').val(data.ALAMAT + ' RT.0' + data.NO_RT + ' RW.0' + data.NO_RW);
                    $('[name="almt_dom"]').val('');
                    $('.selectpicker').selectpicker('refresh');
                    $('[name="usia"]').val(thn.getFullYear() - tgl_lhr.substr(0, 4));
                    $('#verify').prop('checked', false);
                }
            },
            error: function(xhr, status, error) {
                swal('Kesalahan!', 'Nomor KTP tidak terdaftar', 'warning');
                $('#btn_find').removeClass('fa-spin').removeClass('fa-refresh').addClass('fa-search');

                $('[name="nm_nsbh"]').val('');
                $('[name="tmpt_lahir"]').val('');
                $('[name="nm_ibu"]').val('');
                $('[name="tgl_lahir"]').val('');
                $('[name="agama"]').val('');
                $('[name="no_kk"]').val('');
                $('[name="almt_ktp"]').val('');
                $('[name="kd_pos_ktp"]').val('');
                $('.selectpicker').selectpicker('refresh');
                $('[name="usia"]').val('');
            }
        });
    }

    function find_spouse() {
        var nik_spouse = $('#no_ktp_spouse').val();

        $.ajax({
            url: '<?= site_url('api_dukcapil/get_data/') ?>' + nik_spouse,
            type: 'post',
            dataType: 'JSON',
            beforeSend: function() {
                $('#btn_spouse').removeClass('fa-search').addClass('fa-spin').addClass('fa-refresh');
            },
            success: function(data) {
                if (nik_spouse != '') {
                    $('#btn_spouse').removeClass('fa-spin').removeClass('fa-refresh').addClass('fa-search');

                    $('[name="nm_spouse"]').val(data.NAMA_LGKP);
                    $('[name="tmpt_lahir_spouse"]').val(data.TMPT_LHR);
                    $('[name="tgl_lahir_spouse"]').val(data.TGL_LHR);
                }
            },
            error: function(xhr, status, error) {
                swal('Kesalahan!', 'Nomor KTP tidak terdaftar', 'warning');
                $('#btn_spouse').removeClass('fa-spin').removeClass('fa-refresh').addClass('fa-search');

                $('[name="nm_spouse"]').val('');
                $('[name="tmpt_lahir_spouse"]').val('');
                $('[name="tgl_lahir_spouse"]').val('');
            }
        });
    }

    // CRUD AJAX
    function save() {
        <?php if ($this->uri->segment(2) == 'Reksus') { ?>
            url = '<?= site_url('Maker/Reksus/validasi_reksus') ?>';
        <?php } else { ?>
            url = '';
        <?php } ?>

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: $('#form_nsbh').serialize(),
            success: function(result) {
                if (!result.status) {
                    $.each(result.error, function(key, value) {
                        $('#error-' + key).html(value);
                    });
                    swal('Peringatan!', 'Tolong isi form dengan data yang sesuai', 'error');
                } else {
                    console.log(result);
                    // swal('Sukses!', 'Data nasabah telah berhasil disimpan', 'success');
                    $('#form_nsbh')[0].reset();
                    $('.selectpicker').selectpicker('refresh');
                    // $('.clone').remove();
                    window.location.href = '<?= site_url('Maker/Pengurus') ?>';
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr + ', ' + status + ', ' + error);
            }
        });
    }

    function edit() {
        var no_app = '<?= $this->uri->segment(4) ?>';

        $.ajax({
            url: '<?= site_url('maker/nota/get_reksus/') ?>' + no_app,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('.selectpicker').selectpicker('refresh');
                $('[name="no_app"]').val(data.no_app);
                $('[name="jns_app"]').val(data.jns_app);
                $('[name="nm_cabang"]').val(data.kd_cabang);
                $('[name="nm_nasabah"]').val(data.nm_nasabah);
                $('[name="referensi"]').val(data.referensi);
                $('[name="tgl_nap"]').val(data.tgl_nap);
                $('[name="tgl_visit"]').val(data.tgl_visit);
                $('[name="tgl_funding"]').val(data.tgl_funding);
                $('[name="tgl_lending"]').val(data.tgl_lending);
                $('[name="tmpt_visit"]').val(data.tmpt_visit);
                $('[name="visitor"]').val(data.visitor);
                $('[name="no_cif"]').val(data.no_cif);
                $('[name="nip_bbrm"]').val(data.nip_bbrm);
                $('[name="nip_bm"]').val(data.nip_bm);

                $('[name="nm_pemohon"]').val(data.nm_pemohon);
                $('[name="no_akta_pendirian"]').val(data.akta_pendirian);
                $('[name="no_akta_terakhir"]').val(data.akta_terakhir);
                $('[name="tgl_akta_pendirian"]').val(data.tgl_akta_pendiri);
                $('[name="tgl_akta_terakhir"]').val(data.tgl_akta_akhir);
                $('[name="no_npwp"]').val(data.npwp_nsbh);
                $('[name="c_person"]').val(data.contact_person);
                $('[name="jabatan"]').val(data.jabatan);
                $('[name="almt_akta"]').val(data.almt_akta);
                $('[name="almt_kantor1"]').val(data.almt_kantor);
            }
        });
    }
    // CRUD AJAX
</script>