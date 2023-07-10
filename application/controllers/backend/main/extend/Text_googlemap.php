<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Text_googlemap extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/main/extend/text_googlemap';
		$this->extend = 54;
	}

	public function add($id_posts)
	{
		if(isset($_POST['add'])){
			$list = $this->Model_backend->get_fill('qh_posts_extend','id_posts',$id_posts);
			$text = array(
				'vn' => $_POST['text_vn'],
				'en' => $_POST['text_en'],
				'jp' => $_POST['text_jp'],
				'kr' => $_POST['text_kr'],
				'ch' => $_POST['text_ch'],
				'lg' => $_POST['text_lg'],
			);
			$add_text = array(
				'name' => $_POST['name'],
				'text' => json_encode($text),
				'link_img' => $_POST['link_img'],
				'height_object' => $_POST['height_object'],
				'id_posts' => $id_posts,
				'type_posts' => $this->extend,
				'post_status' => 2,
				'num' => count($list) + 1,
			);
			$this->Model_backend->insert('qh_posts_extend',$add_text);
			redirect('backend/news/posts_extend/add/'.$id_posts);
		}
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main, $data, FALSE);
	}
	public function update($id)
	{
		if(isset($_POST['update'])){
			$view = $this->Model_backend->view_id('qh_posts_extend',$id);
			$text = array(
				'vn' => $_POST['text_vn'],
				'en' => $_POST['text_en'],
				'jp' => $_POST['text_jp'],
				'kr' => $_POST['text_kr'],
				'ch' => $_POST['text_ch'],
				'lg' => $_POST['text_lg'],
			);
			$update_code = array(
				'name' => $_POST['name'],
				'text' => json_encode($text),
				'link_img' => $_POST['link_img'],
				'height_object' => $_POST['height_object'],
			);
			$this->Model_backend->update('qh_posts_extend',$update_code,$id);
			redirect('backend/news/posts_extend/add/'.$view['id_posts']);
		}
		
		$data['view'] = $this->Model_backend->view_id('qh_posts_extend',$id);
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main, $data, FALSE);
	}
}
