<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model{ 
    
    public function user_validation(){
        $username  = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $datauser = array(
            'username' =>$username,
            'password' =>$password
        );
        
        $query = $this->db->get_where('tbl_users',$datauser);

        if($query->num_rows() >=0){
        
            $attr = array(
            'curent_user_id' => $query->row(0)->id_users,
            'curent_user_kd_akses' => $query->row(0)->role,
            'curent_user_picture' => $query->row(0)->foto,
            'curent_name_user'=>  $query->row(0)->nama_user,
            'curent_bidang_user'=> $query->row(0)->id_bidang
            );  
            $this->session->set_userdata($attr);

            return $query->result();
        }else{
            return false;
        }
    }
    public function is_logged_in(){
            return $this->session->userdata('curent_user_id') != False;
        }
    public function is_admin(){
        return $this->session->userdata('curent_user_kd_akses');
    }
}
