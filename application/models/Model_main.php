<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$website = $this->session->userdata('ss_website');
		if(isset($website)){
			$this->id_website = $website['id_website'];
		}else{
			$this->id_website = 1;
		}
	}
	// Lấy độc lập khi đã list
	public function get_name($array,$language){
		$get_name = json_decode($array);
		echo $get_name->{$language};
	}
	public function get_url_post($post_category_id_ze,$url_post,$language){
		$view_category = $this->db->select('*')->from('qh_post_category')->where('id',$post_category_id_ze)->get()->row_array();
		$url = $language.'/'.$view_category['url_'.$language].'/'.$url_post;
		echo $url;
	}

	public function count_post_in_category($id_category)
	{
		$list_father = array(
			'post_category_id_ze' => $id_category,
			'post_status' => 2,
		);
		$list = $this->db->select('id')->from('qh_posts')->where($list_father)->get()->result_array();
		if(0 < count($list) && count($list) < 10){
			$count = '0'.count($list);
		}else{
			$count = count($list);
		}
		echo $count;
	}
	
	public function get_image_category_id($id,$language)
	{
		$view = $this->db->select('imgwebsite')->from('qh_post_category')->where('id',$id)->get()->row_array();
		$name = json_decode($view['imgwebsite']);
		echo $name->{$language};
	}
	public function view_id($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
        return $query->row_array();
	}


	public function get_all($table){
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_all_by_service($table,$id_service){
		$this->db->select('*');
		$this->db->where('post_type_id', $id_service);
		$this->db->where('post_website', $this->id_website);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($table);
        return $query->result_array();
	}
	public function get_lang($array,$language)
	{
		$lang = json_decode($array);
		echo $lang->{$language};
	}
	public function get_lang_main($array,$language_main)
	{
		$lang = json_decode($array);
		echo $lang->{$language_main};
	}
	public function get_lang_symtem($array,$language,$language_main)
	{
		$lang = json_decode($array);
		if(strlen($lang->{$language}) < 6){
			echo $lang->{$language_main};
		}else{
			echo $lang->{$language};
		}
	}
	public function get_name_post_id($id_post,$language)
	{
		$view_post = $this->db->select('name')->from('qh_posts')->where('id',$id_post)->get()->row_array();
		$name_post = json_decode($view_post['name']);
		echo $name_post->{$language};
	}
	public function get_name_category_id($id_category,$language)
	{
		$view_post = $this->db->select('name')->from('qh_post_category')->where('id',$id_category)->get()->row_array();
		$name_post = json_decode($view_post['name']);
		echo $name_post->{$language};
	}
	// Lấy thông tin nội dung chưa đọc
	public function get_unread_info($table)
	{
		$list = $this->db->select('id')->from($table)->where('read_info',37)->get()->result_array();
		echo count($list);
	}
	public function get_unread($table)
	{
		$list = $this->db->select('id')->from($table)->where('read_info',37)->get()->result_array();
		return $list;
	}
	// Get father
	public function get_all_filter_id($table,$short){
		$this->db->select('*');
		$this->db->order_by('id', $short);
		$query = $this->db->get($table);
        return $query->result_array();
	}
	public function get_father_id($table,$id,$num){
		$this->db->select('*');
		$this->db->where('father_id', $id);
		$this->db->order_by('id', $num);
		$query = $this->db->get($table);
        return $query->result_array();
	}
	// View theo thuộc tính
	public function view_all_by_id($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
        return $query->row_array();
	}

	// View Setup Symtem
	public function get_fill($table,$fill,$id)
	{
		$view = $this->db->select($fill)->from($table)->where('id',$id)->get()->row_array();
		echo $view[$fill];
	}
	public function get_fill_setup($fill,$id)
	{
		$view = $this->db->select($fill)->from('qh_setup')->where('id',$id)->get()->row_array();
		echo $view[$fill];
	}
	public function get_fill_symtem($fill,$id)
	{
		$view = $this->db->select($fill)->from('qh_system_template_setup')->where('id',$id)->get()->row_array();
		echo $view[$fill];
	}
}
