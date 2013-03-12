<?php

class Content_management extends CI_Controller {
	
	public $data 	= 	array();
	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		
		$this->load->helper('ckeditor');
 
 
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'ckeditor',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"800px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
 
		$this->data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'ckeditor_2',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"800px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height
				/*'toolbar' 	=> 	array(	//Setting a custom toolbar
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)*/
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 	=> 	'Green',
						'font-weight' 	=> 	'bold'
					)
				)
 
			)
		);
	}//end of __construct
	
	function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
		  $this->load->model('content_management_model');
		  if($this->input->post('update'))
		  {
			  $this->content_management_model->update();
		  }
		  
		  $this->data['text'] = $this->content_management_model->retrieve();
		  $this->data['content'] = 'admin/content_management_view';
		  
		  $this->load->view('cms/template', $this->data);
		}
		else
		{
			$this->data['content'] = 'login_redirect';
			$this->data['error'] = 'you have to log in to access this page';
		
			$this->load->view('templates/template', $this->data);
		}
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		
	}
}