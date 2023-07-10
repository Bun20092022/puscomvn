 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/general/website';
		$website = $this->session->userdata('ss_website');
		if(isset($website)){
			$this->id_website = $website['id_website'];
		}else{
			$this->id_website = 1;
		}
	}

	public function index()
	{
		$data['link_add'] = $this->folder.'/add';
		$data['title_add'] = "Thêm website quản lý";
		$data['website'] = '';
		$data['link_copy'] = $this->folder.'/copy/';
		$data['link_update'] = $this->folder.'/update/';
		$data['link_delete'] = $this->folder.'/delete/';

		$data['active_sub'] = 1;
		$data['list'] = $this->Model_backend->show_all('qh_website');
		$data['title'] = 'Danh sách Website quản lý';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}

	public function add()
	{
		if (isset($_POST['add'])) {
				$seo = array(
					'title' => '',
					'logo' => '',
					'url' => '',
					'description' => '',
					'keywords' => '',
					'favicon' => '',
					'imgsocial' => '',
					'imggoogle' => '',
				);
				$info = array(
					'website' => trim($_POST['website']),
					'seo' => json_encode($seo),
				);
				$this->Model_backend->insert('qh_website', $info);
				redirect($this->folder);		
			}

		$data['active_sub'] = 1;
		$data['title'] = 'Danh sách Website quản lý';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function update($id){
		if (isset($_POST['edit'])) {
				$id = $_POST['id'];
				$seo = array(
					'title' => '',
					'logo' => '',
					'url' => '',
					'description' => '',
					'keywords' => '',
					'favicon' => '',
					'imgsocial' => '',
					'imggoogle' => '',
				);
				$info = array(
					'website' => trim($_POST['website']),
					'seo' => json_encode($seo),
				);
				$this->Model_backend->update('qh_website', $info,$id);
				redirect($this->folder);
		}

		$data['active_sub'] = 1;
		$data['id'] = $id;
		$data['view'] = $this->Model_backend->view_id('qh_website',$id);
		$data['title'] = 'Chỉnh sửa chuyên mục';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id){
		// Lấy toàn bộ thông tin bảng qh_posts
		$info = array(
			'post_website' => $id,
		);
		$list_all_post = $this->Model_backend->show_by('qh_posts',$info);
		
		if(count($list_all_post) > 0){
			$dataresult = array('error' => 'ok','messenger' => 'Tồn tại dữ liệu con. Bạn vui lòng xóa dữ liệu con trước khi thực hiện',);
			$this->session->set_flashdata($dataresult);
		}else{
			// Nếu không tồn tại thì bắt đầu được xóa
			$this->Model_backend->delete('qh_website',$id);
		}
			redirect($this->folder);
	}
}
