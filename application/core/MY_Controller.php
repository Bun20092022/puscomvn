<?php
class MY_Controller extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $info = $this->session->userdata('userinfoone');
        $login = $info['login'];
        $iduser = $info['iduser'];
        switch ($login)
        {
            case 'yes':
            {
                break;
            }
            default:
            {
                redirect('admin');
                break;
            }
        }

        $language = $this->session->userdata('ss_language');
        if(isset($language)){
            $this->id_language = $language['name_des'];
        }else{
            $this->id_language = 'vn';
        }

        $this->view_language = $this->db->select('*')->from('qh_setup_language')->where('name_des',$this->id_language)->get()->row_array();

        $this->language = $this->db->select('*')->from('qh_setup_language')->where('public',1)->get()->result_array();
        $view_language_main = $this->db->select('*')->from('qh_setup_language')->where('lang_main',1)->get()->row_array();
        $this->language_main = $view_language_main['name_des'];

        $this->website = $this->db->select('*')->from('qh_website')->get()->result_array();

        $website = $this->session->userdata('ss_website');
        if(isset($website)){
            $this->id_website = $website['id_website'];
        }else{
            $this->id_website = 1;
        }

        $this->view_website = $this->Model_main->view_all_by_id('qh_website',$this->id_website);

        // Lấy url Website
        $url_website = json_decode($this->view_website['seo']);
        $this->url_website = $url_website->{'url'};
        $this->list_servicer = $this->Model_main->get_all('qh_post_type');
        $this->time = strtotime(date('d-m-Y'));
    }
}
?>
