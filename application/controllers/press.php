<?php
class Press extends CI_Controller{
	public function index()
	{
		$this->load->model('home_model');
		
		$data['images'] = $this->home_model->retrieve_images();
		$data['text'] = $this->home_model->retrieve_text('press_page');
		$data['content'] = 'press_view';
		
		$this->load->view('templates/template', $data);
	}
}