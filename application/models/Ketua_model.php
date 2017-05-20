<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Ketua_model extends CI_Model{ 

        //digunakan untuk mengambil data bidang
        public function get_bidang_user($id){
            $where = array(
            'id_users'=>$id
        );
            $this->db->select('*');
            $this->db->from('tbl_bidang');
            $this->db->join('tbl_users','tbl_bidang.id=tbl_users.id_bidang','innner join');
            $this->db->where($where);
            $query =  $this->db->get();
            
            if($query->num_rows()){
                return $query->row();
            }else{
                return false;
            }
        }
        public function input_anggota_bidang(){

            $nama = $this->input->post('nama_anggota');
			$alamat_anggota = $this->input->post('alamat_anggota');
			$jabatan = $this->input->post('jabatan');
			$tanggal = $this->input->post('tanggal');
			$status = $this->input->post('status');
			$id_dept= $this->session->userdata('curent_bidang_user');
			$data = array(
				'nama'=>$nama,
				'alamat'=>$alamat_anggota,
				'kd_jabatan'=>$jabatan,
				'status'=>$status,
				'tahun_masuk'=>$tanggal,
				'id_dept'=>$id_dept
			);

            $query = $this->db->insert('tbl_anggota',$data);
            if($query==true){
                return true;
            }else{
                return false;
            }
        }
        public function delete_anggota($id){
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
            $where=array(
                'id_anggota'=>$id
            );

            $query = $this->db->get_where('tbl_anggota',$where);
            if($query->num_rows()){
                return $query->row();
            }else{
                return false;
            }
        }
        public function do_update_anggota($id){
            $where=array(
                'id_anggota'=>$id
            );
                $nama = $this->input->post('nama_anggota');
                $alamat_anggota = $this->input->post('alamat_anggota');
                $jabatan = $this->input->post('jabatan');
                $tanggal = $this->input->post('tanggal');
                $status = $this->input->post('status');
                $id_dept= $this->session->userdata('curent_bidang_user');
            $data=array(
                'nama'=>$nama,
				'alamat'=>$alamat_anggota,
				'kd_jabatan'=>$jabatan,
				'status'=>$status,
				'tahun_masuk'=>$tanggal,
				'id_dept'=>$id_dept
            );
            $query = $this->db->update('tbl_anggota',$data,$where);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function view_all_anggota($id){
            $where = array(
                'id_dept'=>$id
            );
            $query = $this->db->get_where('tbl_anggota',$where);
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }

        }
        public function get_divisi($id){
            $where = array(
                'id'=>$id
            );
            $result = $this->db->get_where('tbl_bidang',$where);
            if($result->num_rows()>=0){
                return $result->row();
            }else{
                return false;
            }
        }
        public function do_insert_proposal($data){
                
            $query = $this->db->insert('tbl_proposal',$data);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function view_all_proposal(){
            $where = array(
                'kd_bidang'=>$this->session->userdata('curent_bidang_user')
            );
            $this->db->select('*');
            $this->db->from('tbl_anggota');
            $this->db->join('tbl_proposal','tbl_anggota.id_anggota=tbl_proposal.PJ','innner join');
            $this->db->where($where);
            $query = $this->db->get();
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function view_all_proposal_pengajuan(){
           $where = array(
                'kd_bidang'=>$this->session->userdata('curent_bidang_user'),
                'Status_proposal'=>"Pengajuan"
            );
            $this->db->select('*');
            $this->db->from('tbl_anggota');
            $this->db->join('tbl_proposal','tbl_anggota.id_anggota=tbl_proposal.PJ','innner join');
             $this->db->where($where);
            $query = $this->db->get();
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function view_proposal_acc(){
           $where = array(
                'kd_bidang'=>$this->session->userdata('curent_bidang_user'),
                'Status_proposal'=>"ACC"
            );
            $this->db->select('*');
            $this->db->from('tbl_anggota');
            $this->db->join('tbl_proposal','tbl_anggota.id_anggota=tbl_proposal.PJ','innner join');
             $this->db->where($where);
            $query = $this->db->get();
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function view_proposal_revisi(){
           $where = array(
                'kd_bidang'=>$this->session->userdata('curent_bidang_user'),
                'Status_proposal'=>"Revisi"
            );
            $this->db->select('*');
            $this->db->from('tbl_anggota');
            $this->db->join('tbl_proposal','tbl_anggota.id_anggota=tbl_proposal.PJ','innner join');
             $this->db->where($where);
            $query = $this->db->get();
            if($query->num_rows()>=0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function delete_proposal($id){
            $where = array(
                'id_proposal'=>$id
            );
            $query = $this->db->delete('tbl_proposal',$where);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function edit_proposal($id){
            $where=array(
                'id_proposal'=>$id
            );
            $query = $this->db->get_where('tbl_proposal',$where);
            if($query->num_rows()>=0)
            {
                return $query->row();
            }else{
                return false;
            }
        }
        public function get_data_PJ(){
            $where=array(
                'id_dept'=>$this->session->userdata('curent_bidang_user')
            );
            $this->db->select('*');
            $this->db->from('tbl_anggota');
            $this->db->where($where);
            $query = $this->db->get();
            if($query->num_rows()>=0)
            {
                return $query->result_array();
            }else{
                return false;
            }
        }
        public function get_bidang(){
            $where = array(
                'id'=>$this->session->userdata('curent_bidang_user')
            );
            $result = $this->db->get_where('tbl_bidang',$where);
            if($result->num_rows()>=0){
                return $result->result_array();
            }else{
                return false;
            }
        }
        public function do_update_proposal($id,$data){
            $where = array(
                'id_proposal'=>$id
            );
             $query = $this->db->update('tbl_proposal',$data,$where);
            if($query){
                return true;
            }else{
                return false;
            }
        } 
    }