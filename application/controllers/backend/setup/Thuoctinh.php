<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thuoctinh extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/thuoctinh';
		$this->load->model('backend/setup/Model_thuoctinh');
	}
	public function list($id)
	{
		$data['add'] = $this->folder.'/add/'.$id;
		$data['titleadd'] = "Tạo thuộc tính";
		$data['linkupdate'] = $this->folder.'/update/';
		$data['linkdelete'] = $this->folder.'/delete/';
		$data['linkhienthi'] = $this->folder.'/hienthi/';
		$data['title'] = 'Thuộc tính trang';
		$data['list'] = $this->Model_thuoctinh->show_all($id);
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
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
		$this->Model_thuoctinh->update($id,$thongtin);
		redirect($this->folder);
	}
	public function add($id)
	{
		if (isset($_POST['themthongtin'])) {
			$thongtin = array(
				'thuoctinh' => $_POST['thuoctinh'],
				'code' => $_POST['code'],
				'id_templategroup' => $id,
			);
			$this->Model_thuoctinh->add($thongtin);
			redirect($this->folder.'/list/'.$id);
		}
		$data['listfather'] = $this->Model_thuoctinh->loadfather(0);
		$data['title'] = 'Thêm thuộc tính';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function duyetthuoctinh($id)
	{
		$myfile = fopen("application/controllers/backend/trang/Danhsachtrang.php", "w");
		$txt = '"John1\n"';
	    fwrite($myfile, $txt);
	    fclose($myfile);
	    $data['title'] = 'Duyệt thuộc tính';
		$data['template'] = $this->folder.'/v_duyetthuoctinh';
		$this->load->view($this->main,$data);
	}
	public function update($id){
		if (isset($_POST['chinhsuathongtin'])) {
			$seo = array(
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'keywords' => $_POST['keywords'],
				'imgwebsite' => $_POST['imgwebsite'],
				'imgsocial' => $_POST['imgsocial'],
			);
			$thongtin = array(
				'name' => $_POST['name'],
				'url' => $_POST['url'],
				'father' => $_POST['father'],
				'seo' => json_encode($seo),
			);
			$this->Model_thuoctinh->update($id,$thongtin);
			redirect($this->folder);
		}
		$data['view'] = $this->Model_thuoctinh->viewid($id);
		$data['listfather'] = $this->Model_thuoctinh->loadfather(0);
		$data['title'] = 'Chỉnh sửa chuyên mục quản trị';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id,$id_thuoctinh){
				$thongbao = $this->Model_thuoctinh->delete($id);
				if($thongbao){
					$dulieutb = array(
						'error' => 'ok',
						'messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',
					);
					$this->session->set_flashdata($dulieutb);
				}else{
					$dulieutb = array(
						'access' => 'ok',
						'messenger' => 'Bạn xóa nội dung thành công!',
					);
					$this->session->set_flashdata($dulieutb);
				}
				redirect($this->folder.'/list/'.$id_thuoctinh,'refresh');
			}
}

/* End of file Chuyenmuc.php */
/* Location: ./application/controllers/backend/baiviet/Chuyenmuc.php */