<?php
class Admin extends CI_Controller{
	function index(){
		if($this->session->userdata('is_logged')){
			$this->load->model('chompas_model');
			$this->load->model('pedido_model');
			$data['main_content'] = 'admin_view';
			$data['chompas'] = $this->chompas_model->getAll();
			$data['pedidos'] = $this->pedido_model->getAll();
			$this->load->view('includes/template', $data);
		} else{						
			redirect('/');
		}
	}
}