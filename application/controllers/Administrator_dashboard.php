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
	public function data_cek_anggota_update($id=null){
		$this->form_validation->set_rules('nama_anggota','Nama Anggota','xss_clean|trim|required');
        $this->form_validation->set_rules('alamat_anggota','Alamat Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('jabatan','Jabatan Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('divisi','Divisi Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('tanggal','Tanggal masuk Anggota','xss_clean|trim|required');
		$this->form_validation->set_rules('status','Status Anggota','xss_clean|trim|required');

		if($this->form_validation->run()==false)
		{
			$data['data_anggota']=$this->admin_model->get_anggota_update($id);
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['jabatan']=$this->admin_model->get_jabatan();
			$data['divisi']=$this->admin_model->get_divisi();
			$data['update_anggota']="update_anggota";
			$this->load->view('master_layout',$data);
		}else{
			$result = $this->admin_model->do_update_anggota($id);
			 if($result){
				redirect ('Administrator_dashboard/view_all_anggota');
			 }else{
				$data['data_anggota']=$this->admin_model->get_anggota_update($id);
				$data['data_dept']=$this->admin_model->all_bidang_view();
				$data['jabatan']=$this->admin_model->get_jabatan();
				$data['divisi']=$this->admin_model->get_divisi();
				$data['update_anggota']="update_anggota";
				$data['error']="there something wrong.. please try again";
				$this->load->view('master_layout',$data);
			}
		}
	}
	public function view_all_user(){
		$data['view_users']="view_users";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->view_all_user();
		$this->load->view('master_layout',$data);
	}
	public function add_users(){
		
		$data['data_anggota']=$this->admin_model->get_all_anggota();
		$data['add_users']="add_users";
		$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
		$this->load->view('master_layout',$data);
	}
	public function cek_users_data(){
		$this->form_validation->set_rules('id_pengurus','Nama Anggota','xss_clean|trim|required');
        $this->form_validation->set_rules('username','Username','xss_clean|trim|required');
		$this->form_validation->set_rules('password','Password User','xss_clean|trim|required');
		$this->form_validation->set_rules('password2','Password','xss_clean|trim|required|matches[password]');
		$this->form_validation->set_rules('Email','Email User','xss_clean|trim|required|valid_email');
		$this->form_validation->set_rules('Role','Role Users','xss_clean|trim|required');
		$this->form_validation->set_rules('status','Status Users','xss_clean|trim|required');
		$this->form_validation->set_rules('nama','Nama Users','xss_clean|trim|required');

		if($this->form_validation->run()==false)
		{
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$data['add_users']="add_users";
			$this->load->view('master_layout',$data);
		}else{
			$result = $this->admin_model->do_add_users();
			 if($result){
				redirect ('Administrator_dashboard/view_all_user');
			 }else{
				$data['data_anggota']=$this->admin_model->get_all_anggota();
				$data['add_users']="add_users";
				$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
				$data['error']="there something wrong.. please try again";
				$this->load->view('master_layout',$data);
			}
		}
	}
	public function delete_users($id){
		$query = $this->admin_model->delete_users($id);
		if($query){
			redirect ('Administrator_dashboard/view_all_user');
		}else{
			$data['view_users']="view_users";
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['user_data']= $this->admin_model->view_all_user();
			$data['error']="there something wrong.. please try again";
			$this->load->view('master_layout',$data);
		}
	}
	public function update_users($id){
			$data['update_users']="update_users";
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_users']=$this->admin_model->get_users_update($id);
			$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$this->load->view('master_layout',$data);
	}
	public function cek_users_data_update($id=null){
			$this->form_validation->set_rules('username','Username','xss_clean|trim|required');
			$this->form_validation->set_rules('Email','Email','xss_clean|trim|required');
			$this->form_validation->set_rules('Role','Role','xss_clean|trim|required');
			$this->form_validation->set_rules('nama','Nama','xss_clean|trim|required');
			$this->form_validation->set_rules('status','Status','xss_clean|trim|required');
			
		if($this->form_validation->run()==false)
		{
			$data['update_users']="update_users";
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_users']=$this->admin_model->get_users_update($id);
			$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$this->load->view('master_layout',$data);
			
		}else{
			$result = $this->admin_model->do_update_users($id);
			 if($result){
				redirect ('Administrator_dashboard/view_all_user');
			 }else{
				$data['update_users']="update_users";
				$data['data_anggota']=$this->admin_model->get_all_anggota();
				$data['data_users']=$this->admin_model->get_users_update($id);
				$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
				$data['error']="there something wrong.. please try again";
				$this->load->view('master_layout',$data);
			}
		}
	}
	public function view_all_proposal(){
		$data['view_proposal']="view_proposal";
		$data['proposal_data']= $this->admin_model->view_all_proposal();
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function view_proposal_acc(){
		$data['view_proposal']="view_proposal";
		$data['proposal_data']= $this->admin_model->view_proposal_acc();
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function view_proposal_revisi(){
		$data['view_proposal']="view_proposal";
		$data['proposal_data']= $this->admin_model->view_proposal_revisi();
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function edit_proposal($id=null){
		$data['edit_proposal']="edit_proposal";
		$data['data_anggota']=$this->admin_model->get_all_anggota();
		$data['data_proposal']=$this->admin_model->get_proposal_update($id);
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	
}
