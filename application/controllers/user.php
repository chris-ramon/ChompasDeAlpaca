<?php
class User extends CI_Controller{
	function login(){
		$this->load->model('user_model');
		$user = $this->user_model->validate();
		$data = array(
			'username' => $user->username,
			'rol' => $user->rol,
			'is_logged' => true
		);
		$this->session->set_userdata($data);
		if($user->rol == "admin"){
			redirect('admin/');
		}else{
			redirect('site/sweaters');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}