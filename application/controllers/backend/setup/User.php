<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->folder = 'backend/setup/user';
	}

	public function list($id_work)
	{
		// Lấy thống tin công việc user
		$view_work = $this->Model_backend->view_id('qh_setup',$id_work);
		$data['view_work'] = $this->Model_backend->view_id('qh_setup',$id_work);

		$data['link_add'] = $this->folder.'/add/'.$id_work;
		$data['title_add'] = 'Thêm '.$view_work['extend'];
		$data['title'] = 'Quản lý danh sách '.$view_work['extend'];

		// Lấy toàn bộ danh sách xe có trong bảng hệ thống
		$data['id_work'] = $id_work;
		$data['danhsachnhansu'] = $this->Model_backend->get_work('qh_user',$id_work);
		$data['template'] = $this->folder.'/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}
	public function add($id_work)
	{

		if (isset($_POST['add'])) {
			$thongtin = array(
				'name' => trim($_POST['name']),
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'manhansu' =>  $_POST['manhansu'],
				'phone' =>  $_POST['phone'],
				'ghichu' => trim($_POST['ghichu']),
				'work' => $id_work,
				'active' => 2,
				'dichuyen' => 2,
			);
			$this->Model_backend->insert('qh_user',$thongtin);
			redirect($this->folder.'/list/'.$id_work);		
		}
		// Lấy thống tin công việc user
		$view_work = $this->Model_backend->view_id('qh_setup',$id_work);
		$data['view_work'] = $this->Model_backend->view_id('qh_setup',$id_work);

		$data['link_add'] = $this->folder.'/add';
		$data['title_add'] = 'Thêm'.$view_work['extend'];
		$data['title'] = 'Thêm '.$view_work['extend'];

		// Lấy toàn bộ danh sách xe có trong bảng hệ thống
		$data['id_work'] = $id_work;
		$data['template'] = $this->folder.'/v_add';
		$this->load->view('backend/layout/v_main',$data);
	}
	public function update($id_work,$id_ns)
	{

		if (isset($_POST['update'])) {
			$thongtin = array(
				'name' => trim($_POST['name']),
				'password' => trim($_POST['password']),
				'manhansu' =>  $_POST['manhansu'],
				'phone' =>  $_POST['phone'],
				'ghichu' => trim($_POST['ghichu']),
			);
			$this->Model_backend->update('qh_user',$thongtin,$id_ns);
			redirect($this->folder.'/list/'.$id_work);		
		}
		// Lấy thống tin công việc user
		$view_work = $this->Model_backend->view_id('qh_setup',$id_work);
		$data['view_work'] = $this->Model_backend->view_id('qh_setup',$id_work);

		$data['link_add'] = $this->folder.'/add';
		$data['title_add'] = 'Thêm'.$view_work['extend'];
		$data['title'] = 'Thêm '.$view_work['extend'];

		// Lấy toàn bộ danh sách xe có trong bảng hệ thống
		$data['view_ns'] = $this->Model_backend->view_id('qh_user',$id_ns);
		$data['id_work'] = $id_work;
		$data['danhsachxe'] = $this->Model_backend->get_all('qh_danhsachxe');
		$data['template'] = $this->folder.'/v_update';
		$this->load->view('backend/layout/v_main',$data);
	}
	public function tamdung($id_work,$id_ns)
	{
			$thongtin = array(
				'active' => 3,
			);
			$this->Model_backend->update('qh_user',$thongtin,$id_ns);
			redirect($this->folder.'/list/'.$id_work);		
	}
	public function kichhoat($id_work,$id_ns)
	{
			$thongtin = array(
				'active' => 2,
				'xoa_user' => 1,
			);
			$this->Model_backend->update('qh_user',$thongtin,$id_ns);
			redirect($this->folder.'/list/'.$id_work);		
	}
	public function delete($id_work,$id_ns)
	{
			$thongtin = array(
				'xoa_user' => 0,
			);
			$this->Model_backend->update('qh_user',$thongtin,$id_ns);
			redirect($this->folder.'/list/'.$id_work);		
	}
}
