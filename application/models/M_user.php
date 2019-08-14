<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class M_user extends CI_Model {
    var $table = 'tbl_user'; // table yang ingin ditampilkan
    var $order = array('role_id' => 'asc');
    var $id = 'nip_user';
    var $column_order = array(null, 'nip_user', 'nama', null, 'group_name', null, null, 'date_created', 'log_on', 'last_login', null);
    var $column_search = array('role_id','nip_user','nama','kd_cabang','group_name','group_title');

    function _get_datatable_query(){
        $this->db->select('*');
        // $this->db->select('b.role, a.*, c.nm_cabang', 'd.group_name', 'd.group_title');
        $this->db->from($this->table.' a');
        $this->db->join('tbl_user_role b', 'a.role_id = b.id', 'inner');
        $this->db->join('tbl_cabang c', 'a.cabang = c.kd_cabang', 'inner');
        $this->db->join('tbl_group d', 'a.group_id = d.group_id', 'inner');
        $this->db->where(['b.id !=' => 1, 'a.IsDelete' => 0]);

        $i = 0;
        foreach($this->column_search as $item){
            if($_POST['search']['value']){
                if($i === 0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) -1 == $i) $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatable_query();
        if($_POST['length'] != -1){
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    function count_filtered(){
        $this->_get_datatable_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data(){
        $this->db->get($this->table);
        return $this->db->count_all_results();
    }
}