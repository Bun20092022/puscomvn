<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_setup extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->date = strtotime(date('d-m-Y H:i:s'));
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/service/posts_setup';

		$this->post_type = 'product';
		$this->view_post_type = $this->Model_backend->view_full_service($this->post_type);
		$this->post_type_id = $this->view_post_type['id'];

		$website = $this->session->userdata('ss_website');
		if(isset($website)){
			$this->id_website = $website['id_website'];
		}else{
			$this->id_website = 1;
		}
	}

	public function list($id_posts_setup)
	{
		$data['add'] = $this->folder.'/add';
		$data['titleadd'] = "Tạo bài viết";
		$data['website'] = '';
		$data['linkcopy'] = $this->folder.'/copy/';
		$data['linkupdate'] = $this->folder.'/update/';
		$data['linkdelete'] = $this->folder.'/delete/';
		$data['id_posts_setup'] = $id_posts_setup;

		$check_posts_setup = array(
			'father_id' => $id_posts_setup,
		);
		$data['list_posts_setup'] = $this->Model_backend->get_where('qh_posts_product_setup',$check_posts_setup);

		$view_posts_setup = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['view_posts_setup'] = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['title'] = 'Danh sách '.$view_posts_setup['product_setup_group'];
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	public function add_post($id_posts_setup,$lang,$id_posts)
	{
		if (isset($_POST['add'])) {
			if($id_posts_setup == 1){
				$link_image = $_POST['link_image'];
				$product_color = $_POST['product_color'];
			}else{
				$link_image = '';
				$product_color = '';
			}
			if($_POST['name_vn']) {
				$name_vn = $_POST['name_vn'];
			}else{
				$name_vn = '';
			}
			if($_POST['name_en']) {
				$name_en = $_POST['name_en'];
			}else{
				$name_en = '';
			}
			if($_POST['name_jp']) {
				$name_jp = $_POST['name_jp'];
			}else{
				$name_jp = '';
			}
			if($_POST['name_kr']) {
				$name_kr = $_POST['name_kr'];
			}else{
				$name_kr = '';
			}
			if($_POST['name_ch']) {
				$name_ch = $_POST['name_ch'];
			}else{
				$name_ch = '';
			}
			if($_POST['name_lg']) {
				$name_lg = $_POST['name_lg'];
			}else{
				$name_lg = '';
			}
			$product_setup_extend = array(
				'vn' => $name_vn,
				'en' => $name_en,
				'jp' => $name_jp,
				'kr' => $name_kr,
				'ch' => $name_ch,
				'lg' => $name_lg,
			);
			$thongtin = array(
				'product_setup_extend' => json_encode($product_setup_extend),
				'link_image' => $link_image,
				'product_color' => $product_color,
				'father_id' => $id_posts_setup,
				'public' => 1,
			);
			$this->Model_backend->insert('qh_posts_product_setup',$thongtin);
			redirect('backend/service/posts/update/product/'.$lang.'/'.$id_post);
		}

		$view_posts_setup = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['view_posts_setup'] = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['id_posts_setup'] = $id_posts_setup;
		$data['title'] = 'Thêm '.$view_posts_setup['product_setup_group'].' mới';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function add($id_posts_setup)
	{
		if (isset($_POST['add'])) {
			if($id_posts_setup == 1){
				$link_image = $_POST['link_image'];
				$product_color = $_POST['product_color'];
			}else{
				$link_image = '';
				$product_color = '';
			}
			if($_POST['name_vn']) {
				$name_vn = $_POST['name_vn'];
			}else{
				$name_vn = '';
			}
			if($_POST['name_en']) {
				$name_en = $_POST['name_en'];
			}else{
				$name_en = '';
			}
			if($_POST['name_jp']) {
				$name_jp = $_POST['name_jp'];
			}else{
				$name_jp = '';
			}
			if($_POST['name_kr']) {
				$name_kr = $_POST['name_kr'];
			}else{
				$name_kr = '';
			}
			if($_POST['name_ch']) {
				$name_ch = $_POST['name_ch'];
			}else{
				$name_ch = '';
			}
			if($_POST['name_lg']) {
				$name_lg = $_POST['name_lg'];
			}else{
				$name_lg = '';
			}
			$product_setup_extend = array(
				'vn' => $name_vn,
				'en' => $name_en,
				'jp' => $name_jp,
				'kr' => $name_kr,
				'ch' => $name_ch,
				'lg' => $name_lg,
			);
			$thongtin = array(
				'product_setup_extend' => json_encode($product_setup_extend),
				'link_image' => $link_image,
				'product_color' => $product_color,
				'father_id' => $id_posts_setup,
				'public' => 1,
			);
			$this->Model_backend->insert('qh_posts_product_setup',$thongtin);
			redirect($this->folder.'/list/'.$id_posts_setup);
		}

		$view_posts_setup = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['view_posts_setup'] = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['id_posts_setup'] = $id_posts_setup;
		$data['title'] = 'Thêm '.$view_posts_setup['product_setup_group'].' mới';
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function update($id,$id_posts_setup){
		if (isset($_POST['edit'])) {
			if($id_posts_setup == 1){
				$link_image = $_POST['link_image'];
				$product_color = $_POST['product_color'];
			}else{
				$link_image = '';
				$product_color = '';
			}
			if($_POST['name_vn']) {
				$name_vn = $_POST['name_vn'];
			}else{
				$name_vn = '';
			}
			if($_POST['name_en']) {
				$name_en = $_POST['name_en'];
			}else{
				$name_en = '';
			}
			if($_POST['name_jp']) {
				$name_jp = $_POST['name_jp'];
			}else{
				$name_jp = '';
			}
			if($_POST['name_kr']) {
				$name_kr = $_POST['name_kr'];
			}else{
				$name_kr = '';
			}
			if($_POST['name_ch']) {
				$name_ch = $_POST['name_ch'];
			}else{
				$name_ch = '';
			}
			if($_POST['name_lg']) {
				$name_lg = $_POST['name_lg'];
			}else{
				$name_lg = '';
			}
			$product_setup_extend = array(
				'vn' => $name_vn,
				'en' => $name_en,
				'jp' => $name_jp,
				'kr' => $name_kr,
				'ch' => $name_ch,
				'lg' => $name_lg,
			);
			$thongtin = array(
				'product_setup_extend' => json_encode($product_setup_extend),
				'link_image' => $link_image,
				'product_color' => $product_color,
			);
			$result = $this->Model_backend->update('qh_posts_product_setup',$thongtin,$id);
			redirect($this->folder.'/list/'.$id_posts_setup);
		}
		$view_posts_setup = $this->Model_backend->view_id('qh_posts_product_setup',$id);
		$data['view_posts_setup'] = $this->Model_backend->view_id('qh_posts_product_setup',$id);
		$view_posts_setup_father = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['view_posts_setup_father'] = $this->Model_backend->view_id('qh_posts_product_setup',$id_posts_setup);
		$data['title'] = 'Chỉnh sửa '.$view_posts_setup_father['product_setup_group'];
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main,$data);
	}
	public function delete($id,$id_posts_setup){
		$this->Model_backend->delete('qh_posts_product_setup',$id);
		redirect($this->folder.'/list/'.$id_posts_setup);
		
	}
}
