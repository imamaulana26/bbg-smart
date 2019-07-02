<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Approver extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    public function index(){
        $data['title'] = 'Menu Approver';
        $page = 'admin/v_approver';

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page);
        $this->load->view('templates/_footer');
    }
}