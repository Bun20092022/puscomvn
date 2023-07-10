 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Language extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/general/language';
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
 		$data['titleadd'] = "Thêm website quản lý";
 		$data['website'] = '';
 		$data['link_copy'] = $this->folder.'/copy/';
 		$data['link_update'] = $this->folder.'/update/';
 		$data['link_delete'] = $this->folder.'/delete/';

 		$data['active_sub'] = 2;
 		$data['list'] = $this->Model_backend->show_all('qh_setup_language');
 		$data['title'] = 'Danh sách Website quản lý';
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}

 	public function update($id){
 		if (isset($_POST['edit'])) {
 			$id = $_POST['id'];
 			$info = array(
 				'name' => trim($_POST['name']),
 				'public' => trim($_POST['public']),
 				'link_img' => trim($_POST['link_img']),
 			);
 			$this->Model_backend->update('qh_setup_language', $info,$id);
 			redirect($this->folder);
 		}

 		$data['active_sub'] = 2;
 		$data['id'] = $id;
 		$data['view'] = $this->Model_backend->view_id('qh_setup_language',$id);
 		$data['title'] = 'Chỉnh sửa ngôn ngữ';
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}

 	public function lang_main($id)
 	{
 		$view_lang = $this->Model_backend->view_id('qh_setup_language',$id);
 		if($view_lang['public'] != 1){
 			$dataresult = array('error' => 'ok','messenger' => 'Ngôn ngữ không hoạt động không thể chọn chuyên mục chính!',);
 			$this->session->set_flashdata($dataresult);
 		}else{
	 		$list_lang = $this->Model_backend->get_all('qh_setup_language');
	 		foreach ($list_lang as $value) {
	 			$update_lang = array(
	 				'lang_main' => 0,
	 			);
	 			$this->Model_backend->update('qh_setup_language',$update_lang,$value['id']); 
	 		}

	 		$update_lang_main = array(
	 				'lang_main' => 1,
	 			);
	 		$this->Model_backend->update('qh_setup_language',$update_lang_main,$id);
 		}
 		redirect($this->folder);
 	}
 	public function pause($id)
	{
		$thongtin = array(
			'public' => 0,
		);
		$this->Model_backend->update('qh_setup_language',$thongtin,$id);
		redirect($this->folder);		
	}
	public function active($id)
	{
		$thongtin = array(
			'public' => 1,
		);
		$this->Model_backend->update('qh_setup_language',$thongtin,$id);
		redirect($this->folder);		
	}
 }
