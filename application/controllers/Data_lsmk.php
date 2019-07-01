<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Data_lsmk extends CI_Controller {
    public function get_lsmk(){
        $li_lmsk = $this->db->get('tbl_lsmk')->result_array();
        echo json_encode($li_lmsk); exit;
    }
}