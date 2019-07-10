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

    function save_dept(){
        $exp = explode(' ', input('dept_name'));
        $nick = '';
        foreach($exp as $kata){
            $nick .= ucfirst(substr($kata, 0, 1));
        }

        $data = array(
            'dept_code' => input('dept_code'),
            'dept_name' => input('dept_name'),
            'dept_sort' => $nick,
            'div_code' => input('divisi')
        );

        $this->db->insert('tbl_department', $data);
        echo json_encode(['status' => true]); exit;
    }

    function save_div(){
        $exp = explode(' ', input('dept_name'));
        $nick = '';
        foreach($exp as $kata){
            $nick .= ucfirst(substr($kata, 0, 1));
        }

        $data = array(
            'dept_code' => input('dept_code'),
            'dept_name' => input('dept_name'),
            'dept_sort' => $nick,
            'div_code' => input('divisi')
        );

        $this->db->insert('tbl_department', $data);
        echo json_encode(['status' => true]); exit;
    }
}