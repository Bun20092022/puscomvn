<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maină extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'frontent/layout/v_main';
	}

	public function index()
	{
		$userdata = array(
			'name_lang'  => 'vn',
		);
		$this->session->set_userdata('ss_languagew', $userdata);

		$data['link_lang'] = 'en';
		$data['img_lang'] = 'https://glocalpartner.vn/public/img/flag-en.png';
		$data['template'] = 'frontent/layout/v_home';
 		$this->load->view('frontent/layout/v_main',$data);
	}

	public function vn(){
		$userdata = array(
			'name_lang'  => 'vn',
		);
		$this->session->set_userdata('ss_languagew', $userdata);

		$data['link_lang'] = 'en';
		$data['img_lang'] = 'https://glocalpartner.vn/public/img/flag-en.png';

		$data['template'] = 'frontent/layout/v_home';
		$this->load->view('frontent/layout/v_main',$data);
	}
	public function en(){
		$userdata = array(
			'name_lang'  => 'en',
		);
		$this->session->set_userdata('ss_languagew', $userdata);

		$data['link_lang'] = 'vn';
		$data['img_lang'] = 'https://glocalpartner.vn/public/img/flag-vn.png';

		$data['template'] = 'frontent/layout/v_home';
		$this->load->view('frontent/layout/v_main',$data);
	}
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */