<?php 
class Pedido extends CI_Controller{
	function aceptar($id){
		$this->load->model('pedido_model');
		$this->load->model('chompas_model');
		
		$pedido = $this->pedido_model->get($id);
		$chompa_id = $pedido->id_chompa;
		
		$data_pedido = array(
			'estado' => 'recibido',
			'fecha_llegada' => date('Y-m-d h:i:s')
		);
		
		$this->pedido_model->actualizar($id, $data_pedido);
		
		$chompa = $this->chompas_model->get($chompa_id);
		
		$data_chompa = array(
			'stock_actual' => $chompa->stock_actual + $chompa->cantidad_pendiente,
			'cantidad_pendiente' => 0
		);		
		$this->chompas_model->actualizar($chompa_id, $data_chompa);
		redirect('admin');
	}
}