<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Blocked extends CI_Controller {
    public function index(){
        $role_id = $this->session->userdata('role_id');
        $this->db->select('*')->from('tbl_user_role a')->join('tbl_user b', 'a.id = b.role_id', 'left');
        $this->db->where('a.id', $role_id);
        $access = $this->db->get();

        $data = array(
            'menu' => $access->row_array()
        );

        $this->load->view('templates/_header');
        $this->load->view('templates/v_block', $data);
        $this->load->view('templates/_footer');
    }
}