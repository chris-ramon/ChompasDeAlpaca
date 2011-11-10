<?php
class Pedido_model extends CI_Model{
	function getAll(){
		$query = $this->db->get('pedidos');
		$r = $query->result();
		return $r;
	}
	
	function get($id){
		$this->db->where('id', $id);
		$query = $this->db->get('pedidos');
		$results = $query->result();
		return $results[0];		
	}

	function realizarPedido($chompa_id, $id_insumo){
		$data = array(
			'id_insumo' => $id_insumo,
			'id_chompa' => $chompa_id,
			'estado' => 'enviado',
			'cantidad' => 1,
			'fecha_envio' => date('Y-m-d h:i:s')
		);
		$this->db->insert('pedidos', $data);
	}

	function actualizar($id, $data){
		$this->db->where('id', $id);
		$this->db->update('pedidos', $data);
	}
}