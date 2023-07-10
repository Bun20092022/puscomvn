 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/general/social';
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
		$data['title_add'] = "Thêm social quản lý";
		$data['website'] = '';
		$data['link_copy'] = $this->folder.'/copy/';
		$data['link_update'] = $this->folder.'/update/';
		$data['link_delete'] = $this->folder.'/delete/';

		$data['active_sub'] = 4;
		$data['list'] = $this->Model_backend->show_all('qh_setup_social');
		$data['title'] = 'Danh sách social quản lý';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}

	public function add()
	{
		if (isset($_POST['add'])) {
				$info = array(
					'name_social' => trim($_POST['name_social']),
					'link_socical' => trim($_POST['link_socical']),
					'class_social' => trim($_POST['class_social']),
					'num_social' => trim($_POST['num_social']),
				);
				$this->Model_backend->insert('qh_setup_social', $info);
				redirect($this->folder);		
			}

		$data['active_sub'] = 4;
		$data['title'] = 'Danh sách social quản lý';
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
				$this->Model_backend->update('qh_setup_social', $info,$id);
				redirect($this->folder);
		}

		$data['active_sub'] = 4;
		$data['id'] = $id;
		$data['view'] = $this->Model_backend->view_id('qh_setup_social',$id);
		$data['title'] = 'Chỉnh sửa social';
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id){
		$this->Model_backend->delete('qh_setup_social',$id);
		redirect($this->folder);
	}
}
