<?php
class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('home_model');
		
		$data['images'] = $this->home_model->retrieve_images();
		$data['text'] = $this->home_model->retrieve_text('front_page');
		$data['content'] = 'home_view';
		
		$this->load->view('templates/template', $data);
	}
}