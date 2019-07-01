<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Office extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_cabang');
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    private function _validate(){
        $data = array();
        $data['inputerror'] = array();
        $data['error'] = array();
        $data['status'] = true;

        if(input('kd_cabang') == ''){
            $data['inputerror'][] = 'kd_cabang';
            $data['error'][] = 'Kode cabang harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/\d+[a-z]?$/', input('kd_cabang'))){
            $data['inputerror'][] = 'kd_cabang';
            $data['error'][] = 'Kode cabang tidak valid';
            $data['status'] = false;
        } else {
            $data['status'] = true;
        }

        if(input('nm_cabang') == ''){
            $data['inputerror'][] = 'nm_cabang';
            $data['error'][] = 'Nama cabang harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('nm_cabang'))){
            $data['inputerror'][] = 'nm_cabang';
            $data['error'][] = 'Nama cabang tidak valid, harus alphabet';
            $data['status'] = false;
        } else {
            $data['status'] = true;
        }

        if($data['status'] === false){
            echo json_encode($data); exit();
        }
    }

    public function index(){
        $page = 'admin/v_office';
        
        $data = array(
            'title' => 'Office Management'
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    public function list_office(){
        $list = $this->m_cabang->get_datatables();
        $data = array();
        $no = 1;
        foreach($list as $li){
            $row = array();
            $row[] = $no++;
            $row[] = $li['kd_cabang'];
            $row[] = $li['nm_cabang'];
            $aksi = '<center><a href="javascript:void(0)" onclick="edit_office('."'".$li['id']."'".')"><i class="fa fa-fw fa-edit"></i></a> ';
            $aksi .= '<a href="javascript:void(0)" onclick="delete_office('."'".$li['id']."'".')"><i class="fa fa-fw fa-trash"></i></a></center>';
            $row[] = $aksi;
            
            $data[] = $row;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $this->m_cabang->get_all_data(),
            'recordsFiltered' => $this->m_cabang->count_filtered(),
            'data' => $data
        );
        echo json_encode($output); exit();
    }

    public function edit_office($id){
        $data = $this->db->get_where('tbl_cabang', ['id' => $id])->row_array();
        echo json_encode($data); exit();
    }

    public function save_office(){
        $this->_validate();

        $data = array(
            'kd_cabang' => 'ID'.input('kd_cabang'),
            'nm_cabang' => input('nm_cabang')
        );
        
        $this->db->insert('tbl_cabang', $data);
        echo json_encode(['status' => true]);
        exit();
    }

    public function update_office(){
        $this->_validate();

        $id = $this->input->post('id');
        $data = array(
            'kd_cabang' => 'ID'.input('kd_cabang'),
            'nm_cabang' => input('nm_cabang')
        );

        $data = $this->db->update('tbl_cabang', $data, ['id' => $id]);
        echo json_encode(['status' => true]); exit();
    }

    public function delete_office($id){
        $this->db->delete('tbl_cabang', ['id' => $id]);
        echo json_encode(['status' => true]); exit();
    }
}