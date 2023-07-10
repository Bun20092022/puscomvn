<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/service/posts';

		$this->post_type = $this->uri->segment(5);
		$this->view_post_type = $this->Model_backend->view_full_service($this->post_type);
 		$this->post_type_id = $this->view_post_type['id'];

		$this->template_type_id = 2;

	}

	public function main($post_type)
	{

		$data['list_posts'] = $this->Model_backend->get_post_type_id('qh_posts',$this->post_type_id);
		$data['title'] = 'Danh sách '.$this->view_post_type['name_type'];
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	public function status($post_type,$status)
	{
		$check_status = array(
			'post_status' => $status,
			'post_type_id' => $this->post_type_id,
		);
		$data['list_posts'] = $this->Model_backend->get_where('qh_posts',$check_status);

		$data['id_status'] = $status;
		$data['title'] = 'Danh sách '.$this->view_post_type['name_type'];
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	public function add($post_type)
	{
		if(isset($_POST['add'])) {
			// Lấy các thông tin Seo thêm vào CSDL
 			include 'application/controllers/backend/service/variable/seo_add.php';
			
			$url = 'url_'.$this->language_main;
			$post_category_id = [];
			if($_POST['post_category_id'] == null) {
				array_push($post_category_id,$_POST['post_category_id_ze']);
			}else{
				$post_category_id = $_POST['post_category_id'];
			}
			$post_tags_id = [];
			if($_POST['post_tags_id'] != null) {
				$post_tags_id = $_POST['post_tags_id'];
			}
			$thongtin = array(
				'name' => json_encode($name),
				 $url =>  trim($_POST[$url]),
				'title' => json_encode($title),
				'description' => json_encode($description),
				'keywords' => json_encode($keywords),
				'imgwebsite' => json_encode($imgwebsite),
				'imgsocial' => json_encode($imgsocial),
				'content' => json_encode($content),
				'post_templates_id' => $_POST['post_templates_id'],
				'post_category_id' => json_encode($post_category_id),
				'post_category_id_ze' => $_POST['post_category_id_ze'],
				'post_tags_id' => json_encode($post_tags_id),
				'post_status' => $_POST['post_status'],
				'post_comment' => $_POST['post_comment'],
				'post_date' => strtotime($_POST['post_date']),
				'post_type_id' => $this->post_type_id,
				'post_website' => $this->id_website,
			);
			 $result = $this->Model_backend->insert('qh_posts',$thongtin);
				// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
			$checkisset = array(
				$url => $_POST[$url],
			);
			$listisset = $this->Model_backend->show_by('qh_posts',$checkisset);
			if(count($listisset) > 1){
				$url_new = $_POST[$url].'-'.$result;
				$updateurl = array(
					$url => $url_new,
				);
				$this->db->where('id', $result);
				$this->db->update('qh_posts', $updateurl);
			}

			// Nếu là sản phẩm thì thêm 1 trường nữa vào danh mục sản phẩm
			if($this->post_type_id == 2 && isset($result)){
				// Lấy các thông tin Seo thêm vào CSDL
 				include 'application/controllers/backend/service/variable/info_product_add.php';
				$info_product = array(
					'code_product' =>  $_POST['code_product'],
					'price' =>  json_encode($price),
					'price_product' =>  json_encode($price_product),
					'price_event' =>  json_encode($price_event),
					'stock' =>  $_POST['stock'],
					'color' =>  json_encode($color),
					'size' =>  json_encode($size),
					'nhaphanphoi' =>  json_encode($nhaphanphoi),
					'id_product' =>  $result,
				);
				$this->Model_backend->insert('qh_posts_product',$info_product);
			}
			// Kiểm tra điều hướng chức năng
			if($_POST['add'] == 'category'){
				redirect('backend/service/category/add_post/'.$this->post_type.'/'.$lang.'/'.$id);
			}if($_POST['add'] == 'extend'){
				redirect('backend/service/posts_extend/add/'.$id);
			}elseif($_POST['add'] == 'tags'){
				redirect('backend/service/tags/add_post/'.$this->post_type.'/'.$lang.'/'.$id);
			}elseif($_POST['add'] == 'update_all_close'){
				redirect('backend/service/posts/status/'.$this->post_type.'/'.$_POST['post_status']);
			}elseif($_POST['add'] == 'add_img_product'){
				redirect('backend/service/product/main/post/'.$result);
			}elseif($_POST['add'] == 'code_product'){
				redirect('backend/service/posts_setup/add_post/30/'.$lang.'/'.$result);
			}
		}
		$data['title'] = 'Chỉnh sửa '.$this->view_post_type['name_type'];
		$data['list_tags'] = $this->Model_backend->get_post_type_id('qh_post_tag',$this->post_type_id);
		$data['list_templates'] =  $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type_id);
		$check_category = array(
 			'post_website' => $this->id_website,
 			'father_id' => 0,
 			'post_type_id' => $this->post_type_id,
 		);
 		$data['list_category'] = $this->Model_backend->get_where('qh_post_category',$check_category);
 		$data['list_color'] = $this->Model_backend->get_product_setup(1);
 		$data['list_size'] = $this->Model_backend->get_product_setup(2);
 		$data['list_nhaphanphoi'] = $this->Model_backend->get_product_setup(3);
 		$data['list_code_product'] = $this->Model_backend->get_product_setup(30);
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function update($post_type,$lang,$id){
		if(isset($_POST['add'])) {
			$view_category = $this->Model_backend->view_id('qh_posts',$id);
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
				'post_templates_id' => $_POST['post_templates_id'],
				'post_category_id' => json_encode($_POST['post_category_id']),
				'post_category_id_ze' => $_POST['post_category_id_ze'],
				'post_tags_id' => json_encode($_POST['post_tags_id']),
				'post_status' => $_POST['post_status'],
				'post_comment' => $_POST['post_comment'],
				'post_date' => strtotime($_POST['post_date']),
			);
			 $result = $this->Model_backend->update('qh_posts',$thongtin,$id);
				// Kiểm tra url vừa thêm nếu tồn tại trùng thì thêm id vào sau url
			$checkisset = array(
				$url => $_POST[$url],
			);
			$listisset = $this->Model_backend->show_by('qh_posts',$checkisset);
			if(count($listisset) > 1){
				$url_new = $_POST[$url].'-'.$id;
				$updateurl = array(
					$url => $url_new,
				);
				$this->db->where('id', $id);
				$this->db->update('qh_posts', $updateurl);
			}
			// Kiểm tra điều hướng chức năng
			if($_POST['add'] == 'category'){
				redirect('backend/service/category/add_post/'.$this->post_type.'/'.$lang.'/'.$id);
			}elseif($_POST['add'] == 'extend'){
				redirect('backend/service/posts_extend/add/'.$id);
			}elseif($_POST['add'] == 'tags'){
				redirect('backend/service/tags/add_post/'.$this->post_type.'/'.$lang.'/'.$id);
			}elseif($_POST['add'] == 'update_all_close'){
				redirect('backend/service/posts/status/'.$this->post_type.'/'.$_POST['post_status']);
			}elseif($_POST['add'] == 'color'){
				redirect('backend/service/posts_setup/add_post/1/'.$result);
			}
		}
		
		$data['language'] = $lang;
		$data['id_posts'] = $id;
		$data['view'] = $this->Model_backend->view_id('qh_posts',$id);
		$data['title'] = 'Chỉnh sửa '.$this->view_post_type['name_type'];
		$data['list_tags'] = $this->Model_backend->get_post_type_id('qh_post_tag',$this->post_type_id);
		$data['list_templates'] =  $this->Model_backend->show_all_by_template_type($this->post_type_id,$this->template_type_id);
		$check_category = array(
 			'post_website' => $this->id_website,
 			'father_id' => 0,
 			'post_type_id' => $this->post_type_id,
 		);
 		$data['list_category'] = $this->Model_backend->get_where('qh_post_category',$check_category);
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function tamdung($post_type,$id_posts,$id_status)
	{
		$thongtin = array(
			'post_status' => 3,
		);
		$this->Model_backend->update('qh_posts',$thongtin,$id_posts);
		redirect($this->folder.'/status/'.$this->post_type.'/'.$id_status);		
	}
	public function kichhoat($post_type,$id_posts,$id_status)
	{
		$thongtin = array(
			'post_status' => 2,
		);
		$this->Model_backend->update('qh_posts',$thongtin,$id_posts);
		redirect($this->folder.'/status/'.$this->post_type.'/'.$id_status);		
	}
	public function delete($post_type,$id,$id_status){
		$this->Model_backend->delete('qh_posts',$id);
		$this->Model_backend->delete_posts('qh_posts_extend',$id);
		$this->Model_backend->delete_posts('qh_post_img',$id);
		$this->db->where('id_product', $id);
		$this->db->delete('qh_posts_product');
		redirect($this->folder.'/status/'.$this->post_type.'/'.$id_status);
	}
}
