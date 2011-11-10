<?php
class Pedido_model extends CI_Model{
	function getAll(){
		$query = $this->db->get('pedidos');
		$r = $query->result();
		return $r;
	}

	function realizarPedido($id_insumo){
		$data = array(
			'id_insumo' => $id_insumo,
			'estado' => 'enviado',
			'cantidad' => 1,
			'fecha_envio' => date('Y-m-d h:i:s')
		);

		$this->db->insert('pedidos', $data);
	}

	function actualizarEstado($id, $estado){
		$this->db->where('id', $id);
		$data = array(
			'estado' => $estado
		);
		$this->db->update('pedidos', $data);
	}
}