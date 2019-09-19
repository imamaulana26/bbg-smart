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
                <form id="form_nsbh" method="post" class="form-horizontal" action="" autocomplete="off">
                    <div class="panel-group" id="accordion">
                        <!-- DATA NASABAH -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><strong>A. INFORMASI UMUM</strong></h4>
                                <hr>
                                <!-- info umum -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nomor Aplikasi</label>
                                            <div class="col-sm-4">
                                                <?= tag_input('text', 'no_app', date('ymd') . mt_rand(), 'readonly'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Referensi <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="referensi" id="referensi" class="form-control selectpicker">
                                                    <option disabled selected>-- Please Select --</option>
                                                    <option value="Referal BSM">Referal BSM</option>
                                                    <option value="Referal Non BSM">Referal Non BSM</option>
                                                    <option value="Canvasing">Canvasing</option>
                                                    <option value="Walk In">Walk In</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama Cabang <span class="note">*</span></label>
                                            <div class="col-sm-8">
                                                <select name="nm_cabang" id="nm_cabang" class="form-control selectpicker" data-live-search="true" data-size="10">
                                                    <option selected disabled>-- Please Select --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nomor CIF <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <?= tag_input('text', 'no_cif') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nasabah Funding
                                                <a data-toggle="tooltip" data-placement="top" title="diisi jika ada">
                                                    <i class="fa fa-fw fa-question-circle"></i>
                                                </a>
                                            </label>
                                            <div class="col-sm-4">
                                                <?= tag_input('text', 'tgl_funding', '', 'placeholder="yyyy-mm-dd" data-provide="datepicker" data-date-format="yyyy-mm-dd"') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nasabah Lending
                                                <a data-toggle="tooltip" data-placement="top" title="diisi jika ada">
                                                    <i class="fa fa-fw fa-question-circle"></i>
                                                </a>
                                            </label>
                                            <div class="col-sm-4">
                                                <?= tag_input('text', 'tgl_lending', '', 'placeholder="yyyy-mm-dd" data-provide="datepicker" data-date-format="yyyy-mm-dd"') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama <span class="note">*</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="nama" id="nama" rows=3></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Branch Manager <span class="note">*</span></label>
                                            <div class="col-sm-6">
                                                <?= tag_input('text', 'bm') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">BBRM <span class="note">*</span></label>
                                            <div class="col-sm-6">
                                                <?= tag_input('text', 'bbrm') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Jenis Usaha <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="jns_usaha" id="jns_usaha" class="form-control selectpicker">
                                                    <option disabled selected>-- Please Select --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Jenis Nota <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="jns_nota" id="jns_nota" class="form-control selectpicker">
                                                    <option selected disabled>-- Please Select --</option>
                                                    <option value="Perdagangan">Perdagangan</option>
                                                    <option value="Jasa Pendidikan">Jasa Pendidikan</option>
                                                    <option value="Jasa Kesehatan">Jasa Kesehatan</option>
                                                    <option value="Alat Kesehatan">Alat Kesehatan</option>
                                                    <option value="Reksus">Reksus</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Jenis Aplikasi <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="jns_app" id="jsn_app" class="form-control selectpicker">
                                                    <option selected disabled>-- Please Select --</option>
                                                    <option value="Baru">Baru</option>
                                                    <option value="Top Up">Top Up</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Nama Nasabah <span class="note">*</span></label>
                                            <div class="col-sm-6">
                                                <?= tag_input('text', 'nm_nasabah') ?>
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

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal Kunjungan <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_visit', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Tanggal NAP <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_nap', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Jabatan <span class="note">*</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="jabatan" id="jabatan" rows=3></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">NIP BM <span class="note">*</span></label>
                                            <div class="col-sm-3">
                                                <?= tag_input('text', 'nip_bm') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4">NIP BBRM <span class="note">*</span></label>
                                            <div class="col-sm-3">
                                                <?= tag_input('text', 'nip_bbrm') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / info umum -->

                                <hr>
                                <h4><strong>B. BADAN HUKUM / NON BADAN HUKUM</strong></h4>
                                <hr>
                                <!-- badan usaha -->
                                <div id="bdn_usaha" style="display: none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">Nama Pemohon <span class="note">*</span></label>
                                                <div class="col-sm-6">
                                                    <?= tag_input('text', 'nm_pemohon'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">No. Akta Pendirian <span class="note">*</span></label>
                                                <div class="col-sm-5">
                                                    <?= tag_input('text', 'no_akta_pendirian'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">No. NPWP Nasabah <span class="note">*</span></label>
                                                <div class="col-sm-5">
                                                    <?= tag_input('text', 'no_npwp_nsbh'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-4">Tgl. Akta Pendirian <span class="note">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="datepicker-center">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                        </div>
                                                        <?= tag_input('text', 'tgl_akta_pendirian', '', 'placeholder="yyyy-mm-dd"') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / badan usaha -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-4">
                                                <button type="submit" id="submit" class="btn btn-primary">
                                                    <i class="fa fa-fw fa-save"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /DATA NASABAH -->
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
        validate();
        get_cabang();
        get_lsmk();
        $('.selectpicker').selectpicker('refresh');
        $('[data-toggle="tooltip"]').tooltip();
        // edit();
        $('#btn_disclaimer').hide();

        $('#jns_nota').change(function() {
            var opt = '<option selected disabled>-- Please Select --</option><option value="Badan Usaha">Badan Usaha</option>';
            if ($(this).val() == 'Reksus') {
                $('#jns_usaha').html(opt);
            } else {
                $('#jns_usaha').html(opt + '<option value="Perorangan">Perorangan</option>');
            }
            $('.selectpicker').selectpicker('refresh');
        });

        $('#jns_usaha').change(function() {
            if ($(this).val() == 'Badan Usaha') {
                $('#perorangan').css('display', 'none');
                $('#bdn_usaha').css('display', 'block');
            } else {
                $('#perorangan').css('display', 'block');
                $('#bdn_usaha').css('display', 'none');
            }
        });

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
    });

    jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    }, "Please enter the valid alphabet.");

    function validate() {
        $("#form_nsbh").validate({
            // ignore: ':not(select:hidden, input:visible, textarea:visible)',
            rules: {
                no_cif: {
                    required: true,
                    maxlength: 10,
                    number: true
                },
                nip_bbrm: {
                    required: true,
                    maxlength: 10,
                    number: true
                },
                nip_bm: {
                    required: true,
                    maxlength: 10,
                    number: true
                },
                nm_nasabah: {
                    required: true,
                    accept: "[a-z A-Z]+"
                },
                bm: {
                    required: true,
                    accept: "[a-z A-Z]+"
                },
                bbrm: {
                    required: true,
                    accept: "[a-z A-Z]+"
                },
                nama: {
                    required: true,
                    accept: "[a-zA-Z, ]+"
                },
                jabatan: {
                    required: true,
                    accept: "[a-zA-Z, ]+"
                },
                nm_cabang: "required",
                jns_nota: "required",
                referensi: "required",
                jns_app: "required",
                tgl_nap: "required",
                tgl_visit: "required",
                tmpt_visit: "required",
                jns_usaha: "required",
            },
            errorElement: "p",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parent().addClass("has-feedback");

                if ($(element).is('select') || $(element).parent().hasClass('input-group')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element); // default placement for everything else
                }

                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                }
            },
            success: function(label, element) {
                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parent().addClass("has-error").removeClass("has-success");
                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parent().addClass("has-success").removeClass("has-error");
                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            }
        });
    }

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