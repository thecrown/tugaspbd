	
	
	

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
			
			if(!empty($_FILES['foto'])){
			$config['upload_path'] = './assets/img/foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']  = $this->input->post('username');
			$this->load->library('upload', $config);
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
				$datas      = $this->upload->data();
				$edit['image_library'] = 'gd2';
				$edit['source_image']	= './assets/img/foto/'.$datas['file_name'];
				$edit['create_thumb'] = TRUE;
				$edit['maintain_ratio'] = TRUE;
				$edit['width']	= 300;
				$edit['height']	= 600;
				$this->load->library('image_lib', $edit);
				$this->image_lib->resize();
				$edit_file = explode('.', $datas['file_name']);
				$nama_foto = $edit_file[0].'_thumb.'.$edit_file[1];
				unlink($config['upload_path'].$datas['file_name']);
			}

		}

		$username = $this->input->post('username');
        $Email = $this->input->post('Email');
        $Role = $this->input->post('Role');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
            
        $data = array(
            'username'=>$username,
            'role'=>$Role,
            'email'=>$Email,
            'Status'=>$status,
            'nama_user'=>$nama,
			'foto'=>$nama_foto
        );

		if($this->form_validation->run()==false)
		{
			$data['update_users']="update_users";
			$data['data_anggota']=$this->admin_model->get_all_anggota();
			$data['data_users']=$this->admin_model->get_users_update($id);
			$data['data_dept']=$this->admin_model->all_bidang_view();//ngambil semua view bidang dibawa ke sidebar
			$this->load->view('master_layout',$data);
			
		}else{
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