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
}
