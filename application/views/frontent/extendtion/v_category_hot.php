<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
 $this->id_language = $language['name_lang'];
}else{
 $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',28); ?>
<?php $view_show = $this->Model_frontent->view_id('qh_system_template_setup',$view_service['num_show']); ?>
<?php 
$view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); 
$lang_title = json_decode($view_title['lang']); 
?>
<?php $list_category_show = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',28)->order_by('num','asc')->get()->result_array(); ?>
<!-- Start product section -->
<section class="new__product--section section--padding pt-0" style="margin-top: 40px;">
 <div class="container-fluid">
  <div class="row">
   <div class="col-lg-4 col-md-5">
    <div class="product__collection--content">
      <?php if(isset($info)){ ?><a href="<?= base_url(); ?>backend/symtem/categoryhot" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
      <?= $lang_title->{$this->id_language}; ?>
      <a class="product__collection--content__btn primary__btn btn__style3" href="shop.html">View More</a>  
    </div>
  </div>
  <div class="col-lg-8 col-md-7">
    <div class="new__product--sidebar position__relative">
     <div class=" product__swiper--column3 swiper">
      <div class="swiper-wrapper">
        <?php foreach ($list_category_show as $value): ?>
          <?php $view_category = $this->Model_frontent->view_id('qh_post_category',$value['id_category']); ?>
          <?php $name = json_decode($view_category['name']); ?>
          <?php $imgwebsite = json_decode($view_category['imgwebsite']); ?>
          <div class="swiper-slide">
            <div class="new__product--items">
             <div class="new__product--thumbnail">
              <a class="new__product--thumbnail__link" href="<?= base_url().$this->id_language.'/'.$view_category['url_'.$this->id_language]; ?>">
                <img class="new__product--thumbnail__img" src="<?= get_img($imgwebsite->{$this->id_language}); ?>" alt="product-img">
              </a>
            </div>
            <div class="new__product--content">
              <h3 class="new__product--content__title"><a href="<?= base_url().$this->id_language.'/'.$view_category['url_'.$this->id_language]; ?>"><?= $name->{$this->id_language}; ?></a></h3>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <div class="swiper__nav--btn style3 swiper-button-next"></div>
  <div class="swiper__nav--btn style3 swiper-button-prev"></div>
</div>
</div>
</div>
</div>
</section>
<!-- End product section -->