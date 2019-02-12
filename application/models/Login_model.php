<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
   
	public function auth_user($email,$password){
		$query = $this->db->query("SELECT*FROM tabel_user WHERE username='$email' AND password=md5('$password')");
		return $query;
	}
	
}