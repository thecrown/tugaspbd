<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua_dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('upload');
		$this->load->model('admin_model');
		$this->load->model('Ketua_model');
		
		
        $this->load->model('Auth');
			if($this->Auth->is_logged_in()!=true){
				redirect('Login');
			}
		}

	public function index()
	{
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$this->load->view('ketua_layout',$data);
	}
	public function view_all($id){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		
		$data['data_anggota']=$this->admin_model->view_all_anggota_bidang($id);
		$data['view_all']="view_all";
		$this->load->view('ketua_layout',$data);
	}
	public function add_anggota_bidang(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);

		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['add_anggota']="add_anggota";
		$this->load->view('ketua_layout',$data);
	}
	public function cek_validation_anggota(){

		$this->form_validation->set_rules('nama_anggota','Nama Anggota','trim|xss_clean|required');
		$this->form_validation->set_rules('alamat_anggota','Alamat Anggota','trim|xss_clean|required');
		$this->form_validation->set_rules('jabatan','Jabatan','trim|xss_clean|required');
		$this->form_validation->set_rules('tanggal','Tanggal','trim|xss_clean|required');
		$this->form_validation->set_rules('status','Status','trim|xss_clean|required');

		if($this->form_validation->run()==false){
			//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);

		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['add_anggota']="add_anggota";
		$this->load->view('ketua_layout',$data);
		}else{

			$query = $this->Ketua_model->input_anggota_bidang();
			if($query){
				$id = $this->session->userdata('curent_bidang_user');
				redirect('Ketua_dashboard/view_all/'.$id);
			}else{
				//digunakan untuk mengambil data bidang pada sidebar
				$datas = $this->session->userdata('curent_user_id');
				$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
				$data['error']="terdapat kesalahan saat input data";
				$data['jabatan']=$this->admin_model->get_jabatan();
				$data['add_anggota']="add_anggota";
				$this->load->view('ketua_layout',$data);
			}
		}

	}
	public function delete_anggota($id=null){
		$query =  $this->Ketua_model->delete_anggota($id);
		if($query){
			$id = $this->session->userdata('curent_bidang_user');
			redirect('Ketua_dashboard/view_all/'.$id);	
		}else{
			$id = $this->session->userdata('curent_bidang_user');
			$data['data_anggota']=$this->admin_model->view_all_anggota_bidang($id);
			$data['view_all']="view_all";
			$this->load->view('ketua_layout',$data);
		}
	}
	public function update_anggota($id=null){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);

		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['data_anggota']=$this->Ketua_model->get_anggota_update($id);
		$data['update_anggota']="update_anggota";
		$this->load->view('ketua_layout',$data);
	}

	public function cek_data_update($id=null){
		$this->form_validation->set_rules('nama_anggota','Nama Anggota','trim|xss_clean|required');
		$this->form_validation->set_rules('alamat_anggota','Alamat Anggota','trim|xss_clean|required');
		$this->form_validation->set_rules('jabatan','Jabatan','trim|xss_clean|required');
		$this->form_validation->set_rules('tanggal','Tanggal','trim|xss_clean|required');
		$this->form_validation->set_rules('status','Status','trim|xss_clean|required');

		if($this->form_validation->run()==false){
			//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);

		$data['jabatan']=$this->admin_model->get_jabatan();
		$data['data_anggota']=$this->Ketua_model->get_anggota_update($id);
		$data['update_anggota']="update_anggota";
		$this->load->view('ketua_layout',$data);
		}else{
			$query = $this->Ketua_model->do_update_anggota($id);
			if($query){
				$id = $this->session->userdata('curent_bidang_user');
				redirect('Ketua_dashboard/view_all/'.$id);
			}else{
				//digunakan untuk mengambil data bidang pada sidebar
				$datas = $this->session->userdata('curent_user_id');
				$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
				$data['error']="terdapat kesalahan saat input data";
				$data['jabatan']=$this->admin_model->get_jabatan();
				$data['update_anggota']="update_anggota";
				$this->load->view('ketua_layout',$data);
			}

		}
	}
	public function add_proposal_bidang(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$get_user =$this->session->userdata('curent_bidang_user');

		$data['anggota_data']=$this->Ketua_model->view_all_anggota($get_user);
		$data['divisi']=$this->Ketua_model->get_divisi($get_user);
		$data['add_proposal']="add_proposal";
		$this->load->view('ketua_layout',$data);
	}
	public function cek_data_proposal(){
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
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('file_porposal')){
					$upload_data = $this->upload->data(); 
  					$file_name =   $upload_data['file_name'];
				}else{
					echo "gagal";
				}
		
		if($this->form_validation->run()==false){
			//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$get_user =$this->session->userdata('curent_bidang_user');

		$data['anggota_data']=$this->Ketua_model->view_all_anggota($get_user);
		$data['divisi']=$this->Ketua_model->get_divisi($get_user);
		$data['add_proposal']="add_proposal";
		$this->load->view('ketua_layout',$data);
		}else{  
			$data=array(
                'nama_proker'=>$judul_proposal,
				'pengajuan_dana'=>$dana_diajukan,
				'deskripsi_proker'=>$deskripsi,
				'PJ'=>$PJ,
				'kd_bidang'=>$bidang,
				'Status_proposal'=>$status,
				'nama_file'=>$file_name
            	);

		$query = $this->Ketua_model->do_insert_proposal($data);
			if($query){
				$id = $this->session->userdata('curent_bidang_user');
				redirect('Ketua_dashboard/view_all/'.$id);
			}else{
				//digunakan untuk mengambil data bidang pada sidebar
				$datas = $this->session->userdata('curent_user_id');
				$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
				$get_user =$this->session->userdata('curent_bidang_user');

				$data['anggota_data']=$this->Ketua_model->view_all_anggota($get_user);
				$data['divisi']=$this->Ketua_model->get_divisi($get_user);
				$data['error']="terdapat kesalahan saat input data";
				$data['add_proposal']="add_proposal";
				$this->load->view('ketua_layout',$data);
			}
		}

	}
	public function view_all_proposal(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$data['view_proposal']="view_proposal";

		$data['proposal_data']= $this->Ketua_model->view_all_proposal();
		$this->load->view('ketua_layout',$data);
	}
	public function view_all_proposal_pengajuan(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$data['view_proposal']="view_proposal";

		$data['proposal_data']= $this->Ketua_model->view_all_proposal_pengajuan();
		$this->load->view('ketua_layout',$data);
	}
	public function view_proposal_acc(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$data['view_proposal']="view_proposal";

		$data['proposal_data']= $this->Ketua_model->view_proposal_acc();
		$this->load->view('ketua_layout',$data);
	}
	public function view_proposal_revisi(){
		//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$data['view_proposal']="view_proposal";

		$data['proposal_data']= $this->Ketua_model->view_proposal_revisi();
		$this->load->view('ketua_layout',$data);
	}
	public function delete_proposal($id=null){
		$query = $this->Ketua_model->delete_proposal($id);
		if($query){
			//digunakan untuk mengambil data bidang pada sidebar
			$datas = $this->session->userdata('curent_user_id');
			$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
			$data['view_proposal']="view_proposal";

			$data['proposal_data']= $this->Ketua_model->view_all_proposal();
			$this->load->view('ketua_layout',$data);	
		}else{
			//digunakan untuk mengambil data bidang pada sidebar
			$id = $this->session->userdata('curent_bidang_user');
			$data['data_anggota']=$this->admin_model->view_all_anggota_bidang($id);

			$data['view_proposal']="view_proposal";
			$data['error']="terdapat kesalahan saat delete data";
			$data['proposal_data']= $this->Ketua_model->view_all_proposal();
			$this->load->view('ketua_layout',$data);
		}
		
	}
	public function edit_proposal($id=null){
		//digunakan untuk mengambil data bidang pada sidebar
			$datas = $this->session->userdata('curent_user_id');
			$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
			
			$data['edit_proposal']="edit_proposal";
			$data['PJ']=$this->Ketua_model->get_data_PJ();
			$data['bidang']=$this->Ketua_model->get_bidang();
			$data['proposal_data']= $this->Ketua_model->edit_proposal($id);
			$this->load->view('ketua_layout',$data);
	}
	public function cek_data_proposal_update($id=null){
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
				
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('file_porposal')){
				//
				}else{
					echo "gagal";
				}
		
		if($this->form_validation->run()==false){
			//digunakan untuk mengambil data bidang pada sidebar
		$datas = $this->session->userdata('curent_user_id');
		$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
		$get_user =$this->session->userdata('curent_bidang_user');

		$data['anggota_data']=$this->Ketua_model->view_all_anggota($get_user);
		$data['divisi']=$this->Ketua_model->get_divisi($get_user);
		$data['add_proposal']="add_proposal";
		$this->load->view('ketua_layout',$data);
		}else{  
			$data=array(
                'nama_proker'=>$judul_proposal,
				'pengajuan_dana'=>$dana_diajukan,
				'deskripsi_proker'=>$deskripsi,
				'PJ'=>$PJ,
				'kd_bidang'=>$bidang,
				'Status_proposal'=>$status,
				'nama_file'=>$config['file_name'] 
            	);
				$where=array(
					'id_proposal'=>$id
				);
		$query = $this->Ketua_model->do_update_proposal($id,$data);
			if($query){
				$id = $this->session->userdata('curent_bidang_user');
				redirect('Ketua_dashboard/view_all/'.$id);
			}else{
				//digunakan untuk mengambil data bidang pada sidebar
				$datas = $this->session->userdata('curent_user_id');
				$data['data_bidang_user']=$this->Ketua_model->get_bidang_user($datas);
				$get_user =$this->session->userdata('curent_bidang_user');

				$data['anggota_data']=$this->Ketua_model->view_all_anggota($get_user);
				$data['divisi']=$this->Ketua_model->get_divisi($get_user);
				$data['error']="terdapat kesalahan saat input data";
				$data['add_proposal']="add_proposal";
				$this->load->view('ketua_layout',$data);
			}
		}

	}
}
