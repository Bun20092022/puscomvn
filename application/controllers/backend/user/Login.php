<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->folder = 'backend/user/login';
	}
	public function index()
	{
		if(isset($_POST['login'])){
			$username    = $this->input->post('username');
			$password = $this->input->post('password');
			$select = array(
				'username' => $username,
				'password' => $password,
			);
			$list = $this->db->select('*')->from('qh_user')->where($select)->get()->result_array();
			$view = $this->db->select('*')->from('qh_user')->where($select)->get()->row_array();
			if(count($list) > 0){
				$userdata = array(
					'login'  => 'yes',
					'iduser'  => $view['id'],
		            'nameuser'  => $view['name'],
		        );
		    $this->session->set_userdata('userinfoone', $userdata);
			redirect('backend/main/dashboard');
			}else {
				$dataresult = array('error' => 'ok','messenger' => ' Tài khoản sai',);
				$this->session->set_flashdata($dataresult);
				redirect($this->folder);
			}
		}
		$this->load->view($this->folder.'/v_main');
	}
		public function logout()
		{
		  $this->session->unset_userdata('userinfoone');
		  redirect('backend/user/login');
		 }
}
