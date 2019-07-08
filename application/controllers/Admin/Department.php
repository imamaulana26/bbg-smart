<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Department extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    function index(){
        $page = 'admin/v_department';
        
        $data = array(
            'title' => 'Department Management'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }
}