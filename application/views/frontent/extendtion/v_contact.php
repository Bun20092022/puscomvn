<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',25); ?>
<?php $view_show = $this->Model_frontent->view_id('qh_system_template_setup',$view_service['num_show']); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php 
$lang_title = json_decode($view_title['lang']); 
?>
<style type="text/css">
  @media (max-width: 768px) {
    .map-contact {
      width: 100%;
      height: 450;
    }
    .contact-text{
      margin: 20px 10px;
    }
  }
  @media (min-width: 768px) {
    .map-contact {
      width: 100%;
      height: 850px;
    }
    .contact-text{
      margin: 200px 50px 100px 100px;
    }
  }
</style>
<div class="row">
  <div class="col-md-6">
    <div class="contact-text">
      <?php if(isset($info)){ ?>
            <a href="backend/symtem/contact" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
         <?php } ?>
      <?= $lang_title->{$this->id_language} ?>
    </div>
  </div>
  <div class="col-md-6">
    <?= $view_service['link_img']; ?>
  </div>
</div>