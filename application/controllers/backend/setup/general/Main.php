<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->load->model('backend/tongquan/Model_infowebsite');
		$website = $this->session->userdata('ss_website');
		if(isset($website)){
			$this->id_website = $website['id_website'];
		}else{
			$this->id_website = 1;
		}
	}
	public function infowebsite()
	{
		// Lấy ID thông tin Website
		$id = $this->id_website;
		if(isset($_POST['update'])){
			$dulieu = array(
				'title' => $this->input->post('title') ,
				'logo' => $this->input->post('logo') ,
				'logofooter' => $this->input->post('logofooter') ,
				'hotline' => $this->input->post('hotline') ,
				'email' => $this->input->post('email') ,
				'diachi' => $this->input->post('diachi') ,
				'url' => $this->input->post('url') ,
				'description' => $this->input->post('description'),
				'map' => $this->input->post('map'),
				'keywords' => $this->input->post('keywords') ,
				'favicon' => $this->input->post('favicon') ,
				'imgsocial' => $this->input->post('imgsocial') ,
				'imggoogle' => $this->input->post('imggoogle') ,
			);
			$dulieuup = array(
				'seo' => json_encode($dulieu),
			);
			$thongbao = $this->Model_infowebsite->update($id,$dulieuup);
			if($thongbao){
				$dulieutb = array(
					'error' => 'ok',
					'messenger' => 'Dữ liệu chưa được thêm vào cơ sở dữ liệu vui lòng thử lại.',
				);
				$this->session->set_flashdata($dulieutb);
				redirect('backend/setup/general/main/infowebsite','refresh');
			}else{
				$dulieutb = array(
					'access' => 'ok',
					'messenger' => 'Bạn đã nhập liệu thành công!',
				);
				$this->session->set_flashdata($dulieutb);
			}
			redirect('backend/setup/general/main/infowebsite','refresh');
		}

		$data['active_sub'] = 3;
		$data['title'] = 'Thông tin Website';
		$data['view'] = $this->Model_infowebsite->show_one_id($id);
		$data['template'] = 'backend/setup/tongquan/website/v_update';
		$this->load->view($this->main,$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/backend/Home.php */