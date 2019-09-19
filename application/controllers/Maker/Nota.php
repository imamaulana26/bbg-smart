<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');

        user_helper();
    }

    public function index()
    {
        $page = 'maker/v_nota';

        $data = array(
            'title' => 'Nota Analisis Pembiayaan - BBG'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    // Reksus

    public function save_nota()
    {
        // $no_app = $this->input->post('no_app', true);
        // $this->session->set_userdata(['no_app' => $no_app]);

        // $no_ktp = $this->input->post('no_ktp', true);
        // $jns_usaha = $this->input->post('jns_usaha', true);
        // $sts_nikah = $this->input->post('sts_nikah', true);

        // $dt_nsbh = array(
        //     'no_app' => $no_app,
        //     'jns_app' => $this->input->post('jns_app', true),
        //     'referensi' => $this->input->post('referensi', true),
        //     'nm_cabang' => $this->input->post('nm_cabang', true),
        //     'tgl_nap' => $this->input->post('tgl_nap', true),
        //     'nm_nasabah' => $this->input->post('nm_nasabah', true),
        //     'tgl_visit' => $this->input->post('tgl_visit', true),
        //     'tgl_funding' => $this->input->post('tgl_funding', true),
        //     'tgl_lending' => $this->input->post('tgl_lending', true),
        //     'tmpt_visit' => $this->input->post('tmpt_visit', true),
        //     'visitor' => $this->input->post('visitor', true),
        //     'no_cif' => $this->input->post('no_cif', true),
        //     'nip_bbrm' => $this->input->post('nip_bbrm', true),
        //     'nip_bm' => $this->input->post('nip_bm', true),
        //     'jns_usaha' => $jns_usaha,
        //     'jns_nota' => 'Reksus'
        // );

        // $dt_perorangan = array(
        //     'no_app' => $no_app,
        //     'no_ktp' => $no_ktp,
        //     'nm_nasabah' => $this->input->post('nm_nsbh', true),
        //     'nm_ibu' => $this->input->post('nm_ibu', true),
        //     'npwp_nasabah' => $this->input->post('no_npwp_nsbh', true),
        //     'tmpt_lahir' => $this->input->post('tmpt_lahir', true),
        //     'tgl_lahir' => $this->input->post('tgl_lahir', true),
        //     'usia' => $this->input->post('usia', true),
        //     'agama' => $this->input->post('agama', true),
        //     'tlp_nsbh' => $this->input->post('no_telp', true),
        //     'hp_nsbh' => $this->input->post('no_hp', true),
        //     'kd_pos_ktp' => $this->input->post('kd_pos_ktp'),
        //     'almt_ktp' => $this->input->post('almt_ktp', true),
        //     'kd_pos_dom' => $this->input->post('kd_pos_dom'),
        //     'almt_dom' => $this->input->post('almt_dom', true),
        //     'pend_nsbh' => $this->input->post('pendidikan', true),
        //     'sts_nikah' => $sts_nikah,
        //     'no_kk' => $this->input->post('no_kk', true),
        //     'tgl_kk' => $this->input->post('tgl_kk', true),
        //     'nsbh_bank' => $this->input->post('nsbh_bank', true)
        // );

        // $dt_spouse = array(
        //     'no_ktp' => $no_ktp,
        //     'no_ktp_spouse' => $this->input->post('no_ktp_spouse', true),
        //     'nm_spouse' => $this->input->post('nm_spouse', true),
        //     'pend_spouse' => $this->input->post('pend_spouse', true),
        //     'tgl_lahir_spouse' => $this->input->post('tgl_lahir_spouse', true),
        //     'tmpt_lahir_spouse' => $this->input->post('tmpt_lahir_spouse', true)
        // );

        // $dt_bdn_usaha = array(
        //     'no_app' => $no_app,
        //     'nm_pemohon' => $this->input->post('nm_pemohon', true),
        //     'no_akta_pendiri' => $this->input->post('no_akta_pendirian', true),
        //     'tgl_akta_pendiri' => $this->input->post('tgl_akta_pendirian', true),
        //     'no_akta_akhir' => $this->input->post('no_akta_terakhir', true),
        //     'tgl_akta_akhir' => $this->input->post('tgl_akta_terakhir', true),
        //     'npwp_nsbh' => $this->input->post('no_npwp', true),
        //     'contact_person' => $this->input->post('c_person', true),
        //     'jabatan' => $this->input->post('jabatan', true),
        //     'almt_akta' => $this->input->post('almt_akta', true),
        //     'almt_kantor' => $this->input->post('almt_kantor1', true)
        // );

        // $dt_info_usaha = array(
        //     'no_app' => $no_app,
        //     'entitas' => $this->input->post('entitas', true),
        //     'nm_usaha_nsbh' => $this->input->post('nm_usaha_nsbh', true),
        //     'jns_usaha_nsbh' => $this->input->post('jns_usaha_nsbh', true),
        //     'bpjs' => $this->input->post('bpjs', true),
        //     'no_skdp' => $this->input->post('no_skdp', true),
        //     'tgl_skdp' => $this->input->post('tgl_skdp', true),
        //     'no_tdp' => $this->input->post('no_tdp', true),
        //     'tgl_tdp' => $this->input->post('tgl_tdp', true),
        //     'no_siup' => $this->input->post('no_siup', true),
        //     'tgl_siup' => $this->input->post('tgl_siup', true),
        //     'almt_usaha' => $this->input->post('almt_usaha', true),
        //     'almt_kantor' => $this->input->post('almt_kantor2', true),
        //     'lama_usaha' => $this->input->post('lama_usaha', true),
        //     'lama_jns_usaha' => $this->input->post('lama_jns_usaha', true),
        //     'sektor_lsmk' => $this->input->post('sektor_lsmk', true),
        //     'bid_lsmk' => $this->input->post('bid_lsmk', true),
        //     'akta_pendirian' => $this->input->post('no_akta_pendirian_usaha', true),
        //     'tgl_akta_pendirian' => $this->input->post('tgl_akta_pendirian_usaha', true),
        //     'akta_terakhir' => $this->input->post('no_akta_terakhir_usaha', true),
        //     'tgl_akta_terakhir' => $this->input->post('tgl_akta_terakhir_usaha', true),
        //     'no_pengesahan' => $this->input->post('no_pengesahan', true),
        //     'no_penerimaan' => $this->input->post('no_penerimaan', true),
        //     'nm_notaris' => $this->input->post('nm_notaris', true)
        // );

        // $dt_log = array(
        //     'no_app' => $no_app,
        //     'user_name' => $this->session->userdata('name'),
        //     'ip_address' => $_SERVER['REMOTE_ADDR'],
        //     'time_log' => date('Y-m-d H:i:s'),
        //     'activity' => 'Data nasabah berhasil tersimpan'
        // );

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
        // $this->db->insert('tbl_nasabah', $dt_nsbh);
        // if ($jns_usaha == 'Perorangan') {
        //     $this->db->insert('tbl_perorangan', $dt_perorangan);
        //     if ($sts_nikah == 'Menikah') {
        //         $this->db->insert('tbl_spouse', $dt_spouse);
        //     }
        // } else {
        //     $this->db->insert('tbl_badan_usaha', $dt_bdn_usaha);
        // }
        // $this->db->insert('tbl_info_usaha', $dt_info_usaha);
        // $this->db->insert('tbl_log', $dt_log);
        // $this->db->insert_batch('tbl_pengurus', $dt_pengurus);

        // echo json_encode(['status' => true]); exit;
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
