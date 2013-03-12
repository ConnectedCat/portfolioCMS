<?php
class Image_management_model extends CI_Model{
	
	var $images_path;
	
	function Image_management_model()
	{
		parent::__construct();
		
		$this->images_path = realpath(APPPATH.'../images');
	}
	
	function upload()
	{
		
		$data = array(
				'title' => $this->input->post('title'),
				'comment' => $this->input->post('comment'),
				'category' => $this->input->post('category'),
				'sub_category' => $this->input->post('sub_category'),
				'front_page' => $this->input->post('front_page')
			);
		if($this->input->post('display_order') == 0)
		{
			$data['display_order'] = 9999;
		}
		else
		{
			$data['display_order'] = $this->input->post('display_order');
		}
		
		$errors = array();
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->images_path,
			'overwrite' => TRUE,
			'max_size' => 0
		);
		
		$this->load->library('upload', $config);
		$this->load->library('image_lib');
		
		if(!empty($_FILES['userfile']['name']))
		{
		  if($this->upload->do_upload('userfile'))
		  {
			  $image_data = $this->upload->data();
			  
			  $config = array(
			  	'source_image' => $image_data['full_path'],
				'new_image' => $image_data['file_path'],
				'maintain_ratio' => TRUE,
				'height' => 1000,
				'width' => 30000
			  );
			  
			  $this->image_lib->initialize($config);
			  $this->image_lib->resize();
			  $this->image_lib->clear();
			  
			  list($width, $height, $type, $attr) = getimagesize($image_data['full_path']);
			  
			  $data['width'] = $width;
			  $data['height'] = $height;
		  }
		  
		  else
		  {
			  $errors = $this->upload->display_errors();
		  }
		}
		
		if(!empty($_FILES['userfile_option']['name']))
		{
		  if($this->upload->do_upload('userfile_option'))
		  {
			  $image2_data = $this->upload->data();
			  if($this->input->post('options') != '1')
			  {
				$config = array(
				  'source_image' => $image2_data['full_path'],
				  'new_image' => $image2_data['file_path'],
				  'maintain_ratio' => TRUE,
				  'height' => 1000,
				  'width' => 30000
				);
				
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();
			  }
		  }
		  else
		  {
			  $errors = $this->upload->display_errors();
		  }
		}
		
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->images_path.'/thumbs',
			'create_thumb' => TRUE,
			'maintain_ratio' => TRUE,
			'width' => 150,
			'height' => 150
		);
		
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
		
		$image_url = base_url();
		
		$data['location_path'] = $image_url.'images/'.$image_data['file_name'];
		
		$thumb_data = array(
			'thumb_path' => $image_url.'images/thumbs/'.$image_data['file_name']
		);
		
		if(!empty($image2_data))
		{
			$config['source_image'] = $image2_data['full_path'];
			$config['new_image'] = $this->images_path.'/thumbs';
			$config['maintain_ratio'] = true;
			$config['width'] = 150;
			$config['height'] = 150;
			
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$data['options'] = $this->input->post('options');
			$data['options_path'] = $image_url.'images/'.$image2_data['file_name'];
			$thumb_data['options'] = true;
			$thumb_data['options_thumb_path'] = $image_url.'images/thumbs/'.$image2_data['file_name'];
		}
		else
		{
			$data['options'] = 0;
			$data['options_path'] = 'none';
			$thumb_data['options'] = false;
			$thumb_data['options_thumb_path'] = 'none';
		}
		
		$this->db->insert('images', $data);
		
		$this->db->order_by('id', 'desc');
		$q = $this->db->get('images', 1);
		
		foreach($q->result() as $row){
		$thumb_data['image_id'] = $row->id;
		}
		
		$this->db->insert('thumbs', $thumb_data);
		
		return $errors;
	}
	
	function update()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'comment' => $this->input->post('comment'),
			'front_page' => $this->input->post('front_page')
		);
		
		if($this->input->post('display_order') == 9999 || $this->input->post('display_order') == 0)
		{
			$data['display_order'] = 9999;
		}
		else
		{
			$data['display_order'] = $this->input->post('display_order');
		}
		
		if($this->input->post('options'))
		{
			$data['options'] = $this->input->post('options');
		}
		
		if($this->input->post('category'))
		{
			$data['category'] = $this->input->post('category');
		}
		
		if($this->input->post('sub_category'))
		{
			$data['sub_category'] = $this->input->post('sub_category');
		}
		
		if(!empty($_FILES['userfile_zoom']['name']))
		{
			$errors = array();
			$config = array(
				'allowed_types' => 'jpg|jpeg|gif|png',
				'upload_path' => $this->images_path
			);
			
			$this->load->library('upload', $config);
			
			if($this->upload->do_upload('userfile_zoom'))
			{
				$image2_data = $this->upload->data();
			}
			else
			{
				$errors = $this->upload->display_errors();
			}
			
			$image_data = $this->upload->data();
			
			$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->images_path.'/thumbs',
			'maintain_ratio' => TRUE,
			'create_thumb' => TRUE,
			'width' => 150,
			'height' => 150
			);
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			$image_url = base_url();
			
			$data['options'] = $this->input->post('options');
			$data['options_path'] = $image_url.'images/'.$image_data['file_name'];
			
			$thumb_data = array(
				'options' => $this->input->post('options'),
				'options_thumb_path' =>$image_url.'images/thumbs/'.$image_data['file_name']
			);
			
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('images', $data);
			
			$this->db->where('image_id', $this->input->post('id'));
			$this->db->update('thumbs', $thumb_data);
		}//end of upload

		$this->db->where('id', $this->input->post('id'));
		
		$this->db->update('images', $data);
		
		
	}//end function update
	
	function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('images');
		$this->db->where('image_id', $this->input->post('id'));
		$this->db->delete('thumbs');
	}
	
	function get_thumbs($selection = 'photography')
	{
		
		$this->db->select('*');
		$this->db->from('thumbs');
		$this->db->join('images', 'images.id = thumbs.image_id');
		$this->db->where('category', $selection);
		
		$q = $this->db->get();
		
		return $q->result();
	}
	function get_images($category, $subcategory)
	{
		$this->db->order_by('display_order', 'asc');
		$q = $this->db->get_where('images', array('category' => $category, 'sub_category' => $subcategory));
		
		return $q->result();
	}
	
	function get_images_by_id($id)
	{
		$q = $this->db->get_where('images', array('id' => $id));
		
		return $q->result();
	}
	
	function get_photostrip_width($category, $subcategory)
	{
		$this->db->order_by('display_order', 'asc');
		$q = $this->db->get_where('images', array('category' => $category, 'sub_category' => $subcategory));
		$w = 0;
		
		foreach($q->result() as $result)
		{
			$w += $result->width + 10;
		}
		
		$w += 100;
		
		return $w;
	}
}