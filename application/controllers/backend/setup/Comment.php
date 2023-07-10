 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Comment extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/comment';
 	}

 	public function index()
 	{
 		$data['list_comment'] =  $this->Model_main->get_all_filter_id('qh_comment','desc');
 		$data['title'] = 'Danh sách comment';
 		$data['template'] = $this->folder.'/v_main';
 		$this->load->view($this->main,$data);
 	}

 	public function update($id){

 		if (isset($_POST['edit'])) {
 			$thongtin = array(
 				'name' => $_POST['name'],
                'comment_text' => $_POST['comment_text'],
 				'comment_rep' => $_POST['comment_rep'],
 			);
 			$this->Model_backend->update('qh_comment',$thongtin,$id);
 			redirect($this->folder);
 		}
 		$data['view'] = $this->Model_backend->view_id('qh_comment',$id);


        // Đã đọc Comment
 		$update = array(
                'read_info' => 36,
            );
            $this->Model_backend->update('qh_comment',$update,$id);
 		$data['title'] = 'Chỉnh sửa comment'.' '.$this->id_language;
 		$data['template'] = $this->folder.'/v_update';
 		$this->load->view($this->main,$data);
 	}
 	public function delete($id){
 		$result = $this->Model_backend->delete('qh_comment',$id);
 		redirect($this->folder);
 	}
 }
