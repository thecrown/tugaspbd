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
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function view_all(){
		$data['view_dept']="view_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function add_dept(){
		$data['add_dept']="add_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function data_cek_dept(){
		$this->form_validation->set_rules('name_dept','Nama Divisi','xss_clean|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','xss_clean|trim');

		if($this->form_validation->run()==false)
		{
			$data['add_dept']="add_dept";
			$this->load->view('master_layout',$data);
		}else{
			$result = $this->admin_model->add_departmen();
			 if($result){
				redirect ('Administrator_dashboard/view_all');
				//echo "berhasil login";
                //var_dump($this->session);
				//print_r($this->session);
			 }else{
				 $data['errorLogin']="sorry login error, password or username may wrong";
			 	$this->load->view('login_page',$data);
			 }
		}
        
	}
	public function delete_dept($id){

		$query = $this->admin_model->delete_dept($id);
		if($query){
			redirect('Administrator_dashboard/view_all');
		}else{

			$data['view_dept']="view_dept";
			$data['error']="sorry delete data failed";
			$this->load->view('master_layout',$data);
		}
	}
	public function update_dept($id){
		$data['update_dept']="update_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->get_update_bidang($id);
		$this->load->view('master_layout',$data);
	}
	public function data_cek_dept_update($id=null){
		$this->form_validation->set_rules('name_dept','Nama Divisi','xss_clean|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','xss_clean|trim');

		if($this->form_validation->run()==false)
		{
			$data['update_dept']="update_dept";
			$this->load->view('master_layout',$data);
		}else{
			$result = $this->admin_model->do_update_bidang($id);
			 if($result){
				redirect ('Administrator_dashboard/view_all');
				//echo "berhasil login";
                //var_dump($this->session);
				//print_r($this->session);
			 }else{
				 $data['errorLogin']="sorry login error, password or username may wrong";
			 	$this->load->view('login_page',$data);
			 }
		}
        
	}
	public function view_all_anggota($id){
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['viewa_all_anggota']="viewa_all_anggota";
		$data['anggota_data']=$this->admin_model->view_all_anggota($id);
		$this->load->view('master_layout',$data);
	}
}
