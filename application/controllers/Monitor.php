<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

	function __construct(){
		parent ::__construct();
		if($this->session->userdata('login')!=TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('monitor_model');
		
	}
   
	public function index(){
		$this->load->view('templates/header/header');
		$this->load->view('templates/monitor/monitor');
		$this->load->view('templates/modal/modal');
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/script.php');
	}

	public function idp(){
		$this->load->view('templates/header/header');
		$this->load->view('templates/monitor/monitor');
		$this->load->view('templates/modal/modal');
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/idp.php');
	}

	public function idirect(){
		$this->load->view('templates/header/header');
		$this->load->view('templates/monitor/monitor');
		$this->load->view('templates/modal/modal');
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/idirect.php');
	}

	public function tisa(){
		$this->load->view('templates/header/header');
		$this->load->view('templates/monitor/monitor');
		$this->load->view('templates/modal/modal');
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/javascript/tisa.php');
	}

	public function refresh_marker(){
		$data['locations']=$this->monitor_model->get_vessel($this->session->userdata('ses_id_pelanggan'))->result_array();
		echo json_encode($data);
	}

	public function refresh_marker_idp(){
		$i=0;
		$kapal=$this->monitor_model->get_vessel_idp($this->session->userdata('ses_id_pelanggan'));
		if($kapal->num_rows() > 0){
			foreach ($kapal->result() as $r){
				$data['locations'][$i]['nama_kapal'] = $r->nama_kapal;
				$data['locations'][$i]['id_kapal'] = $r->id_kapal;
				$tracking=$this->monitor_model->get_tracking_idp($r->id_kapal);
				if($tracking->num_rows() > 0){
					foreach ($tracking->result() as $row) {
					  $data['locations'][$i]['latitude']=round($row->latitude,3);
					  $data['locations'][$i]['longitude']=round($row->longitude,3);
					  $data['locations'][$i]['heading']=$row->heading;
					  $data['locations'][$i]['status_gps']=$row->status_gps;
					  $data['locations'][$i]['speed']=$row->speed;
					  $data['locations'][$i]['waktu_lokal']=$row->waktu_lokal;
					}
				}
				$i++;
			}
		}
		echo json_encode($data);
	}

	public function ajax_idp(){
		$i=0;
		$kapal=$this->monitor_model->ajax_idp($this->session->userdata('ses_id_pelanggan'));
		if($kapal->num_rows() > 0){
			foreach ($kapal->result() as $r){
				$data['locations'][$i]['nama_kapal'] = $r->nama_kapal;
				$data['locations'][$i]['id_kapal'] = $r->id_kapal;
				$tracking=$this->monitor_model->get_tracking_idp($r->id_kapal);
				if($tracking->num_rows() > 0){
					foreach ($tracking->result() as $row) {
					  $data['locations'][$i]['latitude']=round($row->latitude,3);
					  $data['locations'][$i]['longitude']=round($row->longitude,3);
					  $data['locations'][$i]['heading']=$row->heading;
					  $data['locations'][$i]['status_gps']=$row->status_gps;
					  $data['locations'][$i]['speed']=$row->speed;
					  $data['locations'][$i]['waktu_lokal']=$row->waktu_lokal;
					}
				}
				$i++;
			}
		}
		echo json_encode($data);
	}

	public function ajax_tisa(){
		$i=0;
		$kapal=$this->monitor_model->ajax_tisa($this->session->userdata('ses_id_pelanggan'));
		if($kapal->num_rows() > 0){
			foreach ($kapal->result() as $r){
				$data['locations'][$i]['nama_kapal'] = $r->nama_kapal;
				$data['locations'][$i]['id_kapal'] = $r->id_kapal;
				$tracking=$this->monitor_model->get_tracking_idp($r->id_kapal);
				if($tracking->num_rows() > 0){
					foreach ($tracking->result() as $row) {
					  $data['locations'][$i]['latitude']=round($row->latitude,3);
					  $data['locations'][$i]['longitude']=round($row->longitude,3);
					  $data['locations'][$i]['heading']=$row->heading;
					  $data['locations'][$i]['status_gps']=$row->status_gps;
					  $data['locations'][$i]['speed']=$row->speed;
					  $data['loactions'][$i]['waktu_lokal']=$row->waktu_lokal;
					}
				}
				$i++;
			}
		}
		echo json_encode($data);
	}

}