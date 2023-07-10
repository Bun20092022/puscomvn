<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',20); ?>
<?php $view_show = $this->Model_frontent->view_id('qh_system_template_setup',$view_service['num_show']); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php 
$lang_title = json_decode($view_title['lang']); 
$lang_extend = $lang_title->{$this->id_language};
$deltext1 = trim($lang_extend,"<p>");
$deltext2 = trim($deltext1,"<\/p>\r\n");
?>
<!--   news section start    -->
<div class="news-section" style="padding-top: 0px;">
   <div class="container">
      <h2 class="subtitle">
         <?= $deltext2; ?>
         <?php if(isset($info)){ ?>
            <a href="backend/symtem/news" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
         <?php } ?>
      </h2>
      <div class="row">
         <div class="col-lg-12 col-md-6">
            <?= $view_service['link_img']; ?>
         </div>
      </div>
   </div>
</div>
<!--   news section end    -->