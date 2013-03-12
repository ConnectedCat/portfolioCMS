<?php

class Store extends CI_Controller {
	function index()
	{
		$data['content'] = 'store_view';
		
		$this->load->view('templates/template', $data);
	}
}