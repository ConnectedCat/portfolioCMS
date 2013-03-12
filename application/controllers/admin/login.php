<?php

class Login extends CI_Controller {
	
	function index()
	{
		$this->load->view('login_view');
	}//end index()
	
	function validate()
	{
		$this->load->model('user_auth_model');
		
		if($this->user_auth_model->validate())
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			redirect('admin/content_management');
		}
		
		else
		{
			$this->index();
			
		}
	}//end validate()
	
	function forgot()
	{
		$data['content'] = 'forgot_view';
		$this->load->view('templates/template', $data);
	}//end forgot()
	
	function send_info()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->forgot();
		}
		else {
			echo 'validated';
		//$this->load->model('user_auth_model');
		//$this->user_auth_model->retrieve();
		}
	}
}