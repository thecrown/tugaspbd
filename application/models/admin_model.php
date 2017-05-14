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
    public function add_departmen(){
        $nama_bidang = $this->input->post('name_dept');
        $deskripsi_bidang = $this->input->post('deskripsi');
        
        $data = array(
            'nama_bidang'=> $nama_bidang,
            'deskripsi_bidang'=> $deskripsi_bidang
        );

        $query = $this->db->insert('tbl_bidang',$data);
        if($query==true){
            return true;
        }else{
            return false;
        }
        
    }
    public function delete_dept($id){
        $where = array(
            'id'=>$id
        );
        $query = $this->db->delete('tbl_bidang',$where);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function get_update_bidang($id){
        $where = array(
            'id'=>$id
        );
        $query = $this->db->get_where('tbl_bidang',$where);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function do_update_bidang($id){
        $where = array(
            'id'=>$id
        );
            $nama_bidang = $this->input->post('name_dept');
            $deskripsi_bidang = $this->input->post('deskripsi');
            
        $data = array(
            'nama_bidang'=>$nama_bidang,
            'deskripsi_bidang'=>$deskripsi_bidang
        );

        $query = $this->db->update('tbl_bidang',$data,$where);
            if($query){
                return true;
            }else{
                return false;
            }
    }
}
