<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Youtube extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/main/extend/youtube';
		$this->extend = 44;
	}

	public function add($id_posts,$id_colum)
	{
		$list = $this->Model_backend->get_fill('qh_posts_extend','id_posts',$id_posts);
		$add = array(
			'name' => 'Danh sách Video Youtube',
			'id_posts' => $id_posts,
			'type_posts' => $this->extend,
			'post_status' => 2,
			'num_colum' => $id_colum,
			'num' => count($list) + 1,
		);
		$id_insert = $this->Model_backend->insert('qh_posts_extend',$add);
		redirect($this->folder.'/update/'.$id_insert);
	}
	public function update($id_insert)
	{
		if(isset($_POST['add'])){
			$view_post_extend = $this->Model_backend->view_id('qh_posts_extend',$id_insert);
			$list = $this->Model_backend->get_fill('qh_post_img','id_posts_extend',$id_insert);
			$add = array(
				'link' => $_POST['link_img'],
				'id_posts' => $view_post_extend['id_posts'],
				'id_posts_extend' => $id_insert,
				'post_status' => 2,
				'num' => count($list) + 1,
			);
			$this->Model_backend->insert('qh_post_img',$add);
		}
		$data['list_extend_image'] = $this->db->select('*')->from('qh_post_img')->where('id_posts_extend',$id_insert)->order_by('num','asc')->get()->result_array();

		$data['view'] = $this->Model_backend->view_id('qh_posts_extend',$id_insert);
		$data['template'] = $this->folder.'/v_update';
		$this->load->view($this->main, $data, FALSE);
	}
	public function change_colum($id_extend,$id_colum)
	{
		$thongtin = array(
			'num_colum' => $id_colum,
		);
		$this->Model_backend->update('qh_posts_extend',$thongtin,$id_extend);
		redirect($this->folder.'/update/'.$id_extend);		
	}
	public function update_image($id)
	{
		if(isset($_POST['update'])){
			$view = $this->Model_backend->view_id('qh_post_img',$id);
			$update = array(
				'link' => $_POST['link_img'],
			);
			$this->Model_backend->update('qh_post_img',$update,$id);
			redirect($this->folder.'/update/'.$view['id_posts_extend']);
		}
		$data['view'] = $this->Model_backend->view_id('qh_post_img',$id);
		$data['template'] = $this->folder.'/v_update_image';
		$this->load->view($this->main, $data, FALSE);
	}
	public function tamdung($id,$id_posts,$id_posts_extend)
	{
		$thongtin = array(
			'post_status' => 3,
		);
		$this->Model_backend->update('qh_post_img',$thongtin,$id);
		redirect($this->folder.'/update/'.$id_posts_extend);		
	}
	public function kichhoat($id,$id_posts,$id_posts_extend)
	{
		$thongtin = array(
			'post_status' => 2,
		);
		$this->Model_backend->update('qh_post_img',$thongtin,$id);
		redirect($this->folder.'/update/'.$id_posts_extend);		
	}
	public function tang($id,$id_posts,$id_posts_extend,$num){
		if ($num == 0){
			$dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở  vị trí đầu tiên bạn không thể tăng',);
			$this->session->set_flashdata($dataresult);
			redirect($this->folder.'/update/'.$id_posts.'/'.$id_posts_extend);
		}else{
            // Lấy thông tin của num hiện tại
			$num_truoc = array(
				'id_posts_extend' => $id_posts_extend,
				'num' => $num - 1,
			);
			$truoc = $this->db->select('*')->from('qh_post_img')->where($num_truoc)->get()->row_array();

			$id_numtruoc = $truoc['id'];

			$this->db->where('id', $id);
			$this->db->update('qh_post_img', $num_truoc);

            // Tăng bậc của id trước
			$num_tang_bac = array(
				'num' => $num,
			);
			$this->db->where('id', $id_numtruoc);
			$this->db->update('qh_post_img', $num_tang_bac);
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
		}
		$this->session->set_flashdata($dataresult);
		redirect($this->folder.'/update/'.$id_posts_extend);

	}
	public function giam($id,$id_posts,$id_posts_extend,$num){
		if ($num == 100){
			$dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở vị trí cuối tiên bạn không thể tăng',);
			$this->session->set_flashdata($dataresult);
			redirect($this->folder.'/update/'.$id_posts_extend);
		}else{
            // Lấy thông tin của num hiện tại
			$num_truoc = array(
				'id_posts_extend' => $id_posts_extend,
				'num' => $num + 1,
			);
			$truoc = $this->db->select('*')->from('qh_post_img')->where($num_truoc)->get()->row_array();

			$id_numtruoc = $truoc['id'];

			$this->db->where('id', $id);
			$this->db->update('qh_post_img', $num_truoc);

            // Tăng bậc của id trước
			$num_tang_bac = array(
				'num' => $num,
			);
			$this->db->where('id', $id_numtruoc);
			$this->db->update('qh_post_img', $num_tang_bac);
			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
		}
		$this->session->set_flashdata($dataresult);
		redirect($this->folder.'/update/'.$id_posts_extend);
	}
	public function delete($id,$id_posts){
		$this->Model_backend->delete('qh_post_img',$id);
            // Sắp xếp lại thứ tự menu trong cùng chuyên mục
		$check_father = array(
			'id_posts' => $id_posts,
		);
		$list_father = $this->db->select('*')->from('qh_posts_extend')->where($check_father)->order_by('num','asc')->get()->result_array();
		$dem = 0;
		foreach ($list_father as $value) {
			$dem += 1;
			$num = array(
				'num' => $dem,
			);
			$this->Model_backend->update('qh_posts_extend',$num,$value['id']);
		}
		redirect($this->folder.'/update/'.$id_posts);
	}
}
