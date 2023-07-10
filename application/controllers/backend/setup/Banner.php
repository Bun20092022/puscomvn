<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/banner';
		$this->load->model('backend/setup/Model_bannergroup');
		$this->load->model('backend/setup/Model_banner');
	}
	public function index()
	{
		$data['add'] = $this->folder.'/add';
		$data['titleadd'] = "Thêm group banner";
		$data['linkupdate'] = $this->folder.'/update/';
		$data['linkaddimg'] = $this->folder.'/listimg/';
		$data['linkhienthi'] = $this->folder.'/hienthi/';
		$data['listfather'] = $this->Model_bannergroup->show_all();
		$data['title'] = 'Danh sách nhóm banner';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	// Thêm ảnh trong Silder
	public function listimg($id)
	{
		$data['linkaddimg'] = $this->folder.'/listimg/';
		$data['listfather'] = $this->Model_bannergroup->show_all();
		$data['listslidergroup'] = $this->Model_banner->loadslidergroup($id);
		
		$data['id'] = $id;

		$data['add'] = $this->folder.'/addimg/'.$id;
		$data['titleadd'] = "Thêm ảnh Slider";
		$data['title'] = 'Danh sách ảnh trong banner';
		$data['template'] = $this->folder.'/v_listimg';
		$this->load->view($this->main,$data);
	}
	public function addimg($id_slidergroup)
	{
		if (isset($_POST['themthongtin'])) {
			$thongtin = array(
				'title' => $_POST['title'],
				'info' => $_POST['info'],
				'button_name' => $_POST['button_name'],
				'imgslider' => $_POST['imgslider'],
				'link' => $_POST['link'],
				'num' => $_POST['num'],
				'id_slidergroup' => $id_slidergroup,
			);
			$this->Model_banner->add($thongtin);
			redirect($this->folder.'/listimg/'.$id_slidergroup);
		}
		$data['title'] = 'Thêm ảnh banner';
		$data['template'] = $this->folder.'/v_addimg';
		$this->load->view($this->main,$data);
	}
	public function updateimg($id,$id_slidergroup){
		if (isset($_POST['chinhsuathongtin'])) {
			$thongtin = array(
				'title' => $_POST['title'],
				'info' => $_POST['info'],
				'button_name' => $_POST['button_name'],
				'imgslider' => $_POST['imgslider'],
				'link' => $_POST['link'],
				'num' => $_POST['num'],
				'id_slidergroup' => $id_slidergroup,
			);
			$this->Model_banner->update($id,$thongtin);
			redirect($this->folder.'/listimg/'.$id_slidergroup);
		}
		$data['view'] = $this->Model_banner->viewid($id);
		$data['title'] = 'Chỉnh sửa Silder';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	// Kết thúc phần hình ảnh
	public function hienthi($id,$public)
	{
		if($public == 1){
			$thongtin = array(
				'public' => 0,
			);
		}
		if($public == 0) {
			$thongtin = array(
				'public' => 1,
			);  
		}
		$this->Model_bannergroup->update($id,$thongtin);
		redirect($this->folder);
	}
	public function add()
	{
		if (isset($_POST['themthongtin'])) {
			$thongtin = array(
				'name' => $_POST['name'],
				'vitri' => $_POST['vitri'],
				'public' => 1,
			);
			$this->Model_bannergroup->add($thongtin);
			redirect($this->folder);
		}
		$data['title'] = 'Thêm nhóm banner';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function update($id){
		if (isset($_POST['chinhsuathongtin'])) {
			$thongtin = array(
				'name' => $_POST['name'],
				'vitri' => $_POST['vitri'],
			);
			$this->Model_bannergroup->update($id,$thongtin);
			redirect($this->folder);
		}
		$data['view'] = $this->Model_bannergroup->viewid($id);
		$data['title'] = 'Chỉnh sửa chuyên mục quản trị';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id,$id_slidergroup){
				$thongbao = $this->Model_banner->delete($id);
				if($thongbao){
					$dulieutb = array(
						'access' => 'ok',
						'messenger' => 'Bạn xóa nội dung thành công!',
					);
					$this->session->set_flashdata($dulieutb);
				}else{
					$dulieutb = array(
						'error' => 'ok',
						'messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',
					);
					$this->session->set_flashdata($dulieutb);
				}
				redirect($this->folder.'/listimg/'.$id_slidergroup,'refresh');
			}
}
