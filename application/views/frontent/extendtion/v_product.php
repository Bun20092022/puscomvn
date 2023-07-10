<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',11); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php $lang_title = json_decode($view_title['lang']); ?>
<?php 
$list_category = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',11)->get()->result_array();
?>
<div class="featured_category bg_image_1" data-aos="fade-up" data-aos-duration="700" style="background-image: url(<?= $view_service['link_img']; ?>);background-position: center top;background-repeat: no-repeat;background-size: cover;">
    <div class="container">
        <div class="row">
         <?php foreach ($list_category as $value): ?>
            <div class="col-md-<?php $this->Model_main->get_symtem_extend_num($view_service['num_show']); ?>">
                <div class="featured_category_item" data-aos="fade-up" data-aos-duration="600">
                    <img src="<?= $this->Model_main->get_image_category_id($value['id_category'],'vn'); ?>" alt="img">
                    <div class="featured_category_info">
                        <h6 class="featured_category_heading"><a href="#"><?= $this->Model_main->get_name_category_id($value['id_category'],'vn'); ?></a></h6>
                        <p class="featured_category_number"><span><?= $this->Model_main->count_post_in_category($value['id_category']); ?></span> bài viết</p>
                    </div>
                </div>
            </div>
         <?php endforeach ?>
        </div>
    </div>
</div>