<?php
class Clients extends CI_Controller {
	public function index()
	{
		$this->load->model('home_model');
		
		$data['text'] = $this->home_model->retrieve_text('clients_page');
		$data['content'] = 'clients_view';
		
		$this->load->view('templates/template', $data);
	}
}