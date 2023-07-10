<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_frontent extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->id_language = $this->session->userdata('ss_languagew');
		if(isset($this->id_language)){
		   $this->id_language = $this->id_language['name_lang'];
		}else{
		   $this->id_language = 'vn';
		}
	}
	// Lấy thuộc tính hiển thị của nội dung
	public function show_all($table){
		$this->db->select('*');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	// Lấy thuộc tính hiển thị của nội dung
	public function show_all_posts(){
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('qh_posts');
		return $query->result_array();
	}
	public function load_by_post_id($post_id){
		$this->db->select('*');
		$this->db->where('posts_id', $post_id);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_posts_file');
		return $query->result_array();
	}
	public function get_where_asc($table,$fiel,$info){
		$this->db->select('*');
		$this->db->where($fiel, $info);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function load_by_father($table,$id_father){
		$this->db->select('*');
		$this->db->where('father_id', $id_father);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function view_id($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
		return $query->row_array();
	}
	public function view_url($table,$url)
	{
		$this->db->select('*');
		$this->db->where('url', $url);
		$query = $this->db->get($table);
		return $query->row_array();
	}
	public function view_template($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('qh_post_template');
		return $query->row_array();
	}
	public function show_banner_by($id){
		$this->db->select('*');
		$this->db->where('id_slidergroup', $id);
		$query = $this->db->get('qh_banner');
		return $query->result_array();
	}
	public function show_tags_by($post_type_id){
		$this->db->select('*');
		$this->db->where('post_type_id', $post_type_id);
		$query = $this->db->get('qh_post_tags');
		return $query->result_array();
	}
	public function show_news_category_by($id_news_category){
		$this->db->select('*');
		$this->db->where('father_id', $id_news_category);
		$this->db->where('post_type_id', 1);
		$query = $this->db->get('qh_post_category');
		return $query->result_array();
	}
	public function show_course_category_by($id_news_category){
		$this->db->select('*');
		$this->db->where('father_id', $id_news_category);
		$this->db->where('post_type_id', 2);
		$query = $this->db->get('qh_post_category');
		return $query->result_array();
	}
	public function view_category($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('qh_post_category');
		return $query->row_array();
	}

	// Lấy danh sách Menu
	public function list_menu($id_father){
		$this->db->select('*');
		$this->db->where('father_id', $id_father);
		$this->db->where('post_status', 2);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_post_category');
		return $query->result_array();
	}
	// Lấy danh sách Menu
	public function get_all_post_asc(){
		$this->db->select('*');
		$this->db->where('post_status', 2);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('qh_posts');
		return $query->result_array();
	}
	public function get_all_post_desc(){
		$this->db->select('*');
		$this->db->where('post_status', 2);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('qh_posts');
		return $query->result_array();
	}

	// Lấy danh sách menu theo từng loại
	public function list_menu_group($id_father,$id_menu_group){
		$this->db->select('*');
		$this->db->where('father_id', $id_father);
		$this->db->where('id_menu_group', $id_menu_group);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_setup_menu');
		return $query->result_array();
	}

	// Lấy tên danh mục
	public function check_name_menu($id_menu){
		// Lấy tags lỗi nếu đã xóa
		$name_tags =  json_encode(array('vn' => '<span style="color:red">Dữ liệu đã xóa</span>'));
		// View menu theo ID
		$view_menu = $this->db->select('*')->from('qh_setup_menu')->where('id',$id_menu)->get()->row_array();
		// Kiểm tra nếu là bài viết thì lấy tên theo bài viết
		if($view_menu['posts_style'] == 30){
			$view_posts = $this->db->select('*')->from('qh_posts')->where('id',$view_menu['id_posts'])->get()->row_array();
			if(isset($view_posts)){ $name = json_decode($view_posts['name']); }else{ $name = json_decode($name_tags); }
			// Nếu là danh mục thì lấy danh mục
		}elseif($view_menu['posts_style'] == 29){
			$view_category = $this->db->select('*')->from('qh_post_category')->where('id',$view_menu['id_category'])->get()->row_array();
			if(isset($view_category)){ $name = json_decode($view_category['name']); }else{ $name = json_decode($name_tags); }
			// Nếu là liên kết ngoài thì lấy liên kết ngoài
		}elseif($view_menu['posts_style'] == 31){
			$view_lang = $this->Model_backend->view_id('qh_setup_extend',$view_menu['id_name_out']);
			if(isset($view_lang)){ $name = json_decode($view_lang['lang']); }else{ $name = json_decode($name_tags); }
		}else{
			$name = json_decode($name_tags); 
		}
		return $name;
	}

	// Lấy url danh mục
	public function check_url_menu($id_menu){
		// Lấy tags lỗi nếu đã xóa
		$name_tags =  json_encode(array('vn' => '<span style="color:red">Dữ liệu đã xóa</span>'));
		// View menu theo ID
		$view_menu = $this->db->select('*')->from('qh_setup_menu')->where('id',$id_menu)->get()->row_array();
		// Kiểm tra nếu là bài viết thì lấy tên theo bài viết
		if($view_menu['posts_style'] == 30){
			$view_posts = $this->db->select('*')->from('qh_posts')->where('id',$view_menu['id_posts'])->get()->row_array();
			if(isset($view_posts)){
			 $view_category = $this->db->select('*')->from('qh_post_category')->where('id',$view_posts['post_category_id_ze'])->get()->row_array();
			 $url = base_url().$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$view_posts['url_'.$this->id_language];
			}else{ $url = 'error'; }
			// Nếu là danh mục thì lấy danh mục
		}elseif($view_menu['posts_style'] == 29){
			$view_category = $this->db->select('*')->from('qh_post_category')->where('id',$view_menu['id_category'])->get()->row_array();
			if(isset($view_category)){ $url = base_url().$this->id_language.'/'.$view_category['url_'.$this->id_language]; }else{ $url = 'error'; }
			// Nếu là liên kết ngoài thì lấy liên kết ngoài
		}elseif($view_menu['posts_style'] == 31){
			$view_lang = $this->Model_backend->view_id('qh_setup_extend',$view_menu['id_name_out']);
			if(strlen($view_menu['link_out']) < 10){ $url = 'javacript:void(0)'; }else{ $url = $view_menu['link_out']; }
		}else{
			$url = json_decode($name_tags); 
		}
		return $url;
	}
}
