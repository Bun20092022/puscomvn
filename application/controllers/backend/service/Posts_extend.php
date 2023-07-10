<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_extend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->main = 'backend/layout/v_main';
		$this->folder = 'backend/service/posts_extend';
	}

	public function index()
	{
		
	}
	public function add($id_posts)
	{
		$data['id_posts'] = $id_posts;
        $view_posts = $this->Model_backend->view_id('qh_posts',$id_posts);
        $data['view_post_type'] = $this->Model_backend->view_id('qh_post_type',$view_posts['post_type_id']);
		$data['list_posts_extend'] = $this->db->select('*')->from('qh_posts_extend')->where('id_posts',$id_posts)->order_by('num','asc')->get()->result_array();
		$data['template'] = $this->folder.'/v_add';
		$this->load->view($this->main,$data);
	}
	public function tamdung($id,$id_posts)
	{
		$thongtin = array(
			'post_status' => 3,
		);
		$this->Model_backend->update('qh_posts_extend',$thongtin,$id);
		redirect($this->folder.'/add/'.$id_posts);		
	}
	public function kichhoat($id,$id_posts)
	{
		$thongtin = array(
			'post_status' => 2,
		);
		$this->Model_backend->update('qh_posts_extend',$thongtin,$id);
		redirect($this->folder.'/add/'.$id_posts);		
	}
	public function tang($id,$id_posts,$num){
        if ($num == 0){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở  vị trí đầu tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect($this->folder.'/add/'.$id_posts);
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'id_posts' => $id_posts,
                'num' => $num-1,
            );
            $truoc = $this->db->select('*')->from('qh_posts_extend')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id);
            $this->db->update('qh_posts_extend', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_posts_extend', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect($this->folder.'/add/'.$id_posts);

    }
    public function giam($id,$id_posts,$num){
        if ($num == 100){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở vị trí cuối tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect($this->folder.'/add/'.$id_posts);
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'id_posts' => $id_posts,
                'num' => $num+1,
            );
            $truoc = $this->db->select('*')->from('qh_posts_extend')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id);
            $this->db->update('qh_posts_extend', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_posts_extend', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect($this->folder.'/add/'.$id_posts);
    }
    public function delete($id,$id_posts){
            $this->Model_backend->delete('qh_posts_extend',$id);
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
        redirect($this->folder.'/add/'.$id_posts);
    }

}

/* End of file Posts_extend.php */
/* Location: ./application/controllers/Posts_extend.php */