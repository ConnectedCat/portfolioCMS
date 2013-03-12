<?php
class Zoom extends CI_Controller {
	function index(){
			
		switch($this->uri->segment(3))
		{
			case 29:
			$data['images_path'] = base_url().'images/fuss_masks';
			$data['prefix'] = 'fuss_masks_';
			$data['image_width'] = 28800;
			$data['image_height'] = 7200;
			break;
			case 58:
			$data['images_path'] = base_url().'images/Acconci';
			$data['prefix'] = 'Acconci_';
			$data['image_width'] = 12960;
			$data['image_height'] = 8640;
			break;
			case 59:
			$data['images_path'] = base_url().'images/Gustafson';
			$data['prefix'] = 'Gustafson_';
			$data['image_width'] = 8640;
			$data['image_height'] = 4320;
			break;
			case 60:
			$data['images_path'] = base_url().'images/Lazzarini';
			$data['prefix'] = 'Lazzarini_';
			$data['image_width'] = 23256;
			$data['image_height'] = 9360;
			break;
			case 61:
			$data['images_path'] = base_url().'images/Muniz';
			$data['prefix'] = 'Muniz_';
			$data['image_width'] = 14400;
			$data['image_height'] = 8640;
			break;
			case 62:
			$data['images_path'] = base_url().'images/Noble';
			$data['prefix'] = 'Noble_';
			$data['image_width'] = 14400;
			$data['image_height'] = 8640;
			break;
			case 63:
			$data['images_path'] = base_url().'images/Palimpsest';
			$data['prefix'] = 'Palimpsest_';
			$data['image_width'] = 28800;
			$data['image_height'] = 8640;
			break;
			case 64:
			$data['images_path'] = base_url().'images/Serengeti';
			$data['prefix'] = 'Serengeti_';
			$data['image_width'] = 18216;
			$data['image_height'] = 8640;
			break;
			case 65:
			$data['images_path'] = base_url().'images/Simmons';
			$data['prefix'] = 'Simmons_';
			$data['image_width'] = 14400;
			$data['image_height'] = 8640;
			break;
			case 66:
			$data['images_path'] = base_url().'images/Sunlight';
			$data['prefix'] = 'Sunlight_';
			$data['image_width'] = 18720;
			$data['image_height'] = 10800;
			break;
			case 67:
			$data['images_path'] = base_url().'images/TheLongPassage';
			$data['prefix'] = 'TheLongPassage_';
			$data['image_width'] = 28439;
			$data['image_height'] = 8424;
			break;
			case 68:
			$data['images_path'] = base_url().'images/Wrented';
			$data['prefix'] = 'Wrented_';
			$data['image_width'] = 11520;
			$data['image_height'] = 11520;
			break;
			case 69:
			$data['images_path'] = base_url().'images/Wright';
			$data['prefix'] = 'Wright_';
			$data['image_width'] = 14400;
			$data['image_height'] = 8640;
			break;
			case 70:
			$data['images_path'] = base_url().'images/SilentRhythm';
			$data['prefix'] = 'SilentRhythm_';
			$data['image_width'] = 17280;
			$data['image_height'] = 9360;
			break;
			default:
			return;
		}
		
		$this->load->view('content/zoom_view', $data);
	}
}