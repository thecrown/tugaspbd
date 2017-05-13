<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('master_layout');
	}
	public function view_data()
	{
		$data['view_data']="view_data";
		$this->load->view('content/',$data);
	}
}
