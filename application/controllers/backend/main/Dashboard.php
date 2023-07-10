<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/main/dashboard';
	}

	public function index()
	{
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main, $data, FALSE);
	}

}
