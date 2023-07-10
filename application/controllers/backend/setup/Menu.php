 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Menu extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/menu';
 		$this->service = 1;
 		$this->template_type = 1;
 	}

 	public function index()
 	{
 		$data['link_add'] = $this->folder.'/addgroup';
 		$data['title_add'] = "Tạo Menu Website mới";
 		
 		$data['title'] = 'Danh sách Menu Website';
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}
 	public function addgroup()
 	{
 		if (isset($_POST['add'])) {
 			// Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
 			$thongtin = array( 				
 				'menu_group' => $_POST['menu_group'],
	 			'post_website' => $this->id_website,
 				'father_id' => 0,
 				'post_status' => 2,
 			);
 			$id_insert = $this->Model_backend->insert('qh_setup_menu',$thongtin);
 			redirect($this->folder.'/group/'.$id_insert);		
 		}
 		$data['title'] = 'Thêm menu mới';
 		$data['template'] = $this->folder.'/add_group';
 		$this->load->view($this->main,$data);
 	}
    public function editgroup($id)
    {
        if (isset($_POST['add'])) {
            // Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
            $thongtin = array(              
                'menu_group' => $_POST['menu_group'],
                'post_website' => $this->id_website,
                'father_id' => 0,
                'post_status' => 2,
            );
            $id_insert = $this->Model_backend->update('qh_setup_menu',$thongtin,$id);
            redirect('backend/news/menu/group/'.$id);        
        }
        $data['view'] = $this->Model_backend->view_id('qh_setup_menu',$id);
        $data['title'] = 'Chỉnh sửa Menu';
        $data['template'] = $this->folder.'/update_group';
        $this->load->view($this->main,$data);
    }
 	public function group($id)
 	{
        if(isset($_POST['title'])) {
            $thongtin = array(
                'id_text' => $_POST['id_text'],
            );
            $this->Model_backend->update('qh_setup_menu',$thongtin,$id);
            redirect($this->folder.'/group/'.$id);        
        }
        if (isset($_POST['add_post'])) {
            // Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
            $check_father = array(
                'father_id' => $_POST['father_id'],
                'id_menu_group' => $id,
            );
            $list_father = $this->db->select('*')->from('qh_setup_menu')->where($check_father)->get()->result_array();
            $thongtin = array(              
                'id_posts' => $_POST['id_posts'],
                'post_website' => $this->id_website,
                'father_id' => trim($_POST['father_id']),
                'post_status' => 2,
                'posts_style' => 30,
                'num_colum' => 33,
                'id_menu_group' => $id,
                'num' => count($list_father) + 1,
            );
            $this->Model_backend->insert('qh_setup_menu',$thongtin);
            redirect($this->folder.'/group/'.$id);        
        }
        if (isset($_POST['add_category'])) {
            // Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
            $check_father = array(
                'father_id' => $_POST['father_id'],
                'id_menu_group' => $id,
            );
            $list_father = $this->db->select('*')->from('qh_setup_menu')->where($check_father)->get()->result_array();
            $thongtin = array(              
                'id_category' => $_POST['id_category'],
                'post_website' => $this->id_website,
                'father_id' => trim($_POST['father_id']),
                'post_status' => 2,
                'posts_style' => 29,
                'num_colum' => 33,
                'id_menu_group' => $id,
                'num' => count($list_father) + 1,
            );
            $this->Model_backend->insert('qh_setup_menu',$thongtin);
            redirect($this->folder.'/group/'.$id);        
        }
        if (isset($_POST['add_link_out'])) {
            // Lấy danh sách các chuyên mục cùng cấp để đếm số thứ tự
            $check_father = array(
                'father_id' => $_POST['father_id'],
                'id_menu_group' => $id,
            );
            $list_father = $this->db->select('*')->from('qh_setup_menu')->where($check_father)->get()->result_array();
            $thongtin = array(              
                'link_out' => $_POST['link_out'],
                'id_name_out' => $_POST['id_name_out'],
                'post_website' => $this->id_website,
                'father_id' => trim($_POST['father_id']),
                'post_status' => 2,
                'posts_style' => 31,
                'num_colum' => 33,
                'id_menu_group' => $id,
                'num' => count($list_father) + 1,
            );
            $this->Model_backend->insert('qh_setup_menu',$thongtin);
            redirect($this->folder.'/group/'.$id);        
        }
 		$data['link_add'] = $this->folder.'/addgroup';
 		$data['title_add'] = "Tạo Menu Website mới";
 		
 		$view = $this->Model_backend->view_id('qh_setup_menu',$id);

        $data['view_text'] = $this->Model_backend->view_id('qh_setup_menu',$id);
        $data['list_posts_public'] = $this->Model_backend->get_all_post_public();
        $data['id_menu_group'] = $id;
 		$data['title'] = 'Chỉnh sửa Menu Website: '.$view['menu_group'];
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}
    public function tang($id_category,$father_id,$num,$id_menu_group){
        if ($num == 0){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở  vị trí đầu tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect('backend/news/category');
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'father_id' => $father_id,
                'id_menu_group' => $id_menu_group,
                'num' => $num-1,
            );
            $truoc = $this->db->select('*')->from('qh_setup_menu')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id_category);
            $this->db->update('qh_setup_menu', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_setup_menu', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect($this->folder.'/group/'.$id_menu_group);

    }
    public function giam($id_category,$father_id,$num,$id_menu_group){
        if ($num == 100){
            $dataresult = array('error' => 'ok','messenger' => 'Chuyên mục đang ở vị trí cuối tiên bạn không thể tăng',);
            $this->session->set_flashdata($dataresult);
            redirect('backend/news/category');
        }else{
            // Lấy thông tin của num hiện tại
            $num_truoc = array(
                'father_id' => $father_id,
                'id_menu_group' => $id_menu_group,
                'num' => $num+1,
            );
            $truoc = $this->db->select('*')->from('qh_setup_menu')->where($num_truoc)->get()->row_array();

            $id_numtruoc = $truoc['id'];

            $this->db->where('id', $id_category);
            $this->db->update('qh_setup_menu', $num_truoc);

            // Tăng bậc của id trước
            $num_tang_bac = array(
                'num' => $num,
            );
            $this->db->where('id', $id_numtruoc);
            $this->db->update('qh_setup_menu', $num_tang_bac);
            $dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
        }
        $this->session->set_flashdata($dataresult);
        redirect($this->folder.'/group/'.$id_menu_group);
    }
    public function delete($id,$father_id,$id_menu_group){
        // Lấy toàn bộ thông tin bảng qh_posts
        $list_lever = $this->Model_backend->show_all_menu_by_father($id,$id_menu_group);
        if(count($list_lever) > 0){
            $dataresult = array('error' => 'ok','messenger' => 'Tồn tại dữ liệu con. Bạn vui lòng xóa dữ liệu con trước khi thực hiện',);
        }else
        {
            // Nếu không tồn tại thì bắt đầu được xóa
            $this->Model_backend->delete('qh_setup_menu',$id);
            // Sắp xếp lại thứ tự menu trong cùng chuyên mục
            $check_father = array(
                'father_id' => $father_id,
                'id_menu_group' => $id_menu_group,
            );
             $list_father = $this->db->select('*')->from('qh_setup_menu')->where($check_father)->order_by('num','asc')->get()->result_array();
             $dem = 0;
             foreach ($list_father as $value) {
                $dem += 1;
                $num = array(
                    'num' => $dem,
                );
                $this->Model_backend->update('qh_setup_menu',$num,$value['id']);
             }
        }
        $this->session->set_flashdata($dataresult);
        redirect($this->folder.'/group/'.$id_menu_group);
    }
    public function delete_group($id_group){
        $check_menu = array(
            'id_menu_group' => $id_group,
        );
        $list_menu = $this->Model_backend->get_where('qh_setup_menu',$check_menu);
        foreach($list_menu as $value) {
            $this->Model_backend->delete('qh_setup_menu',$value['id']);
        }
        $this->Model_backend->delete('qh_setup_menu',$id_group);
        redirect('backend/news/menu');
    }
    public function num_colum($id,$id_num_colum,$id_menu_group)
    {
        $num = array(
            'num_colum' => $id_num_colum,
        );
        $this->Model_backend->update('qh_setup_menu',$num,$id);
        redirect($this->folder.'/group/'.$id_menu_group);
    }
 }
