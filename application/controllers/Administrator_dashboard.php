<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_dashboard extends CI_Controller {

		function __construct() {
        parent::__construct();
		$this->load->model('admin_model');
		
        $this->load->model('Auth');
			if($this->Auth->is_logged_in()==false){
				redirect('Login');
			}
		}
    		
	public function index()
	{
		$data['view_data']="view_data";
		$this->load->view('master_layout',$data);
	}
	public function view_all(){
		$data['view_data']="view_data";
		$data['user_data']= $this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	
}
