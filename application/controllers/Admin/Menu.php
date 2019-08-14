<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Menu extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    private function _validate(){
        $data = array();
        $data['inputerror'] = array();
        $data['error'] = array();
        $data['status'] = true;

        if(input('menu') == ''){
            $data['inputerror'][] = 'menu';
            $data['error'][] = 'Nama menu harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('menu'))) {
            $data['inputerror'][] = 'menu';
            $data['error'][] = 'Nama menu tidak valid, harus alphabet';
            $data['status'] = false;
        }

        if($data['status'] === false){
            echo json_encode($data); exit();
        }
    }

    public function index(){
        $page = 'admin/v_menu';
        
        $data = array(
            'title' => 'Menu Management'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    public function list_menu(){
        $list = $this->db->get_where('tbl_menu', ['IsDelete' => 0])->result_array();
       
        echo json_encode($list); exit();
    }

    public function edit_menu($id){
        $data = $this->db->get_where('tbl_menu', ['id' => $id])->row_array();
        echo json_encode($data); exit();
    }

    public function save_menu(){
        $this->_validate();

        $data = array(
            'menu' => ucfirst(input('menu')),
            'icon' => input('icon')
        );

        $check = $this->db->get_where('tbl_menu', ['menu' => input('menu')]);
        if($check->num_rows() > 0){
            echo json_encode(['msg' => 'Nama menu telah ada']); exit();
        } else {
            $this->db->insert('tbl_menu', $data);
            echo json_encode(['status' => true]);
            exit();
        }
    }

    public function update_menu(){
        $this->_validate();

        $id = input('id');
        $data = array(
            'menu' => ucfirst(input('menu')),
            'icon' => input('icon'),
            'UpdateBy' => $this->session->userdata('nip'),
            'UpdateDate' => date('Y-m-d H:i:s')
        );

        $this->db->update('tbl_menu', $data, ['id' => $id]);
        echo json_encode(['status' => true]); exit();
    }

    public function delete_menu($id){
        // $this->db->delete('tbl_menu', ['id' => $id]);

        $data = array(
            'IsDelete' => 1,
            'UpdateBy' => $this->session->userdata('nip'),
            'UpdateDate' => date('Y-m-d H:i:s')
        );

        $this->db->update('tbl_menu', $data, ['id' => $id]);
        echo json_encode(['status' => true]); exit();
    }
}