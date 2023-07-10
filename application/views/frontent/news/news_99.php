<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
  $this->id_language = $language['name_lang'];
}else{
  $this->id_language = 'vn';
}

$name_category = json_decode($view_url_category['name']);
$name_post = json_decode($view_url_post['name']);
$content_post = json_decode($view_url_post['content']);
?>
<!--hero section start-->
<div class="section mt-35">
  <div class="container">
    <div class="breadcrumbs wow animate__animated animate__fadeIn" data-wow-delay=".0s">
      <ul>
        <li><a href="<?= base_url(); ?>">
          <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>Trang chủ</a></li>
          <li><a href=""><?= $name_category->{$this->id_language}; ?></a></li>
          <li><a href=""><?= $name_post->{$this->id_language}; ?></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--hero section end--> 
  <div class="section mt-40">
    <div class="container"> 
      <div class="row"> 
        <div class="col-xl-9 col-lg-8">
          <div class="content-single">
            <h3 class="color-brand-1"><?= $name_post->{$this->id_language}; ?></h3>
            <?= $content_post->{$this->id_language}; ?>
            <?php $list_post_extend = $this->db->select('*')->from('qh_posts_extend')->where('id_posts',$view_url_post['id'])->order_by('num','asc')->get()->result_array();  ?>
            <?php foreach($list_post_extend as $value) {
              $view_template_frotend_extend = $this->db->select('*')->from('qh_setup')->where('id',$value['type_posts'])->get()->row_array();
              $data_extend['id_extend'] = $value['id'];
              // echo $value['id'].'<br>';
              if(strlen($view_template_frotend_extend['url_frontent']) > 5){
                $this->load->view($view_template_frotend_extend['url_frontent'], $data_extend, FALSE);
              }
            } ?>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4">
          <div class="sidebar-author">
            <div class="box-author"><a href=""><img src="public/frontent/assets/imgs/page/homepage1/author.png" alt="iori"></a>
              <div class="author-info"><a href=""><span class="font-md-bold color-brand-1 author-name">Bessie Cooper</span></a><span class="font-xs color-grey-500 department">November 17, 2022</span><span class="font-xs color-grey-500 icon-read">8 min read</span></div>
            </div>
            <div class="mt-25"><a class="btn btn-border mr-10 mb-10" href="">Marketing</a><a class="btn btn-border mr-10 mb-10" href="">Business</a></div>
            <div class="mt-50 d-flex align-item-center"> <strong class="font-xs-bold color-brand-1 mr-20">Share</strong>
              <div class="list-socials mt-0 d-inline-block"> <a class="icon-socials icon-facebook" href=""></a><a class="icon-socials icon-instagram" href=""></a><a class="icon-socials icon-twitter" href=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="border-bottom bd-grey-80 mt-30"></div>
  </div>

