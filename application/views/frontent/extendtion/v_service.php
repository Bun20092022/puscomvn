<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',9); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php $lang_title = json_decode($view_title['lang']); ?>
<?php 
$list_category = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',9)->get()->result_array();
$array_post = array();
foreach ($list_category as $value) {
   array_push($array_post, $value['id_category']);
}

$get_all_post = $this->db->select('*')->from('qh_posts')->where('post_status',2)->get()->result_array();

?>
<div class="service-section">
   <div class="container">
      <h2 class="subtitle">
         <?= $lang_title->{$this->id_language}; ?>
         <?php if(isset($info)){ ?>
            <a href="backend/symtem/service" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
         <?php } ?>
      </h2>
      <div class="service-carousel owl-carousel owl-theme">
         <?php $dem = 0; ?>
         <?php foreach ($get_all_post as $value): ?>
            <?php if(in_array($value['post_category_id_ze'], $array_post)){ ?>
            <?php $dem += 1; ?>
            <?php if($dem <= $view_service['num_post']){ ?>
            <?php $view_category = $this->Model_frontent->view_id('qh_post_category',$value['post_category_id_ze']); ?>
            <?php $name_posts = json_decode($value['name']); ?>
            <?php $imgwebsite = json_decode($value['imgwebsite']); ?>
            <div class="single-service">
               <div class="img-wrapper" style="background: url('<?php if(strlen($imgwebsite->{$this->id_language}) > 5){ echo $imgwebsite->{$this->id_language}; }else{ echo $imgwebsite->{'vn'}; } ?>');height: 250px;background-size: cover;">
               </div>
               <div class="service-txt">
                  <a href="<?= $this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]?>">
                     <h4 class="service-title" style="font-size: 18px"><?php if(strlen($name_posts->{$this->id_language}) > 5){ echo $name_posts->{$this->id_language}; }else{ echo $name_posts->{'vn'}; } ?></h4>
                  </a>
                  <p class="service-para">Vận tải đường biển là loại hình dịch vụ chiếm hơn 85% thị phần trên toàn thế giới nói chung và Việt ...</p>
               </div>
            </div> 
         <?php } ?>
         <?php } ?>
         <?php endforeach ?>


      </div>
   </div>
</div>
<!--  service section end  -->