<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Group extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    function index(){
        $page = 'admin/v_group';
        
        $data = array(
            'title' => 'Group Management'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    private function _validate(){
        $data = array();
        $data['inputerror'] = array();
        $data['error'] = array();
        $data['status'] = true;

        if(input('group_code') == ''){
            $data['inputerror'][] = 'group_code';
            $data['error'][] = 'Group code harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[0-9]+$/', input('group_code'))){
            $data['inputerror'][] = 'group_code';
            $data['error'][] = 'Group code tidak valid, harus numberic';
            $data['status'] = false;
        }

        if(input('group_name') == ''){
            $data['inputerror'][] = 'group_name';
            $data['error'][] = 'Group name harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('group_name'))){
            $data['inputerror'][] = 'group_name';
            $data['error'][] = 'Group name tidak valid, harus alphabet';
            $data['status'] = false;
        }

        if(input('title') == ''){
            $data['inputerror'][] = 'title';
            $data['error'][] = 'Title harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('title'))){
            $data['inputerror'][] = 'title';
            $data['error'][] = 'Title tidak valid, harus alphabet';
            $data['status'] = false;
        }

        if($data['status'] === false){
            echo json_encode($data); exit();
        }
    }

    public function list_group(){
        $list = $this->db->get('tbl_group')->result_array();
       
        echo json_encode($list); exit();
    }

    public function edit_group($id){
        $data = $this->db->get_where('tbl_group', ['group_id' => $id])->row_array();

        echo json_encode($data); exit;
    }

    function save_group(){
        $this->_validate();

        $data = array(
            'group_id' => input('group_code'),
            'group_name' => input('group_name'),
            'group_title' => input('title')
        );

        $check = $this->db->get_where('tbl_group', ['group_id' => input('group_code')]);
        if($check->num_rows() > 0){
            echo json_encode(['db_error' => 'Data group sudah tersedia']); exit;
        } else {
            $this->db->insert('tbl_group', $data);
            echo json_encode(['status' => true]); exit;
        }
    }

    public function update_group(){
        $this->_validate();

        $id = input('group_code');
        $data = array(
            'group_name' => input('group_name'),
            'group_title' => input('title')
        );

        $this->db->update('tbl_group', $data, ['group_id' => $id]);
        echo json_encode(['status' => true]); exit();
    }

    public function delete_group($id){
        $this->db->delete('tbl_group', ['group_id' => $id]);
        echo json_encode(['status' => true]); exit();
    }
}