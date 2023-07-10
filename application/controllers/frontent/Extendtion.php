<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller{
		public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function banner()
	{
		$data['template'] = 'frontent/extendtion/v_banner';
	}
}