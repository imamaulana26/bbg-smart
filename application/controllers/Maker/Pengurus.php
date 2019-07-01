<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
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
        $page = 'maker/v_data_pengurus';

        $data = array(
            'title' => 'Nota Analisis Pembiayaan - Reksus'
        );

        if($this->session->userdata('no_app')){
            ob_start('ob_gzhandler');
            $this->load->view('templates/_navbar', $data);
            $this->load->view($page, $data);
        } else {
            redirect('Not_found');
        }
    }

    public function validasi(){
        
    }

    public function save(){
        $this->db->insert_batch('tbl_pengurus', $_SESSION['post']);
        unset($_SESSION['post']);

        echo json_encode(['status' => true]); exit;
    }
}
