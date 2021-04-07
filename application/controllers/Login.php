<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{


	function __construct() {
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index(){
		$data['title'] = "Halaman Login";

		if ($this->input->post('simpan') <> null) {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			
			$cek = $this->M_login->cek($username,$password);
			if($cek == 1){
				$query = $this->M_login->getdatabyid($username,$password);
				if($password == $query['password']){
					$user_data = [
						'username' => $query['username'],
						'nama' => $query['nama'],
						
						'izin' => true
					];
				$this->session->set_userdata($user_data);
				redirect('data/sto');
				}else{

					redirect(base_url("login"));
				}
			}else{
				redirect(base_url("login"));
			}
		}else{
			$this->load->view('login/view', $data);
		}
	}

public function logout(){
	$this->session->sess_destroy();
	redirect(base_url('login'));
	}
}