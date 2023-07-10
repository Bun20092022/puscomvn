<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}
	public function add($id_extend)
	{
		$view_extend = $this->Model_backend->view_id('qh_posts_extend',$id_extend);

		$array_post = array(
			'id_posts' => $view_extend['id_posts'],
		);

		$list_post_extend = $this->Model_backend->get_where('qh_posts_extend',$array_post);
		foreach ($list_post_extend as $value) {
			$update_extend = array(
				'main_post' => 0,
			);
		$this->Model_backend->update('qh_posts_extend',$update_extend,$value['id']);
		}

		$update_extend_main = array(
			'main_post' => 1,
		);
		$this->Model_backend->update('qh_posts_extend',$update_extend_main,$id_extend);

		// Update demo code vào bảng post chính
		$update_post_main = array(
			'main_post' => $id_extend,
		);
		$this->Model_backend->update('qh_posts',$update_post_main,$view_extend['id_posts']);
		redirect('/backend/news/posts_extend/add/'.$view_extend['id_posts'],'refresh');
	}
	public function delete($id_extend)
	{
		$view_extend = $this->Model_backend->view_id('qh_posts_extend',$id_extend);

		$array_post = array(
			'id_posts' => $view_extend['id_posts'],
		);

		$list_post_extend = $this->Model_backend->get_where('qh_posts_extend',$array_post);
		foreach ($list_post_extend as $value) {
			$update_extend = array(
				'main_post' => 0,
			);
		$this->Model_backend->update('qh_posts_extend',$update_extend,$value['id']);
		}

		// Update demo code vào bảng post chính
		$update_post_main = array(
			'main_post' => 0,
		);
		$this->Model_backend->update('qh_posts',$update_post_main,$view_extend['id_posts']);
		redirect('/backend/news/posts_extend/add/'.$view_extend['id_posts'],'refresh');
	}

}

/* End of file Main_post.php */
/* Location: ./application/controllers/Main_post.php */