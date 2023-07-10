<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_image extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/setup/get_image';
	}
	public function index()
	{
		if (isset($_POST['add'])) {
			$link_image = 'public/frontent/img/thiet-ke-website-';
			$thongtin = array(
				'link_image' => $link_image,
			);
			$id_link_image = $this->Model_backend->insert('qh_get_image',$thongtin);

			$link_image_news = $link_image.$id_link_image.'.jpg';
			$array_update = array(
				'link_image' => $link_image_news,
			);
			$this->Model_backend->update('qh_get_image',$array_update,$id_link_image);

			$image = file_get_contents($_POST['link_image']);
			file_put_contents($link_image_news, $image);

			redirect($this->folder.'/view/'.$id_link_image);
		}
		$data['title'] = 'Get Image';
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	public function view($id)
	{
		if (isset($_POST['add'])) {
			$link_image = 'public/frontent/img/thiet-ke-website-';
			$thongtin = array(
				'link_image' => $link_image,
			);
			$id_link_image = $this->Model_backend->insert('qh_get_image',$thongtin);

			$link_image_news = $link_image.$id_link_image.'.jpg';
			$array_update = array(
				'link_image' => $link_image_news,
			);
			$this->Model_backend->update('qh_get_image',$array_update,$id_link_image);

			$image = file_get_contents($_POST['link_image']);
			file_put_contents($link_image_news, $image);

			redirect($this->folder.'/view/'.$id_link_image);
		}

		$data['view'] = $this->Model_backend->view_id('qh_get_image',$id);
		$data['title'] = 'Thêm Image';
		$data['template'] = $this->folder.'/v_view';
		$this->load->view($this->main,$data);
	}

}

/* End of file Chuyenmuc.php */
/* Location: ./application/controllers/backend/baiviet/Chuyenmuc.php */