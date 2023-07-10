<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/template';
		$this->load->model('backend/setup/Model_template');
	}
	public function index()
	{
		$data['add'] = $this->folder.'/add';
		$data['titleadd'] = "Tạo chuyên mục";
		$data['linkupdate'] = $this->folder.'/update/';
		$data['linkdelete'] = $this->folder.'/delete/';
		$data['linkhienthi'] = $this->folder.'/hienthi/';
		$data['title'] = 'Giao diện trang';
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
		$this->Model_template->update($id,$thongtin);
		redirect('backend/baiviet/chuyenmuc');
	}
	public function add()
	{
		if (isset($_POST['themthongtin'])) {
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
				'public' => 1,
			);
			$this->Model_template->add($thongtin);
			redirect('backend/baiviet/chuyenmuc');
		}
		$data['listfather'] = $this->Model_template->loadfather(0);
		$data['title'] = 'Thêm chuyên mục quản trị';
		$data['template'] = $this->folder.'/v_add';
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
			$this->Model_template->update($id,$thongtin);
			redirect('backend/baiviet/chuyenmuc');
		}
		$data['view'] = $this->Model_template->viewid($id);
		$data['listfather'] = $this->Model_template->loadfather(0);
		$data['title'] = 'Chỉnh sửa chuyên mục quản trị';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id,$father){
          if($father != 0){
			$thongbao = $this->Model_template->delete($id);
			if($thongbao){
				$dulieutb = array(
					'error' => 'ok',
					'messenger' => 'Dữ liệu chưa được thêm vào cơ sở dữ liệu vui lòng thử lại.',
				);
				$this->session->set_flashdata($dulieutb);
			}else{
				$dulieutb = array(
					'access' => 'ok',
					'messenger' => 'Bạn đã xóa dữ liệu thành công!',
				);
				$this->session->set_flashdata($dulieutb);	                        
			}
			redirect('backend/baiviet/chuyenmuc','refresh');
		}else{
			$listsub = $this->Model_template->loadfather($id);
			if(count($listsub) > 0 ){
				$dulieutb = array(
					'error' => 'ok',
					'messenger' => 'Có dữ liệu con bạn không thể xóa.',
				);
				$this->session->set_flashdata($dulieutb);
				redirect($this->folder,'refresh');
			}else{
				$thongbao = $this->Model_template->delete($id);
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
				redirect($this->folder,'refresh');
			}
		}
	}

}

/* End of file Chuyenmuc.php */
/* Location: ./application/controllers/backend/baiviet/Chuyenmuc.php */