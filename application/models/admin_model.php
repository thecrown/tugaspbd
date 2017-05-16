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
    public function do_update_anggota($id){
        $nama_anggota = $this->input->post('nama_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $jabatan = $this->input->post('jabatan');
        $divisi = $this->input->post('divisi');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');
        $where=array(
            'id_anggota'=>$id
        );
        $data = array(
            'nama'=> $nama_anggota,
            'alamat'=> $alamat_anggota,
            'kd_jabatan'=> $jabatan,
            'status'=> $status,
            'tahun_masuk'=> $tanggal,
            'id_dept'=> $divisi
        );

        $query = $this->db->update('tbl_anggota',$data,$where);
        if($query==true){
            return true;
        }else{
            return false;
        }
        
    }
    public function view_all_user(){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->join('tbl_anggota','tbl_anggota.id_anggota=tbl_users.id_pengurus','innner join');
        $this->db->join('tbl_bidang','tbl_anggota.id_dept=tbl_bidang.id','innner join');
        
        $query = $this->db->get();
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false; 
        }
    }
    public function get_all_anggota(){
        $query = $this->db->get('tbl_anggota');
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function do_add_users(){
        $id_pengurus = $this->input->post('id_pengurus');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $Email = $this->input->post('Email');
        $Role = $this->input->post('Role');
        $status = $this->input->post('Status');
        $nama = $this->input->post('nama');

        $data = array(
            'username'=> $username,
            'password'=> $password,
            'role'=> $Role,
            'email'=> $Email,
            'id_pengurus'=> $id_pengurus,
            'status'=> $status,
            'nama_user'=>$nama
        );

        $query = $this->db->insert('tbl_users',$data);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }
    public function delete_users($id){
        $where = array(
            'id_users'=>$id
        );
        $query = $this->db->delete('tbl_users',$where); 
        if($query==true){
            return true;
        }else{
            return false;
        }
    }
    public function get_users_update($id){
        $where= array(
            'id_users'=>$id
        );
        $this->db->select('*');
        $this->db->join('tbl_anggota','tbl_users.id_pengurus=tbl_anggota.id_anggota','innner join');
        $query = $this->db->get_where('tbl_users',$where);
        if($query->num_rows()>=0){
            return $query->row();
        }else{
            return false;
        }
    }
    public function do_update_users($id){
        $where=array(
            'id_users' => $id
        );
        $username = $this->input->post('username');
        $Email = $this->input->post('Email');
        $Role = $this->input->post('Role');
        $nama = $this->input->post('nama');
        $status = $this->input->post('Status');
            
        $data = array(
            'username'=>$username,
            'role'=>$Role,
            'email'=>$Email,
            'status'=>$status,
            'nama_user'=>$nama
        );
        $query = $this->db->update('tbl_users', $data ,$where);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }
    public function view_all_proposal(){
        $query = $this->db->get('tbl_proposal');
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function view_proposal_acc(){
        $where = array(
            'Status_proposal'=>"ACC"
        );
        $query = $this->db->get_where('tbl_proposal',$where);
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function view_proposal_revisi(){
        $where = array(
            'Status_proposal'=>"Revisi",
        );
        $query = $this->db->get_where('tbl_proposal',$where);
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_proposal_update($id){
        $where = array(
            'id_proposal'=>$id
        );
        $this->db->select('*');
        $this->db->join('tbl_anggota','tbl_anggota.id_anggota=tbl_proposal.PJ','innner join');
        $query = $this->db->get_where('tbl_proposal',$where);
        if($query->num_rows()>=0){
            return $query->result_array();
        }else{
            return false;
        }

    }
}