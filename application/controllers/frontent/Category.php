<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$language = $this->session->userdata('ss_languagew');
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
		// Lấy url trong CSDL
		$url = 'url_'.$url_lang;
		$check_url = array(
			$url => $url_category,
		);

		$view_url = $this->db->select('*')->from('qh_post_category')->where($check_url)->get()->row_array();
		$data['view_url'] =$this->db->select('*')->from('qh_post_category')->where($check_url)->get()->row_array();
		

		// Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
		$data['list_post'] = $this->db->select('*')->from('qh_posts')->where('post_category_id_ze',$view_url['id'])->get()->result_array();
		$view_template = $this->Model_frontent->view_template($view_url['post_templates_id']);

		$title = json_decode($view_url['title']);
		$description = json_decode($view_url['description']);
		$keywords = json_decode($view_url['keywords']);
		$imgsocial = json_decode($view_url['imgsocial']);
		
		$data['url_vn'] = 'vn/'.$view_url['url_vn'];
		$data['url_en'] = 'en/'.$view_url['url_en'];
		$data['url_jp'] = 'jp/'.$view_url['url_jp'];
		$data['url_kr'] = 'kr/'.$view_url['url_kr'];
		$data['url_ch'] = 'ch/'.$view_url['url_ch'];
		$data['url_lg'] = 'lg/'.$view_url['url_lg'];

		$data['title'] = $title->{$this->id_language};
		$data['description'] = $description->{$this->id_language};
		$data['keywords'] = $keywords->{$this->id_language};
		$data['imgsocial'] = $imgsocial->{$this->id_language};

		$data['template'] = $view_template['template_link'];
		$this->load->view('frontent/layout/v_main',$data);
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */