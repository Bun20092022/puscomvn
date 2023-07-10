<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demowebsite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}
	public function view($id_extend)
	{
		$data['view_extend'] = $this->Model_main->view_id('qh_posts_extend',$id_extend);
		$this->load->view('frontent/demowebsite/v_main', $data, FALSE);
	}

}

/* End of file Demowebsite.php */
/* Location: ./application/controllers/Demowebsite.php */