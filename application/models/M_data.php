<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_data extends CI_Model{
    public function insert($db='', $data){
        $query = "INSERT INTO ".$db." SET ";
        foreach($data as $key=>$val){
            $query .= $key."='".$val."',";
        }
        $query = substr($query, 0, -1);
        return $this->db->query($query);
    }

    public function update($db='', $data, $where){
        $query = "UPDATE ".$db." SET ";
        foreach($data as $key=>$val){
            $query .= $key."='".$val."',";
        }
        $query = substr($query, 0, -1);

        if(is_array($where)){
            $query .= " WHERE ";
            foreach($where as $key=>$val){
                $query .= $key."='".$val."' AND ";
            }
            $query = substr($query, 0, -3);
        }
        return $this->db->query($query);
    }

    public function delete($db='', $where){
        $query = "DELETE FROM ".$db;
        if(is_array($where)){
            $query .= "WHERE ";
            foreach($where as $key=>$val){
                $query .= $key."='".$val."' AND";
            }
            $query = substr($query, 0, -3);
        }
        return $this->db->query($query);
    }

    public function selectAll($db=''){
        $query = $this->db->get($db);
        return $query;
    }

    public function selectWhere($db='', $where=array(), $orderBy='', $order='ASC'){
        $query = "SELECT * FROM ".$db;
        if(is_array($where)){
            $query .= " WHERE ";
            foreach($where as $key=>$val){
                $query .= $key."='".$val."' AND";
            }
            $query = substr($query, 0, -3);
        }

        if($orderBy != '') $query .= " ORDER BY ".$orderBy." ".$order;
        return $this->db->query($query);
    }

    public function selectLike($db='', $where='', $orderBy='', $order='ASC'){
        $query = "SELECT * FROM ".$db;
        if(is_array($where)){
            $query .= " WHERE ";
            foreach($where as $key=>$val){
                $query .= $key." LIKE '%".$val."%' OR";
            }
            $query = substr($query, 0, -2);
        }

        if($orderBy != '') $query .= " ORDER BY ".$orderBy." ".$order;
        return $this->db->query($query);
    }

    public function selectJoin($db='', $table, $join='JOIN', $param, $where='', $orderBy='', $order='ASC'){
        $query = "SELECT * FROM ".$db;
        if(is_array($table)){
            foreach($table as $tbl){
                $query .= " ".$join." ".$tbl;
            }
        } else $query .= " ".$join." ".$table;

        foreach($param as $key=>$val){
            $query .= " ON ".$key." = ".$val;
        }

        if(is_array($where)){
            $query .= " WHERE ";
            foreach($where as $key=>$val){
                $query .= $key."='".$val."' AND";
            }
            $query = substr($query, 0, -3);
        }

        if($orderBy != '') $query .= " ORDER BY ".$orderBy." ".$order;
        return $this->db->query($query);
    }
}