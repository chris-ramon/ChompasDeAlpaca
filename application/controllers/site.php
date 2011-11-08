<?php
class Site extends CI_Controller{
	function index(){
		$data['main_content'] = 'site';
		$this->load->view('includes/template', $data);
	}

}