<?php
class Home_model extends CI_Model{
	function retrieve_images(){
		$q = $this->db->get_where('images', array('front_page' => 1));
		
		return $q->result();
	}
	
	function retrieve_text($page){
		$q = $this->db->get_where('text', array('destination' => $page));
		
		return $q->result();
	}
}