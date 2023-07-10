<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_backend extends CI_Model {
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
	public function get_father_symtem_id($id){
		$this->db->select('*');
		$this->db->where('id_father_symtem', $id);
		$query = $this->db->get('qh_system_template_setup');
		return $query->result_array();
	}
	public function get_fill($table,$fill,$int_fill){
		$this->db->select('*');
		$this->db->where($fill, $int_fill);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	// Get Setup
	public function get_setup_extend_id($id)
	{
		$view = $this->db->select('extend')->from('qh_setup')->where('id',$id)->get()->row_array();
		echo $view['extend'];
	}
	public function get_setup_class_id($id)
	{
		$view = $this->db->select('class')->from('qh_setup')->where('id',$id)->get()->row_array();
		echo $view['class'];
	}
	
	public function get_type($table,$type_id){
		$this->db->select('*');
		$this->db->where('post_type_id', $type_id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($table);
		return $query->result_array();
	}

	public function get_name_post_id($id_post)
	{
		$view_post = $this->db->select('name')->from('qh_posts')->where('id',$id_post)->get()->row_array();
		$name_post = json_decode($view_post['name']);
		echo $name_post->{'vn'};
	}
	public function get_post_type_id($table,$post_type_id){
		$this->db->select('*');
		$this->db->where('post_type_id', $post_type_id);
		$this->db->where('post_website', $this->id_website);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($table);
        return $query->result_array();
	}
	public function get_where($table,$where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('id','desc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function show_all_by_father($id,$post_type_id){
		$this->db->select('*');
		$this->db->where('father_id', $id);
		$this->db->where('post_type_id', $post_type_id);
		$query = $this->db->get('qh_post_category');
        return $query->result_array();
	}
	public function show_all_menu_by_father($id,$id_menu_group){
		$this->db->select('*');
		$this->db->where('father_id', $id);
		$this->db->where('id_menu_group', $id_menu_group);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_setup_menu');
        return $query->result_array();
	}
	public function get_template_post($table,$post_type_id){
		$this->db->select('*');
		$this->db->where('post_type_id', $post_type_id);
		$this->db->where('template_type_id', 1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_category_father($father_id,$post_type_id){
		$this->db->select('*');
		$this->db->where('father_id', $father_id);
		$this->db->where('post_type_id', $post_type_id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('qh_post_category');
		return $query->result_array();
	}
	public function get_all($table){
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_all_num($table){
		$this->db->select('*');
		$this->db->order_by('num', 'asc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_all_post_public(){
		$this->db->select('*');
		$this->db->where('post_status', 2);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('qh_posts');
		return $query->result_array();
	}
	public function get_all_asc($table){
		$this->db->select('*');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_product_setup($id_product_setup){
		$this->db->select('*');
		$this->db->where('father_id', $id_product_setup);
		$this->db->where('public', 1);
		$query = $this->db->get('qh_posts_product_setup');
		return $query->result_array();
	}
	public function get_work($table,$id_work){
		$this->db->select('*');
		$this->db->where('work', $id_work);
		$this->db->where('xoa_user', 1);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function show_all_by_template_type($post_type_id,$template_type_id){
		$this->db->select('*');
		$this->db->where('post_type_id', $post_type_id);
		$this->db->where('template_type_id', $template_type_id);
		$this->db->where('post_website', $this->id_website);
		$query = $this->db->get('qh_post_template');
        return $query->result_array();
	}
	// Lấy thuộc tính hiển thị của nội dung
	public function loadthuoctinh(){
		$this->db->select('*');
		$query = $this->db->get('qln_setupgroup');
        return $query->result_array();
	}
	public function loadfatherthuoctinh($id){
		$this->db->select('*');
		$this->db->where('father', $id);
		$query = $this->db->get('qln_setupgroup');
        return $query->result_array();
	}
	public function loadviewthuoctinh($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('qln_setupgroup');
        return $query->row_array();
	}
	public function get_symtem_id($id_symtem_template)
	{
		$this->db->select('*');
		$this->db->where('id_symtem_template',$id_symtem_template);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_system_template_extend');
        return $query->result_array();
	}
	public function get_symtem_frontent_id($id_symtem_template)
	{
		$this->db->select('*');
		$this->db->where('father_symtem',$id_symtem_template);
		$this->db->order_by('num', 'asc');
		$query = $this->db->get('qh_system_frontent_extend');
        return $query->result_array();
	}
	public function get_symtem($giatri,$id_symtem_template)
	{
		$this->db->select('id');
		$this->db->where('id_category', $giatri);
		$this->db->where('id_symtem_template',$id_symtem_template);
		$query = $this->db->get('qh_system_template_extend');
        return $query->result_array();
	}
	public function view_setup($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('qh_setup');
        return $query->row_array();
	}

	public function view_id($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
        return $query->row_array();
	}
	public function view_id_service($service)
	{
		$this->db->select('*');
		$this->db->where('uri', $service);
		$query = $this->db->get('qh_post_type');
        $view = $query->row_array();
        return $view['id'];
	}
	public function view_full_service($service)
	{
		$this->db->select('*');
		$this->db->where('uri', $service);
		$query = $this->db->get('qh_post_type');
        $view = $query->row_array();
        return $query->row_array();
	}
	public function show_all($table){
		$this->db->select('*');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function show_by($table,$array){
		$this->db->select('*');
		$this->db->where($array);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function insert($table,$info)
	{
		$result = $this->db->insert($table, $info);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'Thêm nội dung thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được thêm vào cơ sở dữ liệu vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function update($table,$info,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table, $info);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'chỉnh sửa nội dung thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được chỉnh sửa vào cơ sở dữ liệu vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function delete($table,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete($table);
		if($result){
				$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa nội dung thành công!',);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
			}
			$this->session->set_flashdata($dataresult);
	}
	public function delete_posts($table,$id_posts)
	{
		$this->db->where('id_posts', $id_posts);
		$result = $this->db->delete($table);
	}

}

/* End of file Model_backend.php */
/* Location: ./application/models/Model_backend.php */