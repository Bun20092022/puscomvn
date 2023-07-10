<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',19); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php 
$lang_title = json_decode($view_title['lang']); 
$lang_extend = $lang_title->{$this->id_language};
$deltext1 = trim($lang_extend,"<p>");
$deltext2 = trim($deltext1,"<\/p>\r\n");
?>
<?php $list_category = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',19)->get()->result_array(); ?>
<style>
   .home-2 .features::after {
     content: "";
     position: absolute;
     top: 0px;
     left: -233%;
     height: 100%;
     width: 207%;
     background-image: url(<?= $view_service['link_img']; ?>);
     background-size: cover;
     z-index: -2;
  }
</style>
<!--  features section start  -->
<div class="features-section home-2 border-top">
   <div class="container">
      <div class="row feature-content">
         <div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6 pr-0">
            <div class="features">
               <h2 class="subtitle">
                  <?= $deltext2; ?>
                  <?php if(isset($info)){ ?>
                     <a href="backend/symtem/whyus" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
                  <?php } ?>
               </h2>
               <div class="feature-lists">

                  <?php foreach ($list_category as $value): ?>
                     <?php $view_text = $this->Model_frontent->view_id('qh_setup_extend',$value['id_text']); ?>
                     <?php $lang_view_title = json_decode($view_text['lang']);  ?>
                     <?php $view_text1 = $this->Model_frontent->view_id('qh_setup_extend',$value['id_text1']); ?>
                     <?php $lang_view_title1 = json_decode($view_text1['lang']);  ?>
                     <div class="single-feature wow fadeInUp" data-wow-duration="1s">
                        <div class="icon-wrapper"><i class="<?= $value['icon_css']; ?>"></i></div>
                        <div class="feature-details">
                           <h4><?= $lang_view_title->{$this->id_language}; ?></h4>
                           <p><?= $lang_view_title1->{$this->id_language}; ?></p>
                        </div>
                     </div>
                  <?php endforeach ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--  features section end  -->