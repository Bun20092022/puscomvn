 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Contact extends MY_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->date = strtotime(date('d-m-Y H:i:s'));
 		$this->main = 'backend/layout/v_main';
 		$this->folder = 'backend/setup/contact';
 	}

 	public function index()
 	{
                $list_unread = $this->Model_main->get_unread('qh_contact');
                foreach ($list_unread as $value) {
                    $update = array(
                        'read_info' => 36,
                );
                $this->Model_backend->update('qh_contact',$update,$value['id']);    
                }
                
                $data['list_contact'] =  $this->Model_main->get_all_filter_id('qh_contact','desc');
                $data['title'] = 'Danh sách Contact';
                $data['template'] = $this->folder.'/v_main';
                $this->load->view($this->main,$data);
        }

        public function delete($id){
           $result = $this->Model_backend->delete('qh_contact',$id);
           redirect($this->folder);
   }
}
