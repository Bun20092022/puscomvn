<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(isset($language)){
		 $this->id_language = $language['name_lang'];
		}else{
		 $this->id_language = 'vn';
		}
		$this->load->library("cart");
	}

	public function index()
	{
		$data['template'] = 'frontent/layout/v_contact';
		$this->load->view('frontent/layout/v_main',$data);
	}

}
