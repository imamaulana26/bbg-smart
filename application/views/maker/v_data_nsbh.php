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
                <form class="form-horizontal" id="form-nsbh" autocomplete="off">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="cursor: pointer">
                                    <h4 class="panel-title"><i class="fa fa-fw fa-info-circle"></i> INFORMASI UMUM</h4>
                                </span>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nomor Aplikasi</label>
                                                <div class="col-sm-4">
                                                    <?= tag_input('text', 'no_app', date('ymd') . mt_rand(), 'readonly'); ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Jenis Aplikasi <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <select name="jns_app" id="jsn_app" class="form-control selectpicker">
                                                        <option value="Baru">Baru</option>
                                                        <option value="Top Up">Top Up</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Referensi <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <select name="referensi" id="referensi" class="form-control selectpicker">
                                                        <option value="Referal BSM">Referal BSM</option>
                                                        <option value="Referal Non BSM">Referal Non BSM</option>
                                                        <option value="Canvasing">Canvasing</option>
                                                        <option value="Walk In">Walk In</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nama Nasabah <span class="note">*</span></label>
                                                <div class="col-sm-6">
                                                    <?= tag_input('text', 'nm_nasabah') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nama Cabang <span class="note">*</span></label>
                                                <div class="col-sm-8">
                                                    <select name="nm_cabang" id="nm_cabang" class="form-control selectpicker" data-live-search="true" data-size="10">
                                                        <option selected disabled>-- Please Select --</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <label class="control-label">Jenis Nasabah BSM</label> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nasabah <i>Funding</i> Sejak</label>
                                                <div class="col-sm-4">
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <?= tag_input('text', 'tgl_funding', '', 'placeholder="yyyy-mm-dd"') ?>
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nasabah <i>Lending</i> Sejak</label>
                                                <div class="col-sm-4">
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <?= tag_input('text', 'tgl_lending', '', 'placeholder="yyyy-mm-dd"') ?>
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nomor CIF</label>
                                                <div class="col-sm-4">
                                                    <?= tag_input('text', 'no_cif') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Tanggal NAP <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <?= tag_input('text', 'tgl_nap', '', 'placeholder="yyyy-mm-dd"') ?>
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Tanggal Kunjungan <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <div class="datepicker-center">
                                                        <div class="input-group date">
                                                            <?= tag_input('text', 'tgl_visit', '', 'placeholder="yyyy-mm-dd"') ?>
                                                            <div class="input-group-addon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </div>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Tempat Kunjungan <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <select name="tmpt_visit" id="tmpt_visit" class="form-control selectpicker">
                                                        <option disabled selected>-- Please Select --</option>
                                                        <option value="Kantor">Kantor</option>
                                                        <option value="Rumah">Rumah</option>
                                                        <option value="Toko">Toko</option>
                                                        <option value="Pabrik">Pabrik</option>
                                                        <option value="Gudang">Gudang</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row after-add-more">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Kunjungan Oleh <span class="note">*</span></label>
                                                <div class="col-sm-6">
                                                    <?= tag_input('text', 'visitor[]') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Jabatan <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <?= tag_input('text', 'jbtn_visitor[]') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <span class="btn btn-primary add-more"><i class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- copy field -->
                                    <div class="copy hide">
                                        <div class="row duplicate">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4"></label>
                                                    <div class="col-sm-6">
                                                        <?= tag_input('text', 'visitor[]') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4"></label>
                                                    <div class="col-sm-4">
                                                        <?= tag_input('text', 'jbtn_visitor[]') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <span class="btn btn-danger remove"><i class="fa fa-remove"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /copy field -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Branch Manager <span class="note">*</span></label>
                                                <div class="col-sm-6">
                                                    <?= tag_input('text', 'bm') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">NIP BM <span class="note">*</span></label>
                                                <div class="col-sm-3">
                                                    <?= tag_input('text', 'nip_bm') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">BBRM <span class="note">*</span></label>
                                                <div class="col-sm-6">
                                                    <?= tag_input('text', 'bbrm') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">NIP BBRM <span class="note">*</span></label>
                                                <div class="col-sm-3">
                                                    <?= tag_input('text', 'nip_bbrm') ?>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Jenis Usaha <span class="note">*</span></label>
                                                <div class="col-sm-4">
                                                    <select name="jns_usaha" id="jns_usaha" class="form-control selectpicker">
                                                        <option value="Perorangan">Perorangan</option>
                                                        <option value="Badan Usaha">Badan Usaha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="cursor: pointer">
                                    <h4 class="panel-title"><i class="fa fa-fw fa-users"></i> INFORMASI PEMOHON</h4>
                                </span>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <!-- badan usaha -->
                                    <div id="bdn_usaha" style="display: none">
                                        <p class="text-center">BADAN HUKUM / NON BADAN HUKUM</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nama Pemohon <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <?= tag_input('text', 'nm_pemohon') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. NPWP Nasabah <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'npwp_nsbh') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. Akta Pendirian <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'no_akta_pendirian1') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Tanggal Akta Pendirian <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <div class="datepicker-center">
                                                            <div class="input-group date">
                                                                <?= tag_input('text', 'tgl_akta_pendirian1', '', 'placeholder="yyyy-mm-dd"') ?>
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. Akta Terakhir <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'no_akta_terakhir1') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Tanggal Akta Terakhir <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <div class="datepicker-center">
                                                            <div class="input-group date">
                                                                <?= tag_input('text', 'tgl_akta_terakhir1', '', 'placeholder="yyyy-mm-dd"') ?>
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Kontak Person <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'kontak_person') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Jabatan <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="jabatan" id="jabatan" class="form-control selectpicker">
                                                            <option selected disabled>-- Please Select --</option>
                                                            <option value="Direktur Utama">Direktur Utama</option>
                                                            <option value="Direktur">Direktur</option>
                                                            <option value="Komisaris Utama">Komisaris Utama</option>
                                                            <option value="Komisaris">Komisaris</option>
                                                            <option value="Perseroan Komanditer">Perseroan Komanditer</option>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat Sesuai Kantor <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="almt_akta" id="almt_akta" rows="3"></textarea>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat Kantor <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="almt_kantor1" id="almt_kantor1" rows="3"></textarea>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /badan usaha -->

                                    <!-- perorangan -->
                                    <div id="perorangan" style="block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nomor KTP <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <div class="input-group">
                                                            <?= tag_input('text', 'no_ktp') ?>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-search" id="btn_find" onclick="find()" style="cursor: pointer"></i>
                                                            </div>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Expired KTP
                                                        <i style="color: #08c" class="fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="top" title="Apabila KTP seumur hidup, maka field Expired KTP dikosongkan"></i>
                                                    </label>
                                                    <div class="col-sm-4">
                                                        <div class="datepicker-center">
                                                            <div class="input-group date">
                                                                <?= tag_input('text', 'exp_ktp', '', 'placeholder="yyyy-mm-dd"') ?>
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nama Nasabah <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <?= tag_input('text', 'nm_nsbh', '', 'readonly') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. NPWP Nasabah <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'no_npwp_nsbh') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Tempat Lahir <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <?= tag_input('text', 'tmpt_lahir', '', 'readonly') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Tanggal Lahir <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <div class="datepicker-center">
                                                            <div class="input-group date">
                                                                <?= tag_input('text', 'tgl_lahir', '', 'readonly placeholder="yyyy-mm-dd"') ?>
                                                                <div class="input-group-addon">
                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Agama <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="agama" id="agama" class="form-control selectpicker">
                                                            <option selected disabled>-- Please Select --</option>
                                                            <option value="1">Islam</option>
                                                            <option value="2">Kristen</option>
                                                            <option value="3">Khatolik</option>
                                                            <option value="4">Hindu</option>
                                                            <option value="5">Budha</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Usia <span class="note">*</span></label>
                                                    <div class="col-sm-2">
                                                        <?= tag_input('text', 'usia', '', 'readonly') ?>
                                                    </div>
                                                    <label class="control-label">Tahun</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nama Ibu Kandung <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <?= tag_input('text', 'nm_ibu', '', 'readonly') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. Telpon Nasabah <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <?= tag_input('text', 'no_telp') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. HP Nasabah <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <?= tag_input('text', 'no_hp') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Kode Pos KTP <span class="note">*</span></label>
                                                    <div class="col-sm-2">
                                                        <?= tag_input('text', 'kd_pos_ktp', '', 'readonly') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Kode Pos Domisili <span class="note">*</span></label>
                                                    <div class="col-sm-2">
                                                        <?= tag_input('text', 'kd_pos_dom') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat KTP <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="almt_ktp" id="almt_ktp" rows="3" readonly></textarea>
                                                        <label style="cursor: pointer"><input type="checkbox" id="verify" onclick="get_verify()"> Alamat domisili sama dengan KTP</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat Domisili <span class="note">*</span></label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="almt_dom" id="almt_dom" rows="3"></textarea>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Pendidikan Terakhir <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="pendidikan" id="pendidikan" class="form-control selectpicker">
                                                            <option selected disabled>-- Please Select --</option>
                                                            <?php $arr_pend = array('SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3');
                                                            foreach ($arr_pend as $pend) {
                                                                echo "<option value='" . $pend . "'>" . $pend . "</option>";
                                                            } ?>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Status Pernikahan <span class="note">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="sts_nikah" id="sts_nikah" class="form-control selectpicker">
                                                            <option disabled selected>-- Please Select --</option>
                                                            <option value="Menikah">Menikah</option>
                                                            <option value="Belum Menikah">Belum Menikah</option>
                                                            <option value="Cerai">Cerai</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- spouse -->
                                        <!-- /spouse -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No. Kartu Keluarga <span class="note">*</span></label>
                                                    <div class="col-sm-5">
                                                        <?= tag_input('text', 'no_kk', '', 'readonly') ?>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-4">Tanggal Kartu Keluarga <span class="note">*</span></label>
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <?= tag_input('text', 'tgl_kk', '', 'placeholder="yyyy-mm-dd"') ?>
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /perorangan -->
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="cursor: pointer">
                                    <h4 class="panel-title"><i class="fa fa-fw fa-building"></i> INFORMASI USAHA</h4>
                                </span>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="cursor: pointer">
                                    <h4 class="panel-title"><i class="fa fa-fw fa-exclamation-triangle"></i> DISCLAIMER</h4>
                                </span>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Dengan ini saya <?= "<b>" . $name . "</b>" ?> menyatakan bahwa semua data atau informasi yang diberikan dalam formulir ini adalah benar, akurat, dan lengkap serta dapat dipertanggung jawabkan,
                                        jika terdapat kerucangan dalam pengisian data maka saya bersedia menerima konsekuensi yang berlaku.</p>
                                    <center>
                                        <label style="cursor: pointer"><input type="checkbox" id="disclaim" onclick="disclaimer()"> Saya menyatakan bahwa memahami dengan baik semua pernyataan diatas.</label><br><br>
                                        <span class="btn btn-primary" id="btn_disclaimer" onclick="save()">Setuju dan Simpan</span>
                                    </center>
                                </div>
                            </div>
                        </div>
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
        $('[data-toggle="tooltip"]').tooltip();
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

        $('.add-more').click(function() {
            var html = $('.copy').html();
            $('.after-add-more').after(html);
        });
        $('body').on('click', '.remove', function() {
            $(this).parents('.duplicate').remove();
        });

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
        <?php if ($this->uri->segment(2) == 'reksus') { ?>
        url = '<?= site_url(ucfirst('maker/reksus/validasi_reksus')) ?>';
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