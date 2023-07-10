<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(isset($language)){
		 $this->id_language = $language['name_lang'];
		}else{
		 $this->id_language = 'vn';
		}
	}

	public function index()
	{
		$url_lang = $this->uri->segment(1);
		$url_category = $this->uri->segment(2);
		$url_post = $this->uri->segment(3);
		// Lấy url trong CSDL
		$url_check_category = 'url_'.$url_lang;
		$check_url_category = array(
			$url_check_category => $url_category,
		);
		$view_url_category = $this->db->select('*')->from('qh_post_category')->where($check_url_category)->get()->row_array();


		$data['view_url_category'] =$this->db->select('*')->from('qh_post_category')->where($check_url_category)->get()->row_array();
		
		// Lấy url post trong CSDL
		$url_check_post = 'url_'.$url_lang;
		$check_url_post = array(
			$url_check_post => $url_post,
		);
		$view_url_post = $this->db->select('*')->from('qh_posts')->where($check_url_post)->get()->row_array();
		// Lấy toàn bộ code trong file mở rộng để hiển thị đẹp
		
		$data['view_url_post'] =$this->db->select('*')->from('qh_posts')->where($check_url_post)->get()->row_array();

		// Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
		$data['list_post'] = $this->db->select('*')->from('qh_posts')->where('post_category_id_ze',$view_url_category['id'])->get()->result_array();
		$view_template = $this->Model_frontent->view_template($view_url_post['post_templates_id']);

		$title = json_decode($view_url_post['title']);
		$description = json_decode($view_url_post['description']);
		$keywords = json_decode($view_url_post['keywords']);
		$imgsocial = json_decode($view_url_post['imgsocial']);

		$data['url_vn'] = 'vn';
		$data['url_en'] = 'en';
		$data['url_jp'] = 'jp';
		$data['url_kr'] = 'kr';
		$data['url_ch'] = 'ch';
		$data['url_lg'] = 'lg';

		$data['title'] = $title->{$this->id_language};
		$data['description'] = $description->{$this->id_language};
		$data['keywords'] = $keywords->{$this->id_language};
		$data['imgsocial'] = $imgsocial->{$this->id_language};


		$data['template'] = $view_template['template_link'];
		$this->load->view('frontent/layout/v_main',$data);
	}

	public function video()
	{
		$url_lang = $this->uri->segment(1);
		$url_category = $this->uri->segment(2);
		$url_post = $this->uri->segment(3);
		$data['code_video'] = $this->uri->segment(4);
		// Lấy url trong CSDL
		$url_check_category = 'url_'.$url_lang;
		$check_url_category = array(
			$url_check_category => $url_category,
		);
		$view_url_category = $this->db->select('*')->from('qh_post_category')->where($check_url_category)->get()->row_array();


		$data['view_url_category'] =$this->db->select('*')->from('qh_post_category')->where($check_url_category)->get()->row_array();
		
		// Lấy url post trong CSDL
		$url_check_post = 'url_'.$url_lang;
		$check_url_post = array(
			$url_check_post => $url_post,
		);
		$view_url_post = $this->db->select('*')->from('qh_posts')->where($check_url_post)->get()->row_array();

		
		$data['view_url_post'] =$this->db->select('*')->from('qh_posts')->where($check_url_post)->get()->row_array();

		// Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
		$data['list_post'] = $this->db->select('*')->from('qh_posts')->where('post_category_id_ze',$view_url_category['id'])->get()->result_array();
		$view_template = $this->Model_frontent->view_template($view_url_post['post_templates_id']);
		$data['link_lang'] = 'en';
		$data['img_lang'] = 'https://glocalpartner.vn/public/img/flag-en.png';

		$title = json_decode($view_url_post['title']);
		$description = json_decode($view_url_post['description']);
		$keywords = json_decode($view_url_post['keywords']);
		$imgsocial = json_decode($view_url_post['imgsocial']);

		$data['title'] = $title->{$this->id_language};
		$data['description'] = $description->{$this->id_language};
		$data['keywords'] = $keywords->{$this->id_language};
		$data['imgsocial'] = $imgsocial->{$this->id_language};
		
		$data['template'] = $view_template['template_link'];
		$this->load->view('frontent/layout/v_main',$data);
	}

}
