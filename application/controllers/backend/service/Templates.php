<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/service/templates';

		$this->post_type = $this->uri->segment(5);
		$this->view_post_type = $this->Model_backend->view_full_service($this->post_type);
 		$this->post_type_id = $this->view_post_type['id'];

		$website = $this->session->userdata('ss_website');
		if(isset($website)){
			$this->id_website = $website['id_website'];
		}else{
			$this->id_website = 1;
		}
	}

	public function list($post_type,$template_type)
	{
		$data['add'] = $this->folder.'/add';
		$data['titleadd'] = "Tạo bài viết";
		$data['website'] = '';
		$data['linkcopy'] = $this->folder.'/copy/';
		$data['linkupdate'] = $this->folder.'/update/';
		$data['linkdelete'] = $this->folder.'/delete/';
		$data['template_type'] = $template_type;

		$check_template_type = array(
			'post_type_id' => $this->post_type_id,
			'template_type_id' => $template_type,
			'post_website' => $this->id_website,
		);
		$data['list_templates'] = $this->Model_backend->get_where('qh_post_template',$check_template_type);
		$data['title'] = 'Danh sách thẻ templates';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}

	public function add($post_type,$template_type)
	{
		if (isset($_POST['add'])) {
			$name = trim($_POST['name']);
			$template_type = trim($_POST['template_type']);
			$thongtin = array(
				'name' => trim($_POST['name']),
				'post_type_id' => $this->post_type_id,
				'template_type_id' => $template_type,
				'post_website' => $this->id_website,
			);
			$result = $this->Model_backend->insert('qh_post_template',$thongtin);

			if($template_type == 1){
				$templatetype = 'category';
			}elseif($template_type == 2){
				$templatetype = 'post';
			}else{
				$templatetype = 'tags';
			}
			// Tạo file template trong thư mục
			$url_save = 'frontent/service/'.$this->view_post_type['uri'].'_'.$templatetype.'_'.$result.'.php';
			$url_file = 'application/views/frontent/service/'.$this->view_post_type['uri'].'_'.$templatetype.'_'.$result.'.php';
			$myfile = fopen($url_file, "w+");
				// Kết thúc tạo
			if($result){
						// Trả ngược file vừa tạo về database
				$data_url_file = array('template_link' => $url_save,);
				$this->Model_backend->update('qh_post_template',$data_url_file,$result); 

				redirect($this->folder.'/list/'.$this->post_type.'/'.$template_type);
			}
		}
		$data['template_type'] = $template_type;
		$data['title'] = 'Thêm thẻ templates mới';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function update($post_type,$id,$template_type){
		if (isset($_POST['edit'])) {
			$name = trim($_POST['name']);
			$codefile = trim($_POST['codefile']);
			$template_type = trim($_POST['template_type']);
			$thongtin = array(
				'name' => trim($_POST['name']),
			);
			$result = $this->Model_backend->update('qh_post_template',$thongtin,$id);
			if($result){
				$dataresult = array('error' => 'ok','messenger' => 'Nội dung chưa được chỉnh sửa vào cở sở dữ liệu!',);
			}else{
				$view = $this->Model_backend->view_id('qh_post_template',$id);
				$myFile = 'application/views/'.$view['template_link'];
				$fh = fopen($myFile, 'w+');
				fwrite($fh,$codefile);
				fclose($fh);
				$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa ['.$name.'] thành công!',);
				$this->session->set_flashdata($dataresult);
				$this->session->set_flashdata($dataresult);
			}
			redirect($this->folder.'/list/'.$this->post_type.'/'.$template_type);
		}
		$data['template_type'] = $template_type;
		$data['view'] = $this->Model_backend->view_id('qh_post_template',$id);
		$data['title'] = 'Chỉnh sửa thẻ templates';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function keyselect($post_type,$id,$template_type){
		$list_key = array(
			'post_type_id' => $this->post_type_id,
			'template_type_id' => $template_type,
			'post_website' => $this->id_website,
		);
		$list_key_select = $this->Model_backend->get_where('qh_post_template',$list_key);
		foreach ($list_key_select as $value) {
			$keyselect = array(
				'keyselect' => 0,
			);
			$this->Model_backend->update('qh_post_template',$keyselect,$value['id']);
		}

		$keyselect = array(
			'keyselect' => 1,
		);
		$this->Model_backend->update('qh_post_template',$keyselect,$id);
		redirect($this->folder.'/list/'.$this->post_type.'/'.$template_type);
	}
	public function delete($post_type,$id,$template_type){
		// Lấy toàn bộ thông tin bảng qh_posts
		$check_template_type = array('post_templates_id' => $id);
		$list_all_post_by_template = $this->Model_backend->get_where('qh_posts',$check_template_type);
		// Nếu tồn tại trong bảng dữ liệu Post thì không được xóa
		if(count($list_all_post_by_template) > 0){
			$dataresult = array('error' => 'ok','messenger' => 'Tồn tại dữ liệu con. Bạn vui lòng xóa dữ liệu con trước khi thực hiện',);
		}else
		{
			// Nếu không tồn tại thì bắt đầu được xóa
			$view = $this->Model_backend->view_id('qh_post_template',$id);
			unlink('application/views/'.$view['template_link']);
			$this->Model_backend->delete('qh_post_template',$id);
		}
		$this->session->set_flashdata($dataresult);
		redirect($this->folder.'/list/'.$this->post_type.'/'.$template_type);
		
	}
}
