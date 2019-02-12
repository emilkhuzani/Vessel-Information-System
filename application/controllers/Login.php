<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
   
	public function index()
	{
		$this->load->view('templates/login/login');
	}

	public function auth(){
		$this->form_validation->set_rules('txtemail','Email','required');
		$this->form_validation->set_rules('txtpassword','Password','required');
		if($this->form_validation->run()===FALSE){
			redirect('login');
		}else{
			$email=htmlspecialchars($this->input->post('txtemail',TRUE),ENT_QUOTES);
			$password=htmlspecialchars($this->input->post('txtpassword',TRUE),ENT_QUOTES);
			$cek_user=$this->login_model->auth_user($email,$password);
			if($cek_user->num_rows()>0){
			  $data=$cek_user->row_array();
			  $this->session->set_userdata('login',TRUE);
			  $this->session->set_userdata('ses_id_user',$data['id_user']);
			  $this->session->set_userdata('ses_id_pelanggan',$data['id_pelanggan']);
			  $this->session->set_userdata('ses_nama_user',$data['nama_user']);
			  redirect('monitor');
			}else{
			  $url=base_url();
			  echo $this->session->set_flashdata('msg','Username or password incorrect!');
			  redirect($url);
		    }
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
