<?php

class user_auth_model extends CI_Model {
	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}
	}
	
	function retrieve()
	{
		$this->db->where('first_name', $this->input->post('first_name'));
		$this->db->where('last_name', $this->input->post('last_name'));
		
		$query = $this->db->get('users');
		
		if($query->num_rows == 1){
			print_r($query);
		}
	}
}