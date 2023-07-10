<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Huongdan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function list($url)
	{
		$view_url = $this->db->select('*')->from('qh_document')->where('url',$url)->get()->row_array();
		$data['list_document'] = $this->db->select('*')->from('qh_document_extend')->where('id_document',$view_url['id'])->order_by('num','asc')->get()->result_array();
		$data['view_document'] = $this->db->select('*')->from('qh_document_extend')->where('id_document',$view_url['id'])->order_by('num','asc')->get()->row_array();

		$data['url'] = $url;
		$this->load->view('frontent/huongdan/v_main',$data);
	}
	public function view($url,$url_document)
	{
		$view_url = $this->db->select('*')->from('qh_document')->where('url',$url)->get()->row_array();
		$data['list_document'] = $this->db->select('*')->from('qh_document_extend')->where('id_document',$view_url['id'])->order_by('num','asc')->get()->result_array();

		$data['view_document'] = $this->db->select('*')->from('qh_document_extend')->where('url',$url_document)->get()->row_array();

		$data['url'] = $url;
		$this->load->view('frontent/huongdan/v_main',$data);
	}
}

/* End of file Huongdan.php */
/* Location: ./application/controllers/Huongdan.php */