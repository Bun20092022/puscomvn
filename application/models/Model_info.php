<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_info extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$viewinfo = $this->db->select('*')->from('qh_website')->where('id',1)->get()->row_array();
		$this->info = json_decode($viewinfo['seo']);
	}
	public function get_title(){
		echo $this->info->{'title'};
	}
	public function get_description(){
		echo $this->info->{'description'};
	}
	public function get_keywords(){
		echo $this->info->{'keywords'};
	}
	public function get_imgsocial(){
		echo $this->info->{'imgsocial'};
	}
	public function get_favicon(){
		echo $this->info->{'favicon'};
	}
	public function get_logoheader(){
		echo $this->info->{'logo'};
	}
	public function get_logofooter(){
		echo $this->info->{'logofooter'};
	}
	public function get_motafooter(){
		echo $this->info->{'motafooter'};
	}
	public function get_phone(){
		echo $this->info->{'hotline'};
	}
	public function get_email(){
		echo $this->info->{'email'};
	}
	public function get_diachi(){
		echo $this->info->{'diachi'};
	}
	public function get_map(){
		echo $this->info->{'map'};
	}

	public function get_contact(){
		$view = $this->db->select('*')->from('qh_setup_extend')->where('id',3)->get()->row_array();
		echo $view['lang'];
	}
	
}
