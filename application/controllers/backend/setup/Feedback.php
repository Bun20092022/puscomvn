 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Feedback extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/feedback';
 		$this->post_type_id = 2;
 		$this->template_type = 1;
 	}

 	public function index()
 	{
 		$data['list_feedback'] =  $this->Model_backend->get_all_num('qh_feedback');
 		$data['title'] = 'Danh sách Feedback';
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}

 	public function add()
 	{
 		if (isset($_POST['add'])) {
 			// Lấy danh sách các Feedback cùng cấp để đếm số thứ tự
 			$list_father = $this->Model_backend->get_all_num('qh_feedback');
 			$thongtin = array(
 				'name' => $_POST['name'],
 				'feedback' => $_POST['feedback'],
 				'img_account' => $_POST['img_account'],
 				'post_status' => 2,
 				'num' => count($list_father) + 1,
 			);
 			$result = $this->Model_backend->insert('qh_feedback',$thongtin);
 			redirect($this->folder);		
 		}

 		$data['title'] = 'Thêm Feedback mới';
 		$data['template'] = $this->folder.'/v_add';
 		$this->load->view($this->main,$data);
 	}
 	
 	public function update($lang,$id){
 		if (isset($_POST['edit'])) {

 			$thongtin = array(
 				'name' => $_POST['name'],
 				'feedback' => $_POST['feedback'],
 				'img_account' => $_POST['img_account'],
 			);
 			$this->Model_backend->update('qh_feedback',$thongtin,$id);
 			redirect($this->folder);
 		}
 		$data['view'] = $this->Model_backend->view_id('qh_feedback',$id);
 		
 		$data['title'] = 'Chỉnh sửa Feedback'.' '.$this->id_language;
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}
 	public function tamdung($id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 3,
 		);
 		$this->Model_backend->update('qh_feedback',$thongtin,$id_posts);
 		redirect($this->folder);		
 	}
 	public function kichhoat($id_posts)
 	{
 		$thongtin = array(
 			'post_status' => 2,
 		);
 		$this->Model_backend->update('qh_feedback',$thongtin,$id_posts);
 		redirect($this->folder);		
 	}
 	public function tang($id_category,$num){
 		if ($num == 0){
 			$dataresult = array('error' => 'ok','messenger' => 'Feedback đang ở  vị trí đầu tiên bạn không thể tăng',);
 			$this->session->set_flashdata($dataresult);
 			redirect($this->folder);
 		}else{
 			// Lấy thông tin của num hiện tại
 			$num_truoc = array(
 				'num' => $num-1,
 			);
 			$truoc = $this->db->select('*')->from('qh_feedback')->where($num_truoc)->get()->row_array();

 			$id_numtruoc = $truoc['id'];

 			$this->db->where('id', $id_category);
 			$this->db->update('qh_feedback', $num_truoc);

 			// Tăng bậc của id trước
 			$num_tang_bac = array(
 				'num' => $num,
 			);
 			$this->db->where('id', $id_numtruoc);
 			$this->db->update('qh_feedback', $num_tang_bac);
 			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
 		}
 		$this->session->set_flashdata($dataresult);
 		redirect($this->folder);

 	}
 	public function giam($id_category,$num){
 		if ($num == 100){
 			$dataresult = array('error' => 'ok','messenger' => 'Feedback đang ở vị trí cuối tiên bạn không thể tăng',);
 			$this->session->set_flashdata($dataresult);
 			redirect($this->folder);
 		}else{
 			// Lấy thông tin của num hiện tại
 			$num_truoc = array(
 				'num' => $num+1,
 			);
 			$truoc = $this->db->select('*')->from('qh_feedback')->where($num_truoc)->get()->row_array();

 			$id_numtruoc = $truoc['id'];

 			$this->db->where('id', $id_category);
 			$this->db->update('qh_feedback', $num_truoc);

 			// Tăng bậc của id trước
 			$num_tang_bac = array(
 				'num' => $num,
 			);
 			$this->db->where('id', $id_numtruoc);
 			$this->db->update('qh_feedback', $num_tang_bac);
 			$dataresult = array('access' => 'ok','messenger' => 'Bạn đã chỉnh sửa số thứ tự thành công',);
 		}
 		$this->session->set_flashdata($dataresult);
 		redirect($this->folder);

 	}
 	public function delete($id){

 		$result = $this->Model_backend->delete('qh_feedback',$id);

 			$list_feedback =  $this->Model_backend->get_all_num('qh_feedback');
 			$dem = 0;
 			foreach ($list_feedback as $value) {
 				$dem += 1;
 				$num = array(
 					'num' => $dem,
 			);
 				$this->Model_backend->update('qh_feedback',$num,$value['id']);
 			}
 		redirect($this->folder);
 	}
 }
