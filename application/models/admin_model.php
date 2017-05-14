<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{ 
    
    public function all_bidang_view(){
        $query = $this->db->get('tbl_bidang');
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
}
