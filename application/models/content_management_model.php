<?php
class Content_management_model extends CI_Model {
	function update()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
		);
		
		$this->db->where('destination', $this->input->post('destination'));
		$this->db->update('text', $data);
	}
	
	function retrieve()
	{
		$q = $this->db->get('text');
		
		return $q->result();
	}
}