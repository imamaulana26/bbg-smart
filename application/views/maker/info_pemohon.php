<!-- Perorangan -->
<div id="perorangan" style="display: block">
    <p class="text-center">PERORANGAN</p>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nomor KTP</label>
                <div class="col-sm-6">
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
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Nasabah</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'nm_nsbh', '', 'readonly') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. NPWP Nasabah</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'no_npwp_nsbh') ?>
                    <div id="error-no_npwp_nsbh"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Tempat Lahir</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'tmpt_lahir', '', 'readonly') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Ibu Kandung</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'nm_ibu', '', 'readonly') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-md-4">Tanggal Lahir</label>
                <div class="col-sm-4">
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
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Agama</label>
                <div class="col-sm-5">
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
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Usia</label>
                <div class="col-sm-2">
                    <?= tag_input('text', 'usia', '', 'readonly') ?>
                </div>
                <label class="control-label">Tahun</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. Telp Nasabah</label>
                <div class="col-sm-4">
                    <?= tag_input('text', 'no_telp') ?>
                    <div id="error-no_telp"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. HP</label>
                <div class="col-sm-4">
                    <?= tag_input('text', 'no_hp') ?>
                    <div id="error-no_hp"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Kode POS KTP</label>
                <div class="col-sm-3">
                    <?= tag_input('text', 'kd_pos_ktp', '', 'readonly') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Kode POS Domisili</label>
                <div class="col-sm-3">
                    <?= tag_input('text', 'kd_pos_dom') ?>
                    <div id="error-kd_pos_dom"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat KTP</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_ktp" id="almt_ktp" rows="3" readonly></textarea>
                    <input type="checkbox" id="verify" onclick="get_verify()"> <i>Alamat domisili sama dengan KTP</i>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Domisili</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_dom" id="almt_dom" rows="3"></textarea>
                    <div id="error-almt_dom"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Pendidikan Terakhir</label>
                <div class="col-sm-6">
                    <select class="selectpicker" name="pendidikan" id="pendidikan">
                        <option selected value="0">-- Please Select --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    <div id="error-pendidikan"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Status Pernikahan</label>
                <div class="col-sm-6">
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
    </div>

    <!-- Spouse -->
    <div id="spouse" style="display: none">
        <p class="text-center">INFORMASI PASANGAN PEMOHON PERORANGAN</p>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4">Nomor KTP</label>
                    <div class="col-sm-6">
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
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4">Nama Spouse</label>
                    <div class="col-sm-6">
                        <?= tag_input('text', 'nm_spouse', '', 'readonly') ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4">Pendidikan Terakhir</label>
                    <div class="col-sm-6">
                        <select class="selectpicker" name="pend_spouse" id="pend_spouse">
                            <option selected value="0">-- Please Select --</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        <div id="error-pend_spouse"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4">Tempat Lahir</label>
                    <div class="col-sm-6">
                        <?= tag_input('text', 'tmpt_lahir_spouse', '', 'readonly') ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-md-4">Tanggal Lahir</label>
                    <div class="col-sm-4">
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
        </div>
    </div>
    <!-- / Spouse -->

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. Kartu Keluarga</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'no_kk', '', 'readonly') ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Tgl. Kartu Keluarga</label>
                <div class="col-sm-4">
                    <div class="datepicker-center">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div>
                            <?= tag_input('text', 'tgl_kk', '', 'placeholder="yyyy-mm-dd"') ?>
                        </div>
                        <div id="error-tgl_kk"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="control-label col-sm-2">Nasabah Termasuk Pihak Terkait Bank</label>
                <div class="col-sm-3">
                    <label class="radio-inline"><input type="radio" name="nsbh_bank" value="Y">Ya</label>
                    <label class="radio-inline"><input type="radio" name="nsbh_bank" value="N">Tidak</label>
                    <div id="error-nsbh_bank"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Perorangan -->

<!-- Badan Usaha -->
<div id="bdn_usaha" style="display: none">
    <p class="text-center">BADAN HUKUM / NON BADAN HUKUM</p><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Pemohon</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'nm_pemohon') ?>
                    <div id="error-nm_pemohon"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. Akta Pendirian</label>
                <div class="col-sm-4">
                    <?= tag_input('text', 'no_akta_pendirian') ?>
                    <div id="error-no_akta_pendirian"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Tgl. Akta Pendirian</label>
                <div class="col-sm-4">
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
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. Akta Terakhir</label>
                <div class="col-sm-4">
                    <?= tag_input('text', 'no_akta_terakhir') ?>
                    <div id="error-no_akta_terakhir"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Tgl. Akta Terakhir</label>
                <div class="col-sm-4">
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
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">No. NPWP Nasabah</label>
                <div class="col-sm-6">
                    <?= tag_input('text', 'no_npwp') ?>
                    <div id="error-no_npwp"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4"><i>Contact Person</i></label>
                <div class="col-sm-5">
                    <?= tag_input('text', 'c_person') ?>
                    <div id="error-c_person"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Jabatan</label>
                <div class="col-sm-5">
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
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Sesuai Akta</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_akta" id="almt_akta" rows="3"></textarea>
                    <div id="error-almt_akta"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Kantor</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_kantor1" id="almt_kantor1" rows="3"></textarea>
                    <div id="error-almt_kantor1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Badan Usaha -->