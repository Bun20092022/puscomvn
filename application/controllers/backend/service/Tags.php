 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Tags extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/service/tags';

 		$this->post_type = $this->uri->segment(5);
 		$this->post_type_id = $this->Model_backend->view_id_service($this->post_type);

 		$this->template_type = 3;
 	}

 	public function main($post_type)
 	{
 		$data['list_category'] = $this->db->select('*')->from('qh_post_tag')->where('post_type_id',$this->post_type_id)->get()->result_array();
 		$data['title'] = 'Danh sách tags'.' '.$this->id_language;
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}
 	public function add_post($lang,$id_post)
 	{
 		if (isset($_POST['add'])) {
 			
 			
 			$url = 'url_'.$lang;
 			$thongtin = array(
 				'name' => json_encode($name),
 				$url =>  trim($_POST[$url]),
 				'title' => json_encode($title),
 				'description' => json_encode($description),
 				'keywords' => json_encode($keywords),
 				'imgwebsite' => json_encode($imgwebsite),
 				'imgsocial' => json_encode($imgsocial),
 				'content' => json_encode($content),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_website' => $this->id_website,
 				'post_status' => $_POST['post_status'],
 				'post_type_id' => $this->post_type_id,
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->insert('qh_post_tag',$thongtin);
			// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_tag',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$result;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $result);
 				$this->db->update('qh_post_tag', $updateurl);
 			}
 			// Thêm id category vừa tạo vào mảng bài viết
 			$view_posts = $this->Model_backend->view_id('qh_posts',$id_post);
 			$post_tags_id = json_decode($view_posts['post_tags_id']);
 			if(!in_array($result,$post_tags_id)){
 				array_push($post_tags_id, $result);
 			}
 			$update_posts = array( 'post_tags_id' => json_encode($post_tags_id), );
 			$this->Model_backend->update('qh_posts',$update_posts,$id_post);
			// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect('backend/service/posts/update/'.$lang.'/'.$id_post);		
 		}
 		$data['list_templates'] = $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);

 		$data['title'] = 'Thêm tags mới';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	public function add()
 	{
 		if (isset($_POST['add'])) {
 			// Lấy các thông tin Seo thêm vào CSDL
 			include 'application/controllers/backend/service/variable/seo_add.php';
 			

 			// Lấy danh sách các tags cùng cấp để đếm số thứ tự
 			$url = 'url_'.$this->language_main;
 			$thongtin = array(
 				'name' => json_encode($name),
 				$url =>  trim($_POST[$url]),
 				'title' => json_encode($title),
 				'description' => json_encode($description),
 				'keywords' => json_encode($keywords),
 				'imgwebsite' => json_encode($imgwebsite),
 				'imgsocial' => json_encode($imgsocial),
 				'content' => json_encode($content),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_website' => $this->id_website,
 				'post_status' => $_POST['post_status'],
 				'post_type_id' => $this->post_type_id,
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->insert('qh_post_tag',$thongtin);
			// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_tag',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$result;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $result);
 				$this->db->update('qh_post_tag', $updateurl);
 			}
			// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect($this->folder.'/main/'.$this->post_type);		
 		}
 		$data['list_templates'] = $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);

 		$data['title'] = 'Thêm tags mới';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	
 	public function update($lang,$id){
 		if (isset($_POST['edit'])) {
 			$view_category = $this->Model_backend->view_id('qh_post_tag',$id);
 			// Lấy các thông tin Seo thêm vào CSDL
 			include 'application/controllers/backend/service/variable/seo_update.php';
 			
 			$url = 'url_'.$lang;
 			$thongtin = array(
 				'name' => json_encode($name),
 				$url =>  trim($_POST[$url]),
 				'title' => json_encode($title),
 				'description' => json_encode($description),
 				'keywords' => json_encode($keywords),
 				'imgwebsite' => json_encode($imgwebsite),
 				'imgsocial' => json_encode($imgsocial),
 				'content' => json_encode($content),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_status' => $_POST['post_status'],
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->update('qh_post_tag',$thongtin,$id);
				// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_tag',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$id;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $id);
 				$this->db->update('qh_post_tag', $updateurl);
 			}
			// Kết thúc kiểm tra url
				// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect($this->folder.'/main/'.$this->post_type);
 		}
 		$data['language'] = $lang;
 		$data['list_templates'] =  $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);
 		$data['view'] = $this->Model_backend->view_id('qh_post_tag',$id);
 		
 		$data['title'] = 'Chỉnh sửa tags'.' '.$this->id_language;
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}
 	public function pause($id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 3,
 		);
 		$this->Model_backend->update('qh_post_tag',$thongtin,$id_posts);
 		redirect($this->folder.'/main/'.$this->post_type);		
 	}
 	public function active($id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 2,
 		);
 		$this->Model_backend->update('qh_post_tag',$thongtin,$id_posts);
 		redirect($this->folder.'/main/'.$this->post_type);		
 	}
 	public function delete($id){
		// Lấy toàn bộ thông tin bảng qh_posts
 		$list_all_post = $this->Model_backend->get_all('qh_posts');
		// Nếu tồn tại trong bảng dữ liệu Post thì không được xóa
 		$id_isset = 'no_isset';
 		foreach ($list_all_post as $value) {
 			$listcategory = json_decode($value['post_category_id']);
 			if(in_array($id, $listcategory)){
 				$id_isset = 'isset';
 			}
 		}
 		if($id_isset == 'isset'){
 			$dataresult = array('error' => 'ok','messenger' => 'Tồn tại dữ liệu con. Bạn vui lòng xóa dữ liệu con trước khi thực hiện',);
 		}else
 		{
 			$this->Model_backend->delete('qh_post_tag',$id);
 		}
 		$this->session->set_flashdata($dataresult);
 		redirect($this->folder.'/main/'.$this->post_type);
 	}
 }
