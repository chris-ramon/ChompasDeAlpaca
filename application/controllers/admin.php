<?php
class Admin extends CI_Controller{
	function index(){
		if($this->session->userdata('is_logged')){
			$data['main_content'] = 'admin_view';
			$this->load->view('includes/template', $data);
		} else{						
			redirect('/');
		}
	}
}