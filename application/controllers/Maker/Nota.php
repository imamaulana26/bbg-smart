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
}
