<?php
class Image_management extends CI_Controller {
	function index()
	{	
	if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('image_management_model');
			
			if($this->input->post('upload'))
			{
				$erros = $this->image_management_model->upload();	
			}
			
			if($this->input->post('update'))
			{
				$errors = $this->image_management_model->update();
			}
			if($this->input->post('delete'))
			{
				$errors = $this->image_management_model->delete();
			}
			
			$data['images'] = $this->image_management_model->get_thumbs($this->input->post('display_select'));
			
			if(!empty($errors))
			{
			$data['errors'] = $errors;
			}
			
			$data['content'] = 'admin/image_management_view';
			
			$data['display_select'] = array(
				'*' => '',
				'photography' => 'photography',
				'fine_art' => 'fine art',
				'retouching' => 'retouching'
			);
			$data['categories'] = array(
				'default' => 'Please select',
				'photography' => 'photography',
				'fine_art'=>'fine art',
				'retouching' => 'retouching'
			);
			$data['front_page'] = array(
				'0' => 'No',
				'1' => 'Yes'
			);
			$data['options'] = array(
				'0' => 'None',
				'1' => 'Zoomable',
				'2' => 'Swappable'
			);
			
			$this->load->view('cms/template', $data);
		}
		else
		{
			$data['content'] = 'login_redirect';
			$data['error'] = 'you have to log in to access this page';
		
			$this->load->view('templates/template', $data);
		}
	}//end index()
}