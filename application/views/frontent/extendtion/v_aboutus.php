<?php $view_gioithieu = $this->Model_frontent->view_id('qh_system_template',18); ?>
<?php $info = $this->session->userdata('userinfoone'); ?>

<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php 
$check_left = array(
   'id_symtem_template' => 18,
   'left_int' => 1,
); 
$left = $this->db->select('*')->from('qh_system_template_extend')->where($check_left)->get()->result_array();
$check_right = array(
   'id_symtem_template' => 18,
   'right_int' => 1,
); 
$right = $this->db->select('*')->from('qh_system_template_extend')->where($check_right)->get()->result_array();
?>
<!--  about section start  -->
<div class="about-section about">
   <div class="container">
      <div class="row">
         <div class="col-md-<?= $view_gioithieu['left']; ?>">
            <div class="outer">
               <div class="inner">
                  <?php if(isset($info)){ ?>
                     <a href="backend/symtem/aboutus" target="_blank"><i class="far fa-edit"></i></a>
                  <?php } ?>
                  <?php foreach ($left as $value): ?>
                     <?php $view_text = $this->Model_frontent->view_id('qh_setup_extend',$value['id_text']); ?>
                     <?php $lang_text = json_decode($view_text['lang']); ?>
                     <?= $lang_text->{$this->id_language}; ?>
                  <?php endforeach ?>
               </div>
            </div>
         </div>
         <div class="col-md-<?= $view_gioithieu['right']; ?>">
            <?php foreach ($right as $value): ?>
               <img style="width:100%" src="<?= $value['link_img']; ?>">
            <?php endforeach ?>
         </div>
      </div>
   </div>
</div>
<!--  about section end  -->