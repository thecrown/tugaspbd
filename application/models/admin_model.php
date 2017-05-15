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
    public function view_all_anggota(){
       
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_jabatan','tbl_anggota.kd_jabatan=tbl_jabatan.id','innner join');
        $this->db->join('tbl_bidang','tbl_anggota.id_dept=tbl_bidang.id','innner join');
        
        $query =  $this->db->get();
        
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
    }
    public function view_all_anggota_bidang($id){
        $where = array(
            'id_dept'=>$id
        );
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_jabatan','tbl_anggota.kd_jabatan=tbl_jabatan.id','innner join');
        $this->db->join('tbl_bidang','tbl_anggota.id_dept=tbl_bidang.id','innner join');
        $this->db->where($where);
        $query =  $this->db->get();
        
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
    }
    public function add_anggota(){
            $nama_anggota = $this->input->post('nama_anggota');
            $alamat_anggota = $this->input->post('alamat_anggota');
            $jabatan = $this->input->post('jabatan');
            $divisi = $this->input->post('divisi');
            $tanggal = $this->input->post('tanggal');
            $status = $this->input->post('status');
        
        $data = array(
            'nama'=> $nama_anggota,
            'alamat'=> $alamat_anggota,
            'kd_jabatan'=> $jabatan,
            'status'=> $status,
            'tahun_masuk'=> $tanggal,
            'id_dept'=> $divisi
        );

        $query = $this->db->insert('tbl_anggota',$data);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }
    public function get_jabatan(){
        $query = $this->db->get('tbl_jabatan');
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_divisi(){
         $query = $this->db->get('tbl_bidang');
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false; 
        }
    }
    public function delete_anggota_all($id){
        $where = array(
            'id_anggota'=>$id
        );
        $query = $this->db->delete('tbl_anggota',$where);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function get_anggota_update($id){
        $where = array(
            'id_anggota'=>$id
        );
        $query = $this->db->get_where('tbl_anggota',$where);
        if($query->num_rows()>=0){
            return $query->row();
        }else{
            return false;
        }
    }
}