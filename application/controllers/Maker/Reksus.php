<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reksus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');

        user_helper();
    }

    public function val_date($date)
    {
        if (preg_match('/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/', $date)) {
            return true;
        } else if ($date == '') {
            $this->form_validation->set_message('val_date', '{field} can\'t be empty!');
            return false;
        } else {
            $this->form_validation->set_message('val_date', 'The input is invalid!');
            return false;
        }
    }

    public function val_check($check)
    {
        if ($check == "0") {
            $this->form_validation->set_message('val_check', 'Please choose the options.');
            return false;
        } else {
            return true;
        }
    }

    public function val_alpha($alpha)
    {
        if (preg_match('/^[a-z A-Z]/', $alpha)) {
            return true;
        } else if ($alpha == '') {
            $this->form_validation->set_message('val_alpha', '{field} can\'t be empty!');
            return false;
        } else {
            $this->form_validation->set_message('val_alpha', 'The input must be alphabetical characters');
            return false;
        }
    }

    public function val_text($text)
    {
        if (preg_match('/^[a-zA-Z0-9-.,\/ ]+$/', $text)) {
            return true;
        } else if ($text == '') {
            $this->form_validation->set_message('val_text', '{field} can\'t be empty!');
            return false;
        } else {
            $this->form_validation->set_message('val_text', 'The input is invalid characters');
            return false;
        }
    }

    // Reksus
    public function index()
    {
        $page = 'maker/v_data_nsbh';

        $data = array(
            'title' => 'Nota Analisis Pembiayaan - Reksus'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    public function validasi_reksus()
    {
        $this->form_validation->set_rules('nm_nasabah', 'This field', 'trim|callback_val_alpha');
        $this->form_validation->set_rules('visitor', 'This field', 'trim|callback_val_alpha');
        $this->form_validation->set_rules('tgl_nap', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('tgl_visit', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('tgl_funding', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('tgl_lending', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('nm_cabang', '', 'callback_val_check');
        $this->form_validation->set_rules('tmpt_visit', '', 'callback_val_check');
        $this->form_validation->set_rules('no_cif', 'This field', 'trim|required|numeric');
        $this->form_validation->set_rules('nip_bbrm', 'This field', 'trim|required|numeric');
        $this->form_validation->set_rules('nip_bm', 'This field', 'trim|required|numeric');

        if ($this->input->post('sts_nikah') == 'Menikah') {
            $this->form_validation->set_rules('no_ktp_spouse', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('pend_spouse', '', 'callback_val_check');
        }

        if ($this->input->post('jns_usaha') == 'Perorangan') {
            $this->form_validation->set_rules('no_ktp', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('no_npwp_nsbh', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('no_telp', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('no_hp', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('kd_pos_dom', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('almt_dom', 'This field', 'trim|callback_val_text');
            $this->form_validation->set_rules('pendidikan', '', 'callback_val_check');
            $this->form_validation->set_rules('sts_nikah', '', 'callback_val_check');
            $this->form_validation->set_rules('tgl_kk', 'This field', 'trim|callback_val_date');
            $this->form_validation->set_rules('nsbh_bank', '', 'required', ['required' => 'Please choose the options']);
        } else {
            $this->form_validation->set_rules('nm_pemohon', 'This field', 'trim|callback_val_alpha');
            $this->form_validation->set_rules('no_akta_pendirian', 'This field', 'trim|required|alpha_dash');
            $this->form_validation->set_rules('no_akta_terakhir', 'This field', 'trim|required|alpha_dash');
            $this->form_validation->set_rules('tgl_akta_pendirian', 'This field', 'trim|callback_val_date');
            $this->form_validation->set_rules('tgl_akta_terakhir', 'This field', 'trim|callback_val_date');
            $this->form_validation->set_rules('no_npwp', 'This field', 'trim|required|numeric');
            $this->form_validation->set_rules('c_person', 'This field', 'trim|callback_val_alpha');
            $this->form_validation->set_rules('jabatan', '', 'callback_val_check');
            $this->form_validation->set_rules('almt_akta', 'This field', 'trim|callback_val_text');
            $this->form_validation->set_rules('almt_kantor1', 'This field', 'trim|callback_val_text');
        }

        $this->form_validation->set_rules('entitas', '', 'callback_val_check');
        $this->form_validation->set_rules('nm_usaha_nsbh', 'This field', 'trim|callback_val_alpha');
        $this->form_validation->set_rules('jns_usaha_nsbh', 'This field', 'trim|callback_val_alpha');
        $this->form_validation->set_rules('bpjs', '', 'required', ['required' => 'Please choose the options']);
        $this->form_validation->set_rules('no_skdp', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('tgl_skdp', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('no_siup', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('tgl_siup', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('no_tdp', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('tgl_tdp', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('almt_usaha', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('almt_kantor2', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('lama_usaha', 'This field', 'trim|required|numeric');
        $this->form_validation->set_rules('lama_jns_usaha', 'This field', 'trim|required|numeric');
        $this->form_validation->set_rules('sektor_lsmk', '', 'callback_val_check');
        $this->form_validation->set_rules('no_akta_pendirian_usaha', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('tgl_akta_pendirian_usaha', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('no_akta_terakhir_usaha', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('tgl_akta_terakhir_usaha', 'This field', 'trim|callback_val_date');
        $this->form_validation->set_rules('no_pengesahan', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('no_penerimaan', 'This field', 'trim|callback_val_text');
        $this->form_validation->set_rules('nm_notaris', 'This field', 'trim|callback_val_alpha');

        // $this->form_validation->set_rules('nm_pengurus[]', 'This field', 'trim|callback_val_alpha');
        // $this->form_validation->set_rules('gender[]', '', 'callback_val_check');
        // $this->form_validation->set_rules('tgl_lahir_pengurus[]', 'This field', 'trim|callback_val_date');
        // $this->form_validation->set_rules('jbtn_pengurus[]', '', 'callback_val_check');
        // $this->form_validation->set_rules('sts_pengurus[]', '', 'callback_val_check');
        // $this->form_validation->set_rules('pend_pengurus[]', '', 'callback_val_check');
        // $this->form_validation->set_rules('npwp_pengurus[]', 'This field', 'trim|required|numeric');
        // $this->form_validation->set_rules('nom_saham[]', 'This field', 'trim|required|numeric');
        // $this->form_validation->set_rules('saham[]', 'This field', 'trim|required|numeric');

        $this->form_validation->set_message('required', '{field} can\'t be empty!');
        if ($this->form_validation->run() == false) {
            $data = array(
                'nm_nasabah' => form_error('nm_nasabah', '<small class="text-danger">', '</small>'),
                'tgl_nap' => form_error('tgl_nap', '<small class="text-danger">', '</small>'),
                'tgl_visit' => form_error('tgl_visit', '<small class="text-danger">', '</small>'),
                'nm_cabang' => form_error('nm_cabang', '<small class="text-danger">', '</small>'),
                'tgl_funding' => form_error('tgl_funding', '<small class="text-danger">', '</small>'),
                'tgl_lending' => form_error('tgl_lending', '<small class="text-danger">', '</small>'),
                'no_cif' => form_error('no_cif', '<small class="text-danger">', '</small>'),
                'tmpt_visit' => form_error('tmpt_visit', '<small class="text-danger">', '</small>'),
                'visitor' => form_error('visitor', '<small class="text-danger">', '</small>'),
                'nip_bbrm' => form_error('nip_bbrm', '<small class="text-danger">', '</small>'),
                'nip_bm' => form_error('nip_bm', '<small class="text-danger">', '</small>'),

                'nm_pemohon' => form_error('nm_pemohon', '<small class="text-danger">', '</small>'),
                'no_akta_pendirian' => form_error('no_akta_pendirian', '<small class="text-danger">', '</small>'),
                'no_akta_terakhir' => form_error('no_akta_terakhir', '<small class="text-danger">', '</small>'),
                'tgl_akta_pendirian' => form_error('tgl_akta_pendirian', '<small class="text-danger">', '</small>'),
                'tgl_akta_terakhir' => form_error('tgl_akta_terakhir', '<small class="text-danger">', '</small>'),
                'no_npwp' => form_error('no_npwp', '<small class="text-danger">', '</small>'),
                'c_person' => form_error('c_person', '<small class="text-danger">', '</small>'),
                'jabatan' => form_error('jabatan', '<small class="text-danger">', '</small>'),
                'almt_akta' => form_error('almt_akta', '<small class="text-danger">', '</small>'),
                'almt_kantor1' => form_error('almt_kantor1', '<small class="text-danger">', '</small>'),

                'no_ktp' => form_error('no_ktp', '<small class="text-danger">', '</small>'),
                'no_ktp' => form_error('no_ktp', '<small class="text-danger">', '</small>'),
                'no_npwp_nsbh' => form_error('no_npwp_nsbh', '<small class="text-danger">', '</small>'),
                'no_telp' => form_error('no_telp', '<small class="text-danger">', '</small>'),
                'no_hp' => form_error('no_hp', '<small class="text-danger">', '</small>'),
                'kd_pos_dom' => form_error('kd_pos_dom', '<small class="text-danger">', '</small>'),
                'almt_dom' => form_error('almt_dom', '<small class="text-danger">', '</small>'),
                'pendidikan' => form_error('pendidikan', '<small class="text-danger">', '</small>'),
                'sts_nikah' => form_error('sts_nikah', '<small class="text-danger">', '</small>'),
                'tgl_kk' => form_error('tgl_kk', '<small class="text-danger">', '</small>'),
                'nsbh_bank' => form_error('nsbh_bank', '<small class="text-danger">', '</small>'),

                'no_ktp_spouse' => form_error('no_ktp_spouse', '<small class="text-danger">', '</small>'),
                'pend_spouse' => form_error('pend_spouse', '<small class="text-danger">', '</small>'),

                'entitas' => form_error('entitas', '<small class="text-danger">', '</small>'),
                'nm_usaha_nsbh' => form_error('nm_usaha_nsbh', '<small class="text-danger">', '</small>'),
                'jns_usaha_nsbh' => form_error('jns_usaha_nsbh', '<small class="text-danger">', '</small>'),
                'bpjs' => form_error('bpjs', '<small class="text-danger">', '</small>'),
                'no_skdp' => form_error('no_skdp', '<small class="text-danger">', '</small>'),
                'tgl_skdp' => form_error('tgl_skdp', '<small class="text-danger">', '</small>'),
                'no_siup' => form_error('no_siup', '<small class="text-danger">', '</small>'),
                'tgl_siup' => form_error('tgl_siup', '<small class="text-danger">', '</small>'),
                'no_tdp' => form_error('no_tdp', '<small class="text-danger">', '</small>'),
                'tgl_tdp' => form_error('tgl_tdp', '<small class="text-danger">', '</small>'),
                'almt_usaha' => form_error('almt_usaha', '<small class="text-danger">', '</small>'),
                'almt_kantor2' => form_error('almt_kantor2', '<small class="text-danger">', '</small>'),
                'lama_usaha' => form_error('lama_usaha', '<small class="text-danger">', '</small>'),
                'lama_jns_usaha' => form_error('lama_jns_usaha', '<small class="text-danger">', '</small>'),
                'sektor_lsmk' => form_error('sektor_lsmk', '<small class="text-danger">', '</small>'),
                'no_akta_pendirian_usaha' => form_error('no_akta_pendirian_usaha', '<small class="text-danger">', '</small>'),
                'tgl_akta_pendirian_usaha' => form_error('tgl_akta_pendirian_usaha', '<small class="text-danger">', '</small>'),
                'no_akta_terakhir_usaha' => form_error('no_akta_terakhir_usaha', '<small class="text-danger">', '</small>'),
                'tgl_akta_terakhir_usaha' => form_error('tgl_akta_terakhir_usaha', '<small class="text-danger">', '</small>'),
                'no_pengesahan' => form_error('no_pengesahan', '<small class="text-danger">', '</small>'),
                'no_penerimaan' => form_error('no_penerimaan', '<small class="text-danger">', '</small>'),
                'nm_notaris' => form_error('nm_notaris', '<small class="text-danger">', '</small>'),

                // 'nm_pengurus' => form_error('nm_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'gender' => form_error('gender[]', '<small class="text-danger">', '</small>'),
                // 'tgl_lahir_pengurus' => form_error('tgl_lahir_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'jbtn_pengurus' => form_error('jbtn_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'sts_pengurus' => form_error('sts_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'pend_pengurus' => form_error('pend_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'npwp_pengurus' => form_error('npwp_pengurus[]', '<small class="text-danger">', '</small>'),
                // 'nom_saham' => form_error('nom_saham[]', '<small class="text-danger">', '</small>'),
                // 'saham' => form_error('saham[]', '<small class="text-danger">', '</small>')
            );
            echo json_encode(['error' => $data]);
            exit;
        } else {
            if ($_POST['method'] == 'save') {
                $this->save_reksus();
            } else {
                $this->update_reksus();
            }
        }
    }

    public function save_reksus()
    {
        $no_app = $this->input->post('no_app', true);
        $this->session->set_userdata(['no_app' => $no_app]);

        $no_ktp = $this->input->post('no_ktp', true);
        $jns_usaha = $this->input->post('jns_usaha', true);
        $sts_nikah = $this->input->post('sts_nikah', true);

        $dt_nsbh = array(
            'no_app' => $no_app,
            'jns_app' => $this->input->post('jns_app', true),
            'referensi' => $this->input->post('referensi', true),
            'nm_cabang' => $this->input->post('nm_cabang', true),
            'tgl_nap' => $this->input->post('tgl_nap', true),
            'nm_nasabah' => $this->input->post('nm_nasabah', true),
            'tgl_visit' => $this->input->post('tgl_visit', true),
            'tgl_funding' => $this->input->post('tgl_funding', true),
            'tgl_lending' => $this->input->post('tgl_lending', true),
            'tmpt_visit' => $this->input->post('tmpt_visit', true),
            'visitor' => $this->input->post('visitor', true),
            'no_cif' => $this->input->post('no_cif', true),
            'nip_bbrm' => $this->input->post('nip_bbrm', true),
            'nip_bm' => $this->input->post('nip_bm', true),
            'jns_usaha' => $jns_usaha,
            'jns_nota' => 'Reksus'
        );

        $dt_perorangan = array(
            'no_app' => $no_app,
            'no_ktp' => $no_ktp,
            'nm_nasabah' => $this->input->post('nm_nsbh', true),
            'nm_ibu' => $this->input->post('nm_ibu', true),
            'npwp_nasabah' => $this->input->post('no_npwp_nsbh', true),
            'tmpt_lahir' => $this->input->post('tmpt_lahir', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'usia' => $this->input->post('usia', true),
            'agama' => $this->input->post('agama', true),
            'tlp_nsbh' => $this->input->post('no_telp', true),
            'hp_nsbh' => $this->input->post('no_hp', true),
            'kd_pos_ktp' => $this->input->post('kd_pos_ktp'),
            'almt_ktp' => $this->input->post('almt_ktp', true),
            'kd_pos_dom' => $this->input->post('kd_pos_dom'),
            'almt_dom' => $this->input->post('almt_dom', true),
            'pend_nsbh' => $this->input->post('pendidikan', true),
            'sts_nikah' => $sts_nikah,
            'no_kk' => $this->input->post('no_kk', true),
            'tgl_kk' => $this->input->post('tgl_kk', true),
            'nsbh_bank' => $this->input->post('nsbh_bank', true)
        );

        $dt_spouse = array(
            'no_ktp' => $no_ktp,
            'no_ktp_spouse' => $this->input->post('no_ktp_spouse', true),
            'nm_spouse' => $this->input->post('nm_spouse', true),
            'pend_spouse' => $this->input->post('pend_spouse', true),
            'tgl_lahir_spouse' => $this->input->post('tgl_lahir_spouse', true),
            'tmpt_lahir_spouse' => $this->input->post('tmpt_lahir_spouse', true)
        );

        $dt_bdn_usaha = array(
            'no_app' => $no_app,
            'nm_pemohon' => $this->input->post('nm_pemohon', true),
            'no_akta_pendiri' => $this->input->post('no_akta_pendirian', true),
            'tgl_akta_pendiri' => $this->input->post('tgl_akta_pendirian', true),
            'no_akta_akhir' => $this->input->post('no_akta_terakhir', true),
            'tgl_akta_akhir' => $this->input->post('tgl_akta_terakhir', true),
            'npwp_nsbh' => $this->input->post('no_npwp', true),
            'contact_person' => $this->input->post('c_person', true),
            'jabatan' => $this->input->post('jabatan', true),
            'almt_akta' => $this->input->post('almt_akta', true),
            'almt_kantor' => $this->input->post('almt_kantor1', true)
        );

        $dt_info_usaha = array(
            'no_app' => $no_app,
            'entitas' => $this->input->post('entitas', true),
            'nm_usaha_nsbh' => $this->input->post('nm_usaha_nsbh', true),
            'jns_usaha_nsbh' => $this->input->post('jns_usaha_nsbh', true),
            'bpjs' => $this->input->post('bpjs', true),
            'no_skdp' => $this->input->post('no_skdp', true),
            'tgl_skdp' => $this->input->post('tgl_skdp', true),
            'no_tdp' => $this->input->post('no_tdp', true),
            'tgl_tdp' => $this->input->post('tgl_tdp', true),
            'no_siup' => $this->input->post('no_siup', true),
            'tgl_siup' => $this->input->post('tgl_siup', true),
            'almt_usaha' => $this->input->post('almt_usaha', true),
            'almt_kantor' => $this->input->post('almt_kantor2', true),
            'lama_usaha' => $this->input->post('lama_usaha', true),
            'lama_jns_usaha' => $this->input->post('lama_jns_usaha', true),
            'sektor_lsmk' => $this->input->post('sektor_lsmk', true),
            'bid_lsmk' => $this->input->post('bid_lsmk', true),
            'akta_pendirian' => $this->input->post('no_akta_pendirian_usaha', true),
            'tgl_akta_pendirian' => $this->input->post('tgl_akta_pendirian_usaha', true),
            'akta_terakhir' => $this->input->post('no_akta_terakhir_usaha', true),
            'tgl_akta_terakhir' => $this->input->post('tgl_akta_terakhir_usaha', true),
            'no_pengesahan' => $this->input->post('no_pengesahan', true),
            'no_penerimaan' => $this->input->post('no_penerimaan', true),
            'nm_notaris' => $this->input->post('nm_notaris', true)
        );

        $dt_log = array(
            'no_app' => $no_app,
            'user_name' => $this->session->userdata('name'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'time_log' => date('Y-m-d H:i:s'),
            'activity' => 'Data nasabah berhasil tersimpan'
        );

        // $nm_pengurus = $this->input->post('nm_pengurus', true);
        // $gender = $this->input->post('gender', true);
        // $tgl_lahir_pengurus = $this->input->post('tgl_lahir_pengurus', true);
        // $jbtn_pengurus = $this->input->post('jbtn_pengurus', true);
        // $sts_pengurus = $this->input->post('sts_pengurus', true);
        // $pend_pengurus = $this->input->post('pend_pengurus', true);
        // $npwp_pengurus = $this->input->post('npwp_pengurus', true);
        // $nom_saham = $this->input->post('nom_saham', true);
        // $saham = $this->input->post('saham', true);
        // $dt_pengurus = array();

        // foreach ($nm_pengurus as $key => $val) {
        //     $dt_pengurus[] = array(
        //         'no_app' => $no_app,
        //         'nm_pengurus' => $nm_pengurus[$key],
        //         'gender' => $gender[$key],
        //         'tgl_lahir_pengurus' => $tgl_lahir_pengurus[$key],
        //         'jbtn_pengurus' => $jbtn_pengurus[$key],
        //         'sts_pengurus' => $sts_pengurus[$key],
        //         'pend_pengurus' => $pend_pengurus[$key],
        //         'npwp_pengurus' => $npwp_pengurus[$key],
        //         'nom_saham' => $nom_saham[$key],
        //         'saham' => $saham[$key]
        //     );
        // }

        // insert into table
        $this->db->insert('tbl_nasabah', $dt_nsbh);
        if ($jns_usaha == 'Perorangan') {
            $this->db->insert('tbl_perorangan', $dt_perorangan);
            if ($sts_nikah == 'Menikah') {
                $this->db->insert('tbl_spouse', $dt_spouse);
            }
        } else {
            $this->db->insert('tbl_badan_usaha', $dt_bdn_usaha);
        }
        $this->db->insert('tbl_info_usaha', $dt_info_usaha);
        $this->db->insert('tbl_log', $dt_log);
        // $this->db->insert_batch('tbl_pengurus', $dt_pengurus);

        echo json_encode(['status' => true]);
        exit;
    }

    public function update_reksus()
    {
        $no_app = $this->input->post('no_app', true);
        $no_ktp = $this->input->post('no_ktp', true);
        $jns_usaha = $this->input->post('jns_usaha', true);
        $sts_nikah = $this->input->post('sts_nikah', true);

        $dt_nsbh = array(
            'no_app' => $no_app,
            'jns_app' => $this->input->post('jns_app', true),
            'referensi' => $this->input->post('referensi', true),
            'nm_cabang' => $this->input->post('nm_cabang', true),
            'tgl_nap' => $this->input->post('tgl_nap', true),
            'nm_nasabah' => $this->input->post('nm_nasabah', true),
            'tgl_visit' => $this->input->post('tgl_visit', true),
            'tgl_funding' => $this->input->post('tgl_funding', true),
            'tgl_lending' => $this->input->post('tgl_lending', true),
            'tmpt_visit' => $this->input->post('tmpt_visit', true),
            'visitor' => $this->input->post('visitor', true),
            'no_cif' => $this->input->post('no_cif', true),
            'nip_bbrm' => $this->input->post('nip_bbrm', true),
            'nip_bm' => $this->input->post('nip_bm', true),
            'jns_usaha' => $jns_usaha,
            'jns_nota' => 'Reksus'
        );

        $dt_perorangan = array(
            'no_app' => $no_app,
            'no_ktp' => $no_ktp,
            'nm_nasabah' => $this->input->post('nm_nsbh', true),
            'nm_ibu' => $this->input->post('nm_ibu', true),
            'npwp_nasabah' => $this->input->post('no_npwp_nsbh', true),
            'tmpt_lahir' => $this->input->post('tmpt_lahir', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'usia' => $this->input->post('usia', true),
            'agama' => $this->input->post('agama', true),
            'tlp_nsbh' => $this->input->post('no_telp', true),
            'hp_nsbh' => $this->input->post('no_hp', true),
            'kd_pos_ktp' => $this->input->post('kd_pos_ktp'),
            'almt_ktp' => $this->input->post('almt_ktp', true),
            'kd_pos_dom' => $this->input->post('kd_pos_dom'),
            'almt_dom' => $this->input->post('almt_dom', true),
            'pend_nsbh' => $this->input->post('pendidikan', true),
            'sts_nikah' => $sts_nikah,
            'no_kk' => $this->input->post('no_kk', true),
            'tgl_kk' => $this->input->post('tgl_kk', true),
            'nsbh_bank' => $this->input->post('nsbh_bank', true)
        );

        $dt_spouse = array(
            'no_ktp' => $no_ktp,
            'no_ktp_spouse' => $this->input->post('no_ktp_spouse', true),
            'nm_spouse' => $this->input->post('nm_spouse', true),
            'pend_spouse' => $this->input->post('pend_spouse', true),
            'tgl_lahir_spouse' => $this->input->post('tgl_lahir_spouse', true),
            'tmpt_lahir_spouse' => $this->input->post('tmpt_lahir_spouse', true)
        );

        $dt_bdn_usaha = array(
            'no_app' => $no_app,
            'nm_pemohon' => $this->input->post('nm_pemohon', true),
            'no_akta_pendiri' => $this->input->post('no_akta_pendirian', true),
            'tgl_akta_pendiri' => $this->input->post('tgl_akta_pendirian', true),
            'no_akta_akhir' => $this->input->post('no_akta_terakhir', true),
            'tgl_akta_akhir' => $this->input->post('tgl_akta_terakhir', true),
            'npwp_nsbh' => $this->input->post('no_npwp', true),
            'contact_person' => $this->input->post('c_person', true),
            'jabatan' => $this->input->post('jabatan', true),
            'almt_akta' => $this->input->post('almt_akta', true),
            'almt_kantor' => $this->input->post('almt_kantor1', true)
        );

        $dt_info_usaha = array(
            'no_app' => $no_app,
            'entitas' => $this->input->post('entitas', true),
            'nm_usaha_nsbh' => $this->input->post('nm_usaha_nsbh', true),
            'jns_usaha_nsbh' => $this->input->post('jns_usaha_nsbh', true),
            'bpjs' => $this->input->post('bpjs', true),
            'no_skdp' => $this->input->post('no_skdp', true),
            'tgl_skdp' => $this->input->post('tgl_skdp', true),
            'no_tdp' => $this->input->post('no_tdp', true),
            'tgl_tdp' => $this->input->post('tgl_tdp', true),
            'no_siup' => $this->input->post('no_siup', true),
            'tgl_siup' => $this->input->post('tgl_siup', true),
            'almt_usaha' => $this->input->post('almt_usaha', true),
            'almt_kantor' => $this->input->post('almt_kantor2', true),
            'lama_usaha' => $this->input->post('lama_usaha', true),
            'lama_jns_usaha' => $this->input->post('lama_jns_usaha', true),
            'sektor_lsmk' => $this->input->post('sektor_lsmk', true),
            'bid_lsmk' => $this->input->post('bid_lsmk', true),
            'akta_pendirian' => $this->input->post('no_akta_pendirian_usaha', true),
            'tgl_akta_pendirian' => $this->input->post('tgl_akta_pendirian_usaha', true),
            'akta_terakhir' => $this->input->post('no_akta_terakhir_usaha', true),
            'tgl_akta_terakhir' => $this->input->post('tgl_akta_terakhir_usaha', true),
            'no_pengesahan' => $this->input->post('no_pengesahan', true),
            'no_penerimaan' => $this->input->post('no_penerimaan', true),
            'nm_notaris' => $this->input->post('nm_notaris', true)
        );

        $this->db->insert('tbl_nasabah', $dt_nsbh);
        if ($jns_usaha == 'Perorangan') {
            $this->db->insert('tbl_perorangan', $dt_perorangan);
            if ($sts_nikah == 'Menikah') {
                $this->db->insert('tbl_spouse', $dt_spouse);
            }
        } else {
            $this->db->insert('tbl_badan_usaha', $dt_bdn_usaha);
        }
        $this->db->insert('tbl_info_usaha', $dt_info_usaha);

        echo json_encode(['status' => true]);
        exit;
    }

    public function delete_reksus($id)
    {
        $table = array('badan_usaha', 'info_usaha', 'nasabah', 'pengurus', 'perorangan');
        foreach ($table as $tbl) {
            $this->db->delete('tbl_' . $tbl, ['no_app' => $id]);
        }
    }

    public function get_all_reksus()
    {
        $this->db->select('*')->from('tbl_nasabah a');
        $this->db->join('tbl_cabang b', 'a.nm_cabang = b.kd_cabang', 'inner');
        $this->db->join('tbl_badan_usaha c', 'a.no_app = c.no_app', 'inner');
        $this->db->join('tbl_info_usaha d', 'a.no_app = d.no_app', 'inner');
        // $this->db->join('tbl_pengurus e', 'a.no_app = e.no_app', 'inner');
        $this->db->where('a.jns_nota', 'Reksus');
        $reksus = $this->db->get()->result_array();
        echo json_encode($reksus);
        exit;
    }

    public function get_reksus($id)
    {
        $this->db->select('*')->from('tbl_nasabah a');
        $this->db->join('tbl_cabang b', 'a.nm_cabang = b.kd_cabang', 'inner');
        $this->db->join('tbl_badan_usaha c', 'a.no_app = c.no_app', 'inner');
        $this->db->join('tbl_info_usaha d', 'a.no_app = d.no_app', 'inner');
        // $this->db->join('tbl_pengurus e', 'a.no_app = e.no_app', 'inner');
        $data = $this->db->get_where('tbl_nasabah', ['a.no_app' => $id, 'a.jns_nota' => 'Reksus'])->row_array();
        echo json_encode($data);
        exit;
    }
    // Reksus
}
