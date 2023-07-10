<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Space extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/main/extend/space';
		$this->extend = 55;
	}

	public function add($id_posts)
	{
		if(isset($_POST['add_code'])){
			$list = $this->Model_backend->get_fill('qh_posts_extend','id_posts',$id_posts);
			$add_text = array(
				'name' => 'Khoảng trống '.$_POST['height_object'].'px',
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
		if(isset($_POST['update_code'])){
			$view = $this->Model_backend->view_id('qh_posts_extend',$id);
			$update_code = array(
				'name' => 'Khoảng trống '.$_POST['height_object'].'px',
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
