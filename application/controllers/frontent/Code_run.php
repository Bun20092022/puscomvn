<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_run extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function view($code)
	{
		if(isset($_POST['run'])){
			$view_code_run = $this->db->select('*')->from('qh_run_code')->where('code_run',$code)->get()->row_array();
			$update = array(
				'text_run' => $_POST['text_run'],
			);			
			$this->db->where('id', $view_code_run['id']);
			$this->db->update('qh_run_code', $update);
		}
		$data['view_code_run'] = $this->db->select('*')->from('qh_run_code')->where('code_run',$code)->get()->row_array();
		$this->load->view('frontent/code_run/v_main', $data);
	}
	public function show_code()
	{
		$code_run = auto_string(40);
		$update = array(
			'text_run' => '',
			'code_run' => $code_run,
			'id_post_extend' => 0,
			'date_creat' => strtotime(date('d-m-Y H:i:s')),

		);
		$this->db->insert('qh_run_code', $update);
		redirect('coderun-'.$code_run,'refresh');
	}
	public function add($id_posts_extend)
	{
		$code_run = auto_string(40);
		$view_post_extend = $this->Model_frontent->view_id('qh_posts_extend',$id_posts_extend);
		$update = array(
			'text_run' => $view_post_extend['text'],
			'code_run' => $code_run,
			'id_post_extend' => $id_posts_extend,
			'date_creat' => strtotime(date('d-m-Y H:i:s')),

		);
		$this->db->insert('qh_run_code', $update);
		redirect('coderun-'.$code_run,'refresh');
	}
	public function show($code)
	{
		$data['view_code_run'] = $this->db->select('*')->from('qh_run_code')->where('code_run',$code)->get()->row_array();
		$this->load->view('frontent/code_run/v_show', $data);
	}
}

/* End of file Code_run.php */
/* Location: ./application/controllers/Code_run.php */