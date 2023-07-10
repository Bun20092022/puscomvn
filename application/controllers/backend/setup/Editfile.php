<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfile extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/editfile';
	}
	public function index()
	{
		$data['list'] = $this->Model_backend->get_all('qh_setup_editfile');
		$data['title'] = 'Chỉnh sửa File';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	// Thêm ảnh trong Silder
	public function list($id)
	{

		if (isset($_POST['edit'])) {
			$codefile = trim($_POST['codefile']);
			$view = $this->Model_backend->view_id('qh_setup_editfile',$id);
			$myFile = $view['link_file'];
			$fh = fopen($myFile, 'w+');
			fwrite($fh,$codefile);
			fclose($fh);
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa thành công!',);
			$this->session->set_flashdata($dataresult);
			redirect('backend/setup/editfile/list/'.$id);
		}

		$data['list'] = $this->Model_backend->get_all('qh_setup_editfile');

		$data['view'] = $this->Model_backend->view_id('qh_setup_editfile',$id);
		$data['id'] = $id;
		$data['title'] = 'Chỉnh sửa File';
		$data['template'] = $this->folder.'/v_list';
		$this->load->view($this->main,$data);
	}
}
