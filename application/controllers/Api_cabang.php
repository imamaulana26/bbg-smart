<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Api_cabang extends CI_Controller {
    public function get_cabang(){
        $list = $this->db->get('tbl_cabang')->result_array();
        echo json_encode($list); exit;
    }
}