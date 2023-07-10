 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Lang_menu extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/general/lang_menu';
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
 		$data['title_add'] = "Thêm ngôn ngữ";
 		$data['website'] = '';
 		$data['link_copy'] = $this->folder.'/copy/';
 		$data['link_update'] = $this->folder.'/update/';
 		$data['link_delete'] = $this->folder.'/delete/';

 		$data['active_sub'] = 7;

        $check_lang_menu = array(
            'lang_menu' => 1,
        );
 		$data['list'] = $this->Model_backend->get_where('qh_setup_extend',$check_lang_menu);
 		$data['title'] = 'Danh sách social quản lý';
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}

 	public function add()
 	{
 		if (isset($_POST['add'])) {
 			$lang_website = array(
 				'vn' => $_POST['name_vn'],
 				'en' => $_POST['name_en'],
 				'jp' => $_POST['name_jp'],
 				'kr' => $_POST['name_kr'],
 				'ch' => $_POST['name_ch'],
 				'lg' => $_POST['name_lg'],
 			);
 			$info = array(
                'lang' => json_encode($lang_website),
 				'name' => $_POST['name'],
                'lang_menu' => 1,
 			);
 			$this->Model_backend->insert('qh_setup_extend', $info);
 			redirect($this->folder);		
 		}

 		$data['active_sub'] = 7;
 		$data['title'] = 'Danh sách social quản lý';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	public function update($id){
 		if (isset($_POST['update'])) {
 			$lang_website = array(
 				'vn' => $_POST['name_vn'],
 				'en' => $_POST['name_en'],
 				'jp' => $_POST['name_jp'],
 				'kr' => $_POST['name_kr'],
 				'ch' => $_POST['name_ch'],
 				'lg' => $_POST['name_lg'],
 			);
 			$info = array(
 				'lang' => json_encode($lang_website),
                'name' => $_POST['name'],
 			);
 			$this->Model_backend->update('qh_setup_extend', $info,$id);
 			redirect($this->folder);
 		}

 		$data['active_sub'] = 7;
 		$data['id'] = $id;
 		$data['view'] = $this->Model_backend->view_id('qh_setup_extend',$id);
 		$data['title'] = 'Chỉnh sửa social';
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}
 	public function delete($id){
 		$this->Model_backend->delete('qh_setup_extend',$id);
 		redirect($this->folder);
 	}
 }
