 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Category extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/service/category';

 		$this->post_type = $this->uri->segment(5);
		$this->view_post_type = $this->Model_backend->view_full_service($this->post_type);
 		$this->post_type_id = $this->view_post_type['id'];

 		$this->template_type = 1;
 	}

 	public function main($post_type)
 	{
 		$data['list_category'] = $this->Model_backend->show_all_by_father(0,$this->post_type_id);
 		$data['title'] = 'Chuyên mục'.' '.$this->view_post_type['name_type'];
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}
 	public function add_post($post_type,$lang,$id_post)
 	{
 		if (isset($_POST['add'])) {
 			// Lấy các thông tin Seo thêm vào CSDL
 			include 'application/controllers/backend/service/variable/seo_add.php';
 			
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
 				'father_id' => trim($_POST['father_id']),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_website' => $this->id_website,
 				'post_status' => $_POST['post_status'],
 				'posts_style' => 1,
 				'post_type_id' => $this->post_type_id,
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->insert('qh_post_category',$thongtin);
			// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_category',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$result;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $result);
 				$this->db->update('qh_post_category', $updateurl);
 			}
 			// Thêm id category vừa tạo vào mảng bài viết
 			$view_posts = $this->Model_backend->view_id('qh_posts',$id_post);
 			$post_category_id = json_decode($view_posts['post_category_id']);
 			if(!in_array($result,$post_category_id)){
 				array_push($post_category_id, $result);
 			}
 			$update_posts = array( 'post_category_id' => json_encode($post_category_id), );
 			$this->Model_backend->update('qh_posts',$update_posts,$id_post);
			// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect('backend/service/posts/update/'.$post_type.'/'.$lang.'/'.$id_post);		
 		}
 		$data['list_templates'] = $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);

 		$check_category = array(
 			'post_website' => $this->id_website,
 			'father_id' => 0,
 			'post_type_id' => $this->post_type_id,
 		);
 		$data['list_category'] = $this->Model_backend->get_where('qh_post_category',$check_category);

 		$data['title'] = 'Thêm chuyên mục '.$this->view_post_type['name_type'].' mới';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	public function add($post_type)
 	{
 		if (isset($_POST['add'])) {

 			// Lấy các thông tin Seo thêm vào CSDL
 			include 'application/controllers/backend/service/variable/seo_add.php';

 			// Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
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
 				'father_id' => trim($_POST['father_id']),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_website' => $this->id_website,
 				'post_status' => $_POST['post_status'],
 				'posts_style' => 1,
 				'post_type_id' => $this->post_type_id,
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->insert('qh_post_category',$thongtin);
			// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
			$url = 'url_'.$this->language_main;
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_category',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$result;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $result);
 				$this->db->update('qh_post_category', $updateurl);
 			}
			// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect($this->folder.'/main/'.$this->post_type);		
 		}
 		$data['list_templates'] = $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);

 		$check_category = array(
 			'post_website' => $this->id_website,
 			'father_id' => 0,
 			'post_type_id' => $this->post_type_id,
 		);
 		$data['list_category'] = $this->Model_backend->get_where('qh_post_category',$check_category);

 		$data['title'] = 'Thêm chuyên mục '.$this->view_post_type['name_type'].' mới';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	
 	public function update($post_type,$lang,$id){
 		if (isset($_POST['edit'])) {
 			$view_category = $this->Model_backend->view_id('qh_post_category',$id);

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
 				'father_id' => trim($_POST['father_id']),
 				'img_background' => json_encode($imgbackground),
 				'color_background' => $_POST['color_background'],
 				'color_text' => $_POST['color_text'],
 				'post_status' => $_POST['post_status'],
 				'post_templates_id' => $_POST['post_templates_id'],
 			);
 			$result = $this->Model_backend->update('qh_post_category',$thongtin,$id);
				// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
 			$checkisset = array(
 				$url => $_POST[$url],
 			);
 			$listisset = $this->Model_backend->show_by('qh_post_category',$checkisset);
 			if(count($listisset) > 1){
 				$url_new = $_POST[$url].'-'.$id;
 				$updateurl = array(
 					$url => $url_new,
 				);
 				$this->db->where('id', $id);
 				$this->db->update('qh_post_category', $updateurl);
 			}
			// Kết thúc kiểm tra url
			// Kết thúc thông báo để quay trở lại màn hình chính
 			redirect($this->folder.'/main/'.$this->post_type);
 		}
 		$data['language'] = $lang;
 		$data['list_templates'] =  $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type);
 		$data['view'] = $this->Model_backend->view_id('qh_post_category',$id);
 		$check_category = array(
 			'post_website' => $this->id_website,
 			'father_id' => 0,
 			'post_type_id' => $this->post_type_id,
 		);
 		$data['list_category'] = $this->Model_backend->get_where('qh_post_category',$check_category);
 		
 		$data['title'] = 'Chỉnh sửa chuyên mục '.$this->view_post_type['name_type'];
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}
 	public function pause($post_type,$id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 3,
 		);
 		$this->Model_backend->update('qh_post_category',$thongtin,$id_posts);
 		redirect($this->folder.'/main/'.$this->post_type);		
 	}
 	public function active($post_type,$id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 2,
 		);
 		$this->Model_backend->update('qh_post_category',$thongtin,$id_posts);
 		redirect($this->folder.'/main/'.$this->post_type);		
 	}
 	public function delete($post_type,$id){
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
 			$this->Model_backend->delete('qh_post_category',$id);
 		}
 		$this->session->set_flashdata($dataresult);
 		redirect($this->folder.'/main/'.$this->post_type);
 	}
 }
