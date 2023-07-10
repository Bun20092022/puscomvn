<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->folder = '';
		$info = $this->session->userdata('userinfoone');
		$this->id_nhanvien = $info['iduser'];
	}

	public function index()
	{
		if (isset($_POST['update'])) {
				$thongtin = array(
					'name' => trim($_POST['name']),
					'bophan' => trim($_POST['bophan']),
					'phone' => trim($_POST['phone']),
					'password' =>  trim($_POST['password']),
				);
				$this->Model_backend->update('qh_user',$thongtin,$this->id_nhanvien);
				redirect('backend/user/profile');		
			}
		$data['view_user'] = $this->Model_main->view_all_by_id('qh_user',$this->id_nhanvien);

		$data['title'] = 'Profile';
		$data['template'] = 'backend/user/profile/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

}
