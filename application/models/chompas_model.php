<?php
class Chompas_model extends CI_Model{
	function getAll(){
		$query = $this->db->get('chompas');
		$result = $query->result();
		return $result;
	}

	function get($id){
		$this->db->where('id', $id);
		$query = $this->db->get('chompas');
		$results = $query->result();
		return $results[0];
	}

	function updateQty($id, $qty){	
		$data = array(
			'stock_actual' => $this->get($id)->stock_actual - $qty
		);	
		$this->db->where('id', $id);
		$this->db->update('chompas',$data);
	}

	function actualizar($id, $data){
		$this->db->where('id', $id);
		$this->db->update('chompas', $data);
	}
}
