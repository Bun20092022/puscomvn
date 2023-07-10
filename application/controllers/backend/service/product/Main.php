<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/service/product/main';
	}

	public function post($id_post)
	{
		if(isset($_POST['add'])) {
			// Đếm số lượng phần tử có trong Post
			$list = $this->db->select('id')->from('qh_posts_product_extend')->where('id_product',$id_post)->get()->result_array();
			if($_POST['add'] == 'addimg'){
				if(strlen($_POST['link_img']) > 5) {
					$info_add = array(
						'link' => $_POST['link_img'],
						'id_product' => $id_post,
						'id_product_setup' => 26,
						'num' => count($list) + 1,
						'post_status' => 2,
					);
					$this->Model_backend->insert('qh_posts_product_extend',$info_add);
				}
			} 
			if($_POST['add'] == 'addvideoyoutube'){
				if(strlen($_POST['link_youtube']) > 5) {
					$info_add = array(
						'link' => $_POST['link_youtube'],
						'id_product' => $id_post,
						'id_product_setup' => 27,
						'num' => count($list) + 1,
						'post_status' => 2,
					);
					$this->Model_backend->insert('qh_posts_product_extend',$info_add);
				}
			}
			if($_POST['add'] == 'add_video_location'){
				if(strlen($_POST['link_video_location']) > 5) {
					$info_add = array(
						'link' => $_POST['link_video_location'],
						'id_product' => $id_post,
						'id_product_setup' => 28,
						'num' => count($list) + 1,
						'post_status' => 2,
					);
					$this->Model_backend->insert('qh_posts_product_extend',$info_add);
				}
			}
			if($_POST['add'] == 'add_img_360'){
				if(strlen($_POST['img_360']) > 5) {
					$info_add = array(
						'link' => $_POST['img_360'],
						'id_product' => $id_post,
						'id_product_setup' => 29,
						'num' => count($list) + 1,
						'post_status' => 2,
					);
					$this->Model_backend->insert('qh_posts_product_extend',$info_add);
				}
			}
		}
		$data['id_post'] = $id_post;
		$data['template'] = $this->folder.'/v_main';
		$this->load->view($this->main,$data);
	}
	public function tamdung($id,$id_product)
	{
		$thongtin = array(
			'post_status' => 3,
		);
		$this->Model_backend->update('qh_posts_product_extend',$thongtin,$id);
		redirect('backend/service/product/main/post/'.$id_product);		
	}
	public function kichhoat($id,$id_product)
	{
		$thongtin = array(
			'post_status' => 2,
		);
		$this->Model_backend->update('qh_posts_product_extend',$thongtin,$id);
		redirect('backend/service/product/main/post/'.$id_product);		
	}
	public function tang($id,$id_product,$num){
        if ($num == 0){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở  vị trí đầu tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect($this->folder.'/add/'.$id_product);
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'id_product' => $id_product,
                'num' => $num-1,
            );
            $truoc = $this->db->select('*')->from('qh_posts_product_extend')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id);
            $this->db->update('qh_posts_product_extend', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_posts_product_extend', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect('backend/service/product/main/post/'.$id_product);

    }
    public function giam($id,$id_product,$num){
        if ($num == 100){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở vị trí cuối tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect($this->folder.'/add/'.$id_product);
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'id_product' => $id_product,
                'num' => $num+1,
            );
            $truoc = $this->db->select('*')->from('qh_posts_product_extend')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id);
            $this->db->update('qh_posts_product_extend', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_posts_product_extend', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect('backend/service/product/main/post/'.$id_product);
    }
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */