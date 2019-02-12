<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessels extends CI_Controller {

	function __construct(){
		parent ::__construct();
		if($this->session->userdata('login')!=TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('vessels_model');
		
	}
   
	public function idirect(){
		$data['vessels']=$this->vessels_model->get_vessel('idirect',$this->session->userdata('ses_id_pelanggan'))->result_array();
		$this->load->view('templates/header/header');
		$this->load->view('templates/body/idirect',$data);
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/footer');
		
	}

	public function idp(){
		$data['vessels']=$this->vessels_model->get_vessel('idp',$this->session->userdata('ses_id_pelanggan'))->result_array();
		$this->load->view('templates/header/header');
		$this->load->view('templates/body/idp',$data);
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/footer');
		
	}

	public function tisa(){
		$data['vessels']=$this->vessels_model->get_vessel('tisa',$this->session->userdata('ses_id_pelanggan'))->result_array();
		$this->load->view('templates/header/header');
		$this->load->view('templates/body/idp',$data);
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/footer');
		
	}


}