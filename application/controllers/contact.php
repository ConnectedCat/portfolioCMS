<?php
class Contact extends CI_Controller {
	function index()
	{	
		if($this->input->post('email_submit'))
		{
			$this->email->from($this->input->post('email_address'), $this->input->post('first_name').' '.$this->input->post('last_name'));
			$this->email->to('nicksavage@me.com');
	
			$this->email->subject('Email from my super awesome website');
			$this->email->message($this->input->post('email_text'));
	
			if($this->email->send())
			{
				$data['message'] = '<script type="text/javascript"> alert ("Email sent successfully") </script>';
			}
			else
			{
				$data['message'] = '<script type="text/javascript"> alert ("'.$this->email->print_debugger().'") </script>';
			}
		}
		else
		{
			$data['message'] = '';
		}
		
		$data['content'] = 'contact_view';
		
		$this->load->view('templates/template', $data);
		
		
	}
}