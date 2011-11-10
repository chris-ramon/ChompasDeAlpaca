<?php
class Test extends CI_Controller{
	function index(){
		$this->load->model('chompas_model');
		echo $this->chompas_model->updateQty(1, 100);
	}
}