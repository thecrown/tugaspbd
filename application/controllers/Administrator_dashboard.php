<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_dashboard extends CI_Controller {

		function __construct() {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('Ketua_model');
		
		
        $this->load->model('Auth');
			if($this->Auth->is_Admin()!="Administrator"){
				redirect('Ketua_dashboard');
			}
		}
    		
	public function index()
	{	
		$data['view_data']="view_data";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	//mengambil data semua bidang
	public function view_all(){
		$data['view_dept']="view_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	//menambahkan semua bidang
	public function add_dept(){
		$data['add_dept']="add_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	//pengecekan validasi input bidang
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
	
	//menghapus bidang
	public function delete_dept($id){
		$query = $this->admin_model->delete_dept($id);
		if($query==true){
			redirect('Administrator_dashboard/view_all');
		}else{

			$data['view_dept']="view_dept";
			$data['error']="sorry delete data failed";
			$this->load->view('master_layout',$data);
		}
	}
	//mengupdate bidang
	public function update_dept($id){
		$data['update_dept']="update_dept";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->get_update_bidang($id);
		$this->load->view('master_layout',$data);
	}
	//mengecek validasi update bidang 
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
	//melihat semua anggota yang ada didalam semua bidang
	public function view_all_anggota(){
		$data['view_all_anggota']="view_all_anggota";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['anggota_data']=$this->admin_model->view_all_anggota();
		$this->load->view('master_layout',$data);
	}
	//melihat anggota dari tiap bidang
	public function view_all_anggota_bidang($id){
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['view_all_anggota']="view_all_anggota";
		$data['anggota_data']=$this->admin_model->view_all_anggota_bidang($id);
		$this->load->view('master_layout',$data);
	}
	//menambah anggota dari bidang
	public function add_anggota(){
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['divisi']=$this->admin_model->get_divisi();
		$data['add_anggota']="add_anggota";
		$this->load->view('master_layout',$data);
	}
	//melakukan validasi input data anggota
	
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
	//menghapus data anggota
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
	//mengambil data untuk diupdate
	public function update_anggota($id){
		$data['data_anggota']=$this->admin_model->get_anggota_update($id);
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['divisi']=$this->admin_model->get_divisi();
		$data['update_anggota']="update_anggota";
		$this->load->view('master_layout',$data);
	}
	//mengvalidasi data anggota untuk di update
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
	//melihat semua user yang dapat mengakses dashboard
	public function view_all_user(){
		$data['view_users']="view_users";
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$data['user_data']= $this->admin_model->view_all_user();
		$this->load->view('master_layout',$data);
	}
	//menambah user yang dapat mengakses dashboard
	public function add_users(){
		
		$data['data_anggota']=$this->admin_model->get_all_anggota();
		$data['data_divisi']=$this->admin_model->get_divisi_for_user_all();
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
		$this->form_validation->set_rules('bidang','Bidang Users','xss_clean|trim|required');

		if($this->form_validation->run()==false)
		{
			$data2['data_anggota']=$this->admin_model->get_all_anggota();
			$data2['data_divisi']=$this->admin_model->get_divisi_for_user_all();
			$data2['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$data2['add_users']="add_users";
			$this->load->view('master_layout',$data2);
		}else{
			
		       	$data['username'] = $this->input->post('username');
				$data['password'] = md5($this->input->post('password'));
				$data['role'] = $this->input->post('Role');
				$data['email'] = $this->input->post('Email');
				$data['id_pengurus'] = $this->input->post('id_pengurus');
				$data['Status'] = $this->input->post('status');
				$data['nama_user'] = $this->input->post('nama');
				$data['id_bidang'] = $this->input->post('bidang');

				$config['upload_path'] = './assets/img/foto/';
   				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
  				$config['max_size'] = 200048;
   				$config['file_name'] = $data['username'];
				$this->upload->initialize($config);
			
				if ( ! $this->upload->do_upload('foto'))
				{
					// $pesan['tipe_pesan'] = 'alert-danger';
					// $pesan['pesan'] = $this->upload->display_errors();
					// $this->session->set_flashdata($pesan);
					// redirect('admin/alumni/ubah/'.$this->input->post('id_kader'));
				}
				else
				{
				// $foto_lama = $this->kader->getbyID($this->input->post('id_kader'))->foto;
				// unlink($config['upload_path'].$foto_lama);
				
				$datas = $this->upload->data();
				$edit['image_library'] = 'gd2';
				$edit['source_image']	= './assets/img/foto/'.$datas['file_name'];
				$edit['create_thumb'] = TRUE;
				$edit['maintain_ratio'] = TRUE;
				$edit['height']	= 600;
				$this->load->library('image_lib', $edit);
				$this->image_lib->resize();
				$edit_file = explode('.', $datas['file_name']);
				$data['foto'] = $edit_file[0].'_thumb.'.$edit_file[1];
				unlink($config['upload_path'].$datas['file_name']);
			}
		

			$result = $this->admin_model->do_add_users($data);
			 
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
	public function update_users($id,$where){
			$data['update_users']="update_users";
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_divisi']=$this->admin_model->get_divisi_for_user($where);
			
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
			
			$data2['update_users']="update_users";
			$data2['data_anggota']=$this->admin_model->get_all_anggota();
			$data2['data_users']=$this->admin_model->get_users_update($id);
			$data2['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$this->load->view('master_layout',$data2);
			
		}else{
			
			$username = $this->input->post('username');
			$Email = $this->input->post('Email');
			$Role = $this->input->post('Role');
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
            

				$config['upload_path'] = './assets/img/foto/';
   				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
  				$config['max_size'] = 200048;
   				$config['file_name'] = $username;
				$this->upload->initialize($config);
			
				if ( ! $this->upload->do_upload('foto'))
				{
					// $pesan['tipe_pesan'] = 'alert-danger';
					// $pesan['pesan'] = $this->upload->display_errors();
					// $this->session->set_flashdata($pesan);
					// redirect('admin/alumni/ubah/'.$this->input->post('id_kader'));
				}
				else
				{
				// $foto_lama = $this->kader->getbyID($this->input->post('id_kader'))->foto;
				// unlink($config['upload_path'].$foto_lama);
				
				$datas = $this->upload->data();
				$edit['image_library'] = 'gd2';
				$edit['source_image']	= './assets/img/foto/'.$datas['file_name'];
				$edit['create_thumb'] = TRUE;
				$edit['maintain_ratio'] = TRUE;
				$edit['height']	= 600;
				$this->load->library('image_lib', $edit);
				$this->image_lib->resize();
				$edit_file = explode('.', $datas['file_name']);
				$nama_foto = $edit_file[0].'_thumb.'.$edit_file[1];
				unlink($config['upload_path'].$datas['file_name']);
			}
		
			$data = array(
				'username'=>$username,
				'role'=>$Role,
				'email'=>$Email,
				'Status'=>$status,
				'nama_user'=>$nama,
				'foto'=>$nama_foto
			);

			$result = $this->admin_model->do_update_users($data,$id);
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
	public function data_cek_proposal_update($id=null){
		
		$this->form_validation->set_rules('judul_proposal','Judul Proposal','trim|xss_clean|required');
		$this->form_validation->set_rules('dana_diajukan','Dana diajukan','trim|xss_clean|required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','trim|xss_clean|required');
		$this->form_validation->set_rules('PJ','PJ','trim|xss_clean|required');
		$this->form_validation->set_rules('bidang','Bidang','trim|xss_clean|required');
		$this->form_validation->set_rules('status','Status','trim|xss_clean|required');

		
		 		$judul_proposal = $this->input->post('judul_proposal');
                $dana_diajukan = $this->input->post('dana_diajukan');
                $deskripsi = $this->input->post('deskripsi');
                $PJ = $this->input->post('PJ');
                $bidang = $this->input->post('bidang');
                $status= $this->input->post('status');
				
				$config['upload_path'] = './assets/file/';
   				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
  				$config['max_size'] = 200048;
   				$config['file_name'] = url_title($judul_proposal,'dash',TRUE);
				  // $config['file_name'] = $judul_proposal;
				
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_porposal2')){
					$upload_data = $this->upload->data(); 
  					$file_name =   $upload_data['file_name'];
				}else{
					echo "gagal";
				}
		
		if($this->form_validation->run()==false){
			$data['edit_proposal']="edit_proposal";
			$data['error']="sorry error upload";
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_proposal']=$this->admin_model->get_proposal_update($id);
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$this->load->view('master_layout',$data);
		}else{  
			$data=array(
                'nama_proker'=>$judul_proposal,
				'pengajuan_dana'=>$dana_diajukan,
				'deskripsi_proker'=>$deskripsi,
				'PJ'=>$PJ,
				'kd_bidang'=>$bidang,
				'Status_proposal'=>$status,
				'nama_file'=> $file_name
            	);

				$where=array(
					'id_proposal'=>$id
				);
			$query = $this->admin_model->do_update_proposal($id,$data);
			if($query){
				redirect('Administrator_dashboard/view_all_proposal/');
			}else{
				$data['view_proposal']="view_proposal";
				$data['proposal_data']= $this->admin_model->view_all_proposal();
				$data['data_dept']=$this->admin_model->all_bidang_view();
				
				$data['error']="terdapat kesalahan saat input data";
				$this->load->view('master_layout',$data);
				
			}
		}

	}
	
	public function view_all_proposal_pengajuan(){
		$data['view_proposal']="view_proposal";
		$data['proposal_data']= $this->admin_model->view_all_proposal_pengajuan();
		$data['data_dept']=$this->admin_model->all_bidang_view();
		$this->load->view('master_layout',$data);
	}
	public function delete_proposal($id=null){
		$query = $this->admin_model->delete_proposal($id);
		if($query){
			$data['view_proposal']="view_proposal";
			$data['proposal_data']= $this->admin_model->view_all_proposal();
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$this->load->view('master_layout',$data);	
		}else{
			$data['view_proposal']="view_proposal";
			$data['proposal_data']= $this->admin_model->view_all_proposal();
			$data['data_dept']=$this->admin_model->all_bidang_view();
			$data['error']="there something wrong.. please try again";
			$this->load->view('master_layout',$data);
		}
	
	}
}
