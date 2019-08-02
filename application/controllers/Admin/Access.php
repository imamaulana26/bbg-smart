<?php
defined('BASEPATH')OR exit('No direct script access allowed'); 

class Access extends CI_Controller {
    private $role;

    public function __construct(){
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_akses');
        
        user_helper();
        $this->role = $this->session->userdata('role_id');
    }

    private function _validate_role(){
        $data = array();
        $data['inputerror'] = array();
        $data['error'] = array();
        $data['status'] = true;

        if(input('role') == ''){
            $data['inputerror'][] = 'role';
            $data['error'][] = 'Role user harus diisi';
            $data['status'] = false;
        } else if(!preg_match('/^[a-z A-Z]+$/', input('role'))){
            $data['inputerror'][] = 'role';
            $data['error'][] = 'Role user tidak valid';
            $data['status'] = false;
        }

        if($data['status'] === false){
            echo json_encode($data); exit();
        }
    }

    public function index(){
        $page = 'admin/v_akses';
        if($this->role == 1){
            $role_list = $this->db->get_where('tbl_user_role', ['id !=' => 1])->result_array();
        } else {
            $role_list = $this->db->get_where('tbl_user_role', ['id >' => 2])->result_array();
        }
        
        $data = array(
            'title' => 'Akses Menu Management',
            'menu' => $this->db->get('tbl_menu')->result_array(),
            'role' => $role_list
        );

        ob_start('ob_gzhandler');
        $this->load->view('templates/_navbar', $data);
        $this->load->view($page, $data);
    }

    // Menu Akses
    public function list_akses(){
        $list = $this->m_akses->get_datatables();
        $data = array();
        $no = 1;
        foreach($list as $li){
            $row = array();
            $row[] = $no++;
            $row[] = $li['role'];
            $row[] = $li['menu'];
            $row[] = $li['url'];
            $li['active'] == 1 ? $aktif = '<span class="label label-success">Enable</span>' : $aktif = '<span class="label label-danger">Disbale</span>';
            $row[] = '<center>'.$aktif.'</center>';
            $aksi = '<center><a href="javascript:void(0)" onclick="edit_akses('."'".$li['id']."'".')"><i class="fa fa-fw fa-edit"></i></a> ';
            $aksi .= '<a href="javascript:void(0)" onclick="delete_akses('."'".$li['id']."'".')"><i class="fa fa-fw fa-trash"></i></a></center>';
            $row[] = $aksi;

            $data[] = $row;
        }

        $output = array(
            'draw' => intval($_POST['draw']),
            'recordsTotal' => $this->m_akses->get_all_data(),
            'recordsFiltered' => $this->m_akses->count_filtered(),
            'data' => $data
        );
        echo json_encode($output); exit;
    }

    public function edit_akses($id){
        $this->db->select('a.*, b.role, c.menu')->from('tbl_user_menu a');
        $this->db->join('tbl_user_role b', 'a.role_id = b.id', 'inner');
        $this->db->join('tbl_menu c', 'a.menu_id = c.id', 'inner');
        $this->db->where('a.id', $id);
        $data = $this->db->get()->row_array();

        echo json_encode($data); exit;
    }

    public function save_akses(){
        $id_role = input('user');
        $id_menu = input('menu');
        $nama_nemu = '';

        $user = $this->db->get_where('tbl_user_role', ['id' => $id_role])->row_array();
        $menu = $this->db->get_where('tbl_menu', ['id' => $id_menu])->row_array();

        $exp = explode(" ", $menu['menu']);
        if(count($exp) > 0){
            if($exp[0] == 'Dashboard'){
                $nama_nemu .= 'index';
            } else {
                $nama_nemu .= strtolower($exp[0]);
            }
        }

        $user['role'] == 'Help Desk' ? $role = 'Admin' : $role = $user['role'];

        $data = array(
            'role_id' => $user['id'],
            'menu_id' => $menu['id'],
            'url' => ucfirst($role).'/'.$nama_nemu,
            'active' => input('aktif')
        );

        $check_akses = $this->db->get_where('tbl_user_menu', [
            'role_id' => $id_role,
            'menu_id' => $id_menu
        ]);

        if($check_akses->num_rows() > 0){
            echo json_encode(['msg' => 'Akses menu telah ada']); exit;
        } else {
            $this->db->insert('tbl_user_menu', $data);
            echo json_encode(['status' => true]);
            exit;
        }
    }

    public function update_akses(){
        $id = input('id');
        $id_role = input('user');
        $id_menu = input('menu');
        $nama_nemu = '';

        $user = $this->db->get_where('tbl_user_role', ['id' => $id_role])->row_array();
        $menu = $this->db->get_where('tbl_menu', ['id' => $id_menu])->row_array();

        $exp = explode(" ", $menu['menu']);
        if(count($exp) > 0){
            if($exp[0] == 'Dashboard'){
                $nama_nemu .= 'index';
            } else {
                $nama_nemu .= strtolower($exp[0]);
            }
        }

        $user['role'] == 'Help Desk' ? $role = 'Admin' : $role = $user['role'];
        
        $data = array(
            'role_id' => input('user'),
            'menu_id' => input('menu'),
            'url' => ucfirst($role).'/'.$nama_nemu,
            'active' => input('aktif')
        );

        $this->db->update('tbl_user_menu', $data, ['id' => $id]);
        echo json_encode(['status' => true]); exit;
    }

    public function delete_akses($id){
        $this->db->delete('tbl_user_menu', ['id' => $id]);
        echo json_encode(['status' => true]); exit;
    }
    // Menu Akses


    // Role User
    public function list_role(){
        $list = $this->db->get_where('tbl_user_role', ['id !=' => 1])->result_array();

        echo json_encode($list); exit;
    }

    public function edit_role($id){
        $data = $this->db->get_where('tbl_user_role', ['id' => $id])->row_array();

        echo json_encode($data); exit;
    }

    public function save_role(){
        $this->_validate_role();

        $role = input('role');
        $check = $this->db->get_where('tbl_user_role', ['role' => $role]);

        if($check->num_rows() > 0){
            echo json_encode(['msg' => 'Role user telah tersedia']); exit;
        } else {
            $this->db->insert('tbl_user_role', ['role' => $role]);
            echo json_encode(['status' => true]);
            exit;
        }
    }

    public function update_role(){
        $this->_validate_role();
        $id = input('id');
        
        $this->db->update('tbl_user_role', ['role' => input('role')], ['id' => $id]);
        
        echo json_encode(['status' => true]); exit;
    }

    public function delete_role($id){
        $this->db->delete('tbl_user_role', ['id' => $id]);
        echo json_encode(['status' => true]); exit;
    }
    // Role User
}