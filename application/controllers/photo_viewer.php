<?php
class Photo_viewer extends CI_Controller {
	function index()
	{
		$this->load->model('image_management_model');
		
		$data['images'] = $this->image_management_model->get_images($this->uri->segment(3), $this->uri->segment(4));
		$data['photostrip_width'] = $this->image_management_model->get_photostrip_width($this->uri->segment(3), $this->uri->segment(4));
		$data['section'] = $this->uri->segment(3);
		$data['sub_section'] = $this->uri->segment(4);
		$data['content'] = 'photostrip_view';
		
		$this->load->view('templates/template', $data);
	}
}