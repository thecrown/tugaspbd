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
		$this->form_validation->set_rules('name_dept','Nama Divisi','xss_clean|trim|required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','xss_clean|trim|required');

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
		$this->form_validation->set_rules('name_dept','Nama Divisi','xss_clean|trim|required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','xss_clean|trim|required');

		if($this->form_validation->run()==false)
		{
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['user_data']= $this->admin_model->get_update_bidang($id);
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
	public function view_all_anggota(){
		$data['view_all_anggota']="view_all_anggota";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['anggota_data']=$this->admin_model->view_all_anggota();
		$this->load->view('master_layout',$data);
	}
	public function view_all_anggota_bidang($id){
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['view_all_anggota']="view_all_anggota";
		$data['anggota_data']=$this->admin_model->view_all_anggota_bidang($id);
		$this->load->view('master_layout',$data);
	}
	public function add_anggota(){
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['divisi']=$this->admin_model->get_divisi();
		$data['add_anggota']="add_anggota";
		$this->load->view('master_layout',$data);
	}
	public function data_cek_anggota(){
		$this->form_validation->set_rules('nama_anggota','Nama Anggota','xss_clean|trim|required');
        $this->form_validation->set_rules('alamat_anggota','Alamat Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('jabatan','Jabatan Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('divisi','Divisi Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('tanggal','Tanggal masuk Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('status','Status Anggota','xss_clean|trim|required');

		if($this->form_validation->run()==false)
		{
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['jabatan']=$this->admin_model->get_jabatan();
			$data['divisi']=$this->admin_model->get_divisi();
			$data['add_anggota']="add_anggota";
			$this->load->view('master_layout',$data);
		}else{
			$result = $this->admin_model->add_anggota();
			 if($result){
				redirect ('Administrator_dashboard/view_all_anggota');
			 }else{
				$data['data_dept']=$this->admin_model->all_bidang_view();
				$data['jabatan']=$this->admin_model->get_jabatan();
				$data['divisi']=$this->admin_model->get_divisi();
				$data['add_anggota']="add_anggota";
				$data['error']="there something wrong.. please try again";
				$this->load->view('master_layout',$data);
			}
		}
	}
	public function delete_anggota($id=null){
		$query = $this->admin_model->delete_anggota_all($id);
		if($query){
			redirect ('Administrator_dashboard/view_all_anggota');
		}else{

			$data['view_all_anggota']="view_all_anggota";
			$data['error']="terjadi kesalah delete";
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['anggota_data']=$this->admin_model->view_all_anggota();
			$this->load->view('master_layout',$data);				
		}
	}
	public function update_anggota($id){
		$data['data_anggota']=$this->admin_model->get_anggota_update($id);
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['divisi']=$this->admin_model->get_divisi();
		$data['update_anggota']="update_anggota";
		$this->load->view('master_layout',$data);
	}
}
