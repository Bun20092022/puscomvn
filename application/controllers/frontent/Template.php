<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function url()
	{
		$url_template = $this->uri->segment(2);
		$data['view_template'] = $this->db->select('*')->from('qh_posts_demo')->where('url',$url_template)->get()->row_array();
		$view_template = $this->db->select('*')->from('qh_posts_demo')->where('url',$url_template)->get()->row_array();

		$this->Model_frontent->view_posts('qh_posts_demo',$view_template['id']);
		$this->load->view('frontent/template/v_main',$data);
	}

}

/* End of file Template.php */
/* Location: ./application/controllers/Template.php */