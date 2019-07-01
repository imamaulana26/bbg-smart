<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Entitas Legal</label>
            <div class="col-sm-6">
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
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Nama Usaha Nasabah</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'nm_usaha_nsbh') ?>
                <div id="error-nm_usaha_nsbh"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Jenis Usaha Nasabah</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'jns_usaha_nsbh') ?>
                <div id="error-jns_usaha_nsbh"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Bekerjasama dgn BPJS ketenagakerjaan?</label>
            <div class="col-sm-4">
                <label class="radio-inline"><input type="radio" name="bpjs" value="Y">Ya</label>
                <label class="radio-inline"><input type="radio" name="bpjs" value="N">Tidak</label>
                <div id="error-bpjs"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">SKDP / SITU / SKDU</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'no_skdp') ?>
                <div id="error-no_skdp"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">Tanggal Berlaku</label>
            <div class="col-sm-4">
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
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">SIUP</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'no_siup') ?>
                <div id="error-no_siup"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">Tanggal Berlaku</label>
            <div class="col-sm-4">
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
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">TDP</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'no_tdp') ?>
                <div id="error-no_tdp"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">Tanggal Berlaku</label>
            <div class="col-sm-4">
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
</div>

<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Usaha</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_usaha" id="almt_usaha" rows="3"></textarea>
                    <div id="error-almt_usaha"></div>
                    <input type="checkbox" id="almt" onclick="get_alamat()"> <i>Alamat kantor sama dengan alamat usaha</i>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Kantor</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="almt_kantor2" id="almt_kantor2" rows="3"></textarea>
                    <div id="error-almt_kantor2"></div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Lama Usaha</label>
            <div class="col-sm-2">
                <?= tag_input('text', 'lama_usaha') ?>
                <div id="error-lama_usaha"></div>
            </div>
            <label class="control-label">Tahun</label>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Lama Usaha Sejenis</label>
            <div class="col-sm-2">
                <?= tag_input('text', 'lama_jns_usaha') ?>
                <div id="error-lama_jns_usaha"></div>
            </div>
            <label class="control-label">Tahun</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2">Sek. Ekonomi LSMK</label>
            <div class="col-sm-6">
                <select name="sektor_lsmk" id="sektor_lsmk" class="form-control selectpicker" data-live-search="true" data-size="10">
                    <option selected value="0">-- Please Select --</option>
                </select>
                <div id="error-sektor_lsmk"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2">Bidang Usaha LSMK</label>
            <div class="col-sm-6">
                <select name="bid_lsmk" id="bid_lsmk" class="form-control" style="pointer-events: none">
                    <option selected value="0">-- Please Select --</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">No. Akta Pendirian Usaha</label>
            <div class="col-sm-4">
                <?= tag_input('text', 'no_akta_pendirian_usaha') ?>
                <div id="error-no_akta_pendirian_usaha"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Tgl. Akta Pendirian Usaha</label>
            <div class="col-sm-4">
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
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">No. Akta Terakhir Usaha</label>
            <div class="col-sm-4">
                <?= tag_input('text', 'no_akta_terakhir_usaha') ?>
                <div id="error-no_akta_terakhir_usaha"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Tgl. Akta Terakhir Usaha</label>
            <div class="col-sm-4">
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
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">No. Pengesahan Kementrian Hukum & HAM</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'no_pengesahan') ?>
                <div id="error-no_pengesahan"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">No. Penerimaan Pemberitahuan Perubahan Data Perseroan</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'no_penerimaan') ?>
                <div id="error-no_penerimaan"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-sm-4">Nama Notaris</label>
            <div class="col-sm-6">
                <?= tag_input('text', 'nm_notaris') ?>
                <div id="error-nm_notaris"></div>
            </div>
        </div>
    </div>
</div>