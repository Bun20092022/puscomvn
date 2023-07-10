<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errorweb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$language = $this->session->userdata('ss_languagew');
		if(isset($language)){
		 $this->id_language = $language['name_lang'];
		}else{
		 $this->id_language = 'vn';
		}
		$this->load->library("cart");
	}

	public function index()
	{
		$data['link_lang'] = 'en';
		$data['img_lang'] = 'https://glocalpartner.vn/public/img/flag-en.png';
		// Lấy mã giao diện chính của hệ thống
		$layoutmain = $this->Model_frontent->view_id('qh_post_template',19);
		$data['title'] = 'Error Website';
		$data['description'] = 'Error Website';
		$data['keywords'] = 'Error Website';
		$data['imgsocial'] = '';
		$data['template'] = 'frontent/layout/v_404';
		$this->load->view('frontent/layout/v_main',$data);
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */