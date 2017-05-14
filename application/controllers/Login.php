<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Auth');
		}

	public function index()
	 {	
	 	$query = $this->Auth->is_logged_in();
	 	if($query==true){
	 		redirect ('Administrator_dashboard');
	 	}else{
	 		$this->load->view('login_page');
	 	}
	}

    public function cek_user_validation(){
        $this->form_validation->set_rules('username','Username','xss_clean|trim');
        $this->form_validation->set_rules('password','Username','xss_clean|trim');
        
        if($this->form_validation->run()==false){
            $this->load->view('login_page');
        }
        else{
            $result = $this->Auth->user_validation();
			 if($result){
				redirect ('Administrator_dashboard');
				//echo "berhasil login";
                //var_dump($this->session);
				//print_r($this->session);
			 }else{
				 $data['errorLogin']="sorry login error, password or username may wrong";
			 	$this->load->view('login_page',$data);
			 }
        }
    }
    public function logout(){
        $this->session->unset_userdata('curent_user_id');
		$this->session->unset_userdata('curent_user_kd_akses');
		$this->session->unset_userdata('curent_user_name');

		$this->session->sess_destroy();
        redirect('Login');
    }
	
}
