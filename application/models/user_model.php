<?php
class User_model extends CI_Model{
	function validate(){
		$username = $this->input->post('username');
		$pwd = md5($this->input->post('pwd'));
		$this->db->where('username', $username);
		$this->db->where('password', $pwd);
		$query = $this->db->get('usuarios');
		if($query){
			$result = $query->result();
			return $result[0];
		}
		else{
			return false;
		}
	}
}