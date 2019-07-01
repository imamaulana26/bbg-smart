<div class="clonedInput" id="entry1">
    <h2 id="reference" name="reference" class="heading-reference">Entry #1</h2>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Key Person</label>
                <div class="col-sm-6">
                    <input type="text" name="nm_pengurus[]" id="nm_pengurus" class="form-control">
                    <div id="error-nm_pengurus"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Gender</label>
                <div class="col-sm-4">
                    <select name="gender[]" id="gender" class="form-control">
                        <option selected value="0">-- Please Select --</option>
                        <option value="L">Laki - laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div id="error-gender"></div>
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
                            <input type="text" class="form-control" name="tgl_lahir_pengurus[]" id="tgl_lahir_pengurus" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div id="error-tgl_lahir_pengurus"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Jabatan</label>
                <div class="col-sm-6">
                    <select name="jbtn_pengurus[]" id="jbtn_pengurus" class="form-control" data-size="10">
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
                    <div id="error-jbtn_pengurus"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Pendidikan</label>
                <div class="col-sm-4">
                    <select name="pend_pengurus[]" id="pend_pengurus" class="form-control">
                        <option selected value="0">-- Please Select --</option>
                        <?php $list = array('SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3');
                        foreach ($list as $li) {
                            echo "<option value='" . $li . "'>" . $li . "</option>";
                        } ?>
                    </select>
                    <div id="error-pend_pengurus"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Status</label>
                <div class="col-sm-4">
                    <select name="sts_pengurus[]" id="sts_pengurus" class="form-control">
                        <option selected value="0">-- Please Select --</option>
                        <?php $list = array('Menikah', 'Belum Menikah', 'Duda', 'Janda');
                        foreach ($list as $li) {
                            echo "<option value='" . $li . "'>" . $li . "</option>";
                        } ?>
                    </select>
                    <div id="error-sts_pengurus"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">NPWP</label>
                <div class="col-sm-5">
                    <input type="text" name="npwp_pengurus[]" id="npwp_pengurus" class="form-control">
                    <div id="error-npwp_pengurus"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">Nominal Saham (Rp)</label>
                <div class="col-sm-3">
                    <input type="text" name="nom_saham[]" id="nom_saham" class="form-control">
                    <div id="error-nom_saham"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="control-label col-sm-4">% Saham</label>
                <div class="col-sm-2">
                    <input type="text" name="saham[]" id="saham" class="form-control">
                    <div id="error-saham"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<p>
    <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Tambah form</button>
    <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">Hapus form</button>
</p>