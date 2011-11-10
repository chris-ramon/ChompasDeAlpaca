<?php 
class Pedido extends CI_Controller{
	function aceptar($id){
		$this->load->model('pedido_model');
		$this->load->model('chompas_model');
		$this->pedido_model->actualizarEstado($id, 'recibido');
		$this->chompas_model->actualizar
	}
}