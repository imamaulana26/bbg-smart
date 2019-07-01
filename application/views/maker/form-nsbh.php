
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="text-center">DATA NASABAH</h4>
                    </div>
                    <div class="panel-body">
                        <!-- form -->
                        <form class="form-horizontal" id="form_nsbh">
                            <input type="hidden" name="method" value="<?= $this->uri->segment(4) == '' ? 'save' : 'update' ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nomor Aplikasi</label>
                                        <div class="col-md-6">
                                            <?= tag_input('text', 'no_app', date('ymd') . mt_rand(), 'readonly') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Jenis Aplikasi</label>
                                        <div class="col-md-6">
                                            <select class="selectpicker" name="jns_app" id="jns_app">
                                                <option selected value="Baru">BARU</option>
                                                <option value="Top Up">TOP UP / PENAMBAHAN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Referensi</label>
                                        <div class="col-md-6">
                                            <select class="selectpicker" name="referensi" id="referensi">
                                                <option selected value="Referal BSM">Referal BSM</option>
                                                <option value="Referal Non BSM">Referal Non BSM</option>
                                                <option value="Canvasing">Canvasing</option>
                                                <option value="Walk-in">Walk-in</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nama Cabang</label>
                                        <div class="col-md-8">
                                            <select class="selectpicker" name="nm_cabang" data-live-search="true" data-size="10">
                                                <option selected value="0">-- Please Select --</option>
                                            </select>
                                            <div id="error-nm_cabang"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Tanggal NAP</label>
                                        <div class="col-md-4">
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
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nama Nasabah</label>
                                        <div class="col-md-6">
                                            <?= tag_input('text', 'nm_nasabah') ?>
                                            <div id="error-nm_nasabah"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Tanggal Kunjungan</label>
                                        <div class="col-md-4">
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
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Jenis Nasabah BSM</label>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Tgl Nasabah <i>Funding</i></label>
                                        <div class="col-md-4">
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
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Tgl Nasabah <i>Lending</i></label>
                                        <div class="col-md-4">
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
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Nomor CIF</label>
                                        <div class="col-md-4">
                                            <?= tag_input('text', 'no_cif') ?>
                                            <div id="error-no_cif"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Kunjungan Ke</label>
                                        <div class="col-md-5">
                                            <select class="selectpicker" name="tmpt_visit" id="tmpt_visit">
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
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Kunjungan Oleh</label>
                                        <div class="col-md-6">
                                            <?= tag_input('text', 'visitor') ?>
                                            <div id="error-visitor"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">BBRM / NIP</label>
                                        <div class="col-md-4">
                                            <?= tag_input('text', 'nip_bbrm') ?>
                                            <div id="error-nip_bbrm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Jenis Usaha</label>
                                        <div class="col-md-6">
                                            <select class="selectpicker" name="jns_usaha" id="jns_usaha">
                                                <!-- <option value="Perorangan">Perorangan</option>
                                                <option value="Badan Usaha">Badan Usaha</option> -->
                                                <?php if ($this->uri->segment(3) == 'reksus') { ?>
                                                    <option value="Badan Usaha">Badan Usaha</option>
                                                <?php } else { ?>
                                                    <option value="Perorangan">Perorangan</option>
                                                    <option value="Badan Usaha">Badan Usaha</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">BM / NIP</label>
                                        <div class="col-md-4">
                                            <?= tag_input('text', 'nip_bm') ?>
                                            <div id="error-nip_bm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <p class="text-center" style="font-weight: bold">A. INFORMASI PEMOHON</p>
                            <?php $this->load->view('maker/info_pemohon'); ?>
                            <hr>
                            <p class="text-center" style="font-weight: bold">B. INFORMASI USAHA</p>
                            <?php $this->load->view('maker/info_usaha') ?>
                            <hr>
                            <?php if ($this->uri->segment(4) == '') { ?>
                                <p class="text-center" style="font-weight: bold">C. PENGURUS PERUSAHAAN</p>
                                <?php $this->load->view('maker/info_person');
                            } ?>
                            <hr>
                        </form>

                        <button class="btn btn-default pull-right" onclick="save()">
                            Next <i class="fa fa-fw fa-chevron-right"></i>
                        </button>
                        <a href="<?= site_url('Maker/Nota') ?>" class="btn btn-default">
                            <i class="fa fa-fw fa-chevron-left"></i> Back
                        </a>
                        <!-- ./form -->
                    </div>
                </div>