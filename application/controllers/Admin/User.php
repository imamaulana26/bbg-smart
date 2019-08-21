<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_user');
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        
        user_helper();
    }

    private function _validate(){
        $data = array();
        $data['inputerror'] = array();
        $data['error'] = array();
        $data['status'] = true;

        if(input('nip') == ''){
            $data['inputerror'][] = 'nip';
            $data['error'][] = 'NIP user harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[0-9]+$/', input('nip'))){
            $data['inputerror'][] = 'nip';
            $data['error'][] = 'NIP user tidak valid, harus numberic';
            $data['status'] = false;
        } else if(strlen(input('nip')) < 8) {
            $data['inputerror'][] = 'nip';
            $data['error'][] = 'NIP user tidak boleh kurang dari 8 digit';
            $data['status'] = false;
        }

        if(input('nama') == ''){
            $data['inputerror'][] = 'nama';
            $data['error'][] = 'Nama lengkap harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('nama'))){
            $data['inputerror'][] = 'nama';
            $data['error'][] = 'Nama lengkap tidak valid, harus alphabet';
            $data['status'] = false;
        }

        if(input('email') == ''){
            $data['inputerror'][] = 'email';
            $data['error'][] = 'Username harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z0-9]+$/', input('email'))){
            $data['inputerror'][] = 'email';
            $data['error'][] = 'Username tidak valid';
            $data['status'] = false;
        }

        if(input('role_id') == ''){
            $data['inputerror'][] = 'role_id';
            $data['status'] = false;
        }
        if(input('cabang') == ''){
            $data['inputerror'][] = 'cabang';
            $data['status'] = false;
        }
        if(input('jabatan') == ''){
            $data['inputerror'][] = 'jabatan';
            $data['status'] = false;
        }
        if(input('group_id') == ''){
            $data['inputerror'][] = 'group_id';
            $data['status'] = false;
        }

        if($data['status'] === false){
            echo json_encode($data); exit();
        }
    }

    function index(){
        $page = 'admin/v_user';
        
        $data = array(
            'title' => 'User Management',
            'user' => $this->db->get('tbl_user')->result_array(),
            'cabang' => $this->db->get('tbl_cabang')->result_array(),
            'role' => $this->db->get_where('tbl_user_role', ['id !=' => 1])->result_array(),
            'group' => $this->db->get_where('tbl_group')->result_array()
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    public function list_cabang(){
        $list = $this->db->get('tbl_cabang')->result_array();
        echo json_encode($list); exit;
    }

    public function list_user(){
        $list = $this->m_user->get_datatables();
        $data = array();
        $no = 1;
        foreach($list as $li){
            $row = array();
            $row[] = $no++;
            $row[] = $li['nip_user'];
            $row[] = "<p>".$li['nama']." <span style='color: #337ab7'><br>".str_replace("syariahmandiri", "bsm", $li['email'])."</span></p>";
            $row[] = $li['role'];
            $row[] = $li['group_name']." (".$li['group_title'].")";
            $row[] = $li['jabatan'];
            $row[] = $li['nm_cabang'];
            $row[] = $li['date_created'];
            $row[] = $li['log_on'];
            $row[] = $li['last_login'];
            $aksi = '<center><a href="javascript:void(0)" onclick="edit_user('."'".$li['id_user']."'".')"><i class="fa fa-fw fa-edit"></i></a> ';
            $aksi .= '<a href="javascript:void(0)" onclick="delete_user('."'".$li['id_user']."'".')"><i class="fa fa-fw fa-trash"></i></a></center>';
            $row[] = $aksi;
            
            $data[] = $row;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $this->m_user->get_all_data(),
            'recordsFiltered' => $this->m_user->count_filtered(),
            'data' => $data
        );
        echo json_encode($output); exit;
    }

    public function edit_user($id){
        $check = $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();

        if($check['role_id'] > 3){
            $this->db->select('a.*, b.id_cabang')->from('tbl_user a');
            $this->db->join('tbl_jaringan b', 'a.nip_user = b.id_user', 'inner');
            $this->db->where('a.id_user', $id);
            $data = $this->db->get()->row_array();
        } else {
            $data = $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();
        }

        echo json_encode($data); exit;
    }

    public function save_user(){
        $this->_validate();

        $nip = input('nip');
        $jaringan = $this->input->post('jaringan', true);
        if(is_array($this->input->post('jaringan', true))){
            $jaringan = implode('::', $this->input->post('jaringan', true));
        }

        $data = array(
            'nip_user' => $nip,
            'nama' => input('nama'),
            'email' => input('email').'@syariahmandiri.co.id',
            'cabang' => input('cabang'),
            'jabatan' => input('jabatan'),
            'group_id' => input('group_id'),
            'image' => 'default.jpg',
            'password' => md5('bsm'),
            'role_id' => input('role_id'),
            'is_active' => false,
            'date_created' => date('Y-m-d H:i:s')
        );

        $dt = array(
            'id_user' => $nip,
            'id_cabang' => $jaringan
        );

        $check = $this->db->get_where('tbl_user', ['nip_user' => $nip]);
        if($check->num_rows() > 0){
            echo json_encode(['db_error' => 'Data user telah tersedia']); exit;
        } else {
            $this->db->insert('tbl_user', $data);
            if($data['role_id'] > 3){
                $this->db->insert('tbl_jaringan', $dt);
            }
        }
        echo json_encode(['status' => true]); exit;
        
    }

    public function update_user(){
        $this->_validate();

        $id = input('id');
        $role = input('role_id');
        $jaringan = $this->input->post('jaringan', true);
        if(is_array($this->input->post('jaringan', true))){
            $jaringan = implode('::', $this->input->post('jaringan', true));
        }

        $data = array(
            'nip_user' => input('nip'),
            'nama' => input('nama'),
            'email' => input('email').'@syariahmandiri.co.id',
            'role_id' => $role,
            'cabang' => input('cabang'),
            'jabatan' => input('jabatan'),
            'group_id' => input('group_id'),
            'UpdateBy' => $this->session->userdata('nip'),
            'UpdateDate' => date('Y-m-d H:i:s')
        );

        $dt = array(
            'id_cabang' => $jaringan
        );

        $check = $this->db->get_where('tbl_jaringan', ['id_user' => input('nip')]);

        if($role > 3){
            $this->db->update('tbl_user', $data, ['id_user' => $id]);
            if($check->num_rows() > 0){
                $this->db->update('tbl_jaringan', $dt, ['id_user' => input('nip')]);
            } else {
                $this->db->insert('tbl_jaringan', ['id_user' => input('nip'), 'id_cabang' => $jaringan]);
            }
        } else {
            $this->db->update('tbl_user', $data, ['id_user' => $id]);
            $this->db->delete('tbl_jaringan', ['id_user' => input('nip')]);
        }
        echo json_encode(['status' => true]); exit;
    }

    public function delete_user($id){
        // $this->db->delete('tbl_user', ['nip_user' => $id]);
        // $this->db->delete('tbl_jaringan', ['id_user' => $id]);

        $data = array(
            'IsDelete' => 1,
            'UpdateBy' => $this->session->userdata('nip'),
            'UpdateDate' => date('Y-m-d H:i:s')
        );

        $this->db->update('tbl_user', $data, ['id_user' => $id]);

        echo json_encode(['status' => true]); exit;
    }
}