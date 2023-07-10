<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',21); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php $lang_title = json_decode($view_title['lang']); ?>
<?php $view_text_extend = $this->Model_frontent->view_id('qh_setup_extend',$view_service['text_extend']); ?>
<?php $lang_text_extend = json_decode($view_text_extend['lang']); ?>
<?php 
$lang_extend = $lang_text_extend->{$this->id_language};
$deltext1 = trim($lang_extend,"<p>");
$deltext2 = trim($deltext1,"<\/p>\r\n");
 ?>
<!--   cta section start    -->
<div class="cta-section cta-bg">
   <div class="container">
      <div class="cta-container">
         <div class="row align-items-center">
            <div class="col-lg-9">
               <h2 class="mb-lg-0 text-center text-lg-left"><?= $lang_title->{$this->id_language}; ?><?php if(isset($info)){ ?>
            <a href="backend/symtem/khauhieu" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
            <?php } ?></h2>
            </div>
            <div class="col-lg-3 text-center text-lg-right">
               <a href="<?= $view_service['link_img']; ?>" class="boxed-btn"><span><?= $deltext2; ?></span></a>
            </div>
         </div>
      </div>
   </div>
   <div class="cta-overlay"></div>
</div>
<!--   cta section end    -->