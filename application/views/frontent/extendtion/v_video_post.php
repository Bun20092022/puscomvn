<style type="text/css">
  
</style>
<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
   $this->id_language = $language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',26); ?>
<?php $view_show = $this->Model_frontent->view_id('qh_system_template_setup',$view_service['num_show']); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php 
$lang_title = json_decode($view_title['lang']); 
?>
<?php 
$list_category = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',26)->get()->result_array();
$array_post = array();
foreach ($list_category as $value) {
   array_push($array_post, $value['id_category']);
}

$get_all_post = $this->db->select('*')->from('qh_posts')->where('post_status',2)->order_by('id','desc')->get()->result_array();

?>
<!--   news section start    -->
<section>
   <div class="container">
    <div class="sidebartitle">
      <?= $lang_title->{$this->id_language}; ?>
      <?php if(isset($info)){ ?>
         <a href="backend/symtem/video" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
      <?php } ?>
   </div>
   <div class="row">
   <?php $dem = 0; ?>
   <?php foreach ($get_all_post as $value): ?>
      <?php if(in_array($value['post_category_id_ze'], $array_post)){ ?>
         <?php $dem += 1; ?>
         <?php if($dem <= $view_service['num_post']){ ?>
            <?php $view_category = $this->Model_frontent->view_id('qh_post_category',$value['post_category_id_ze']); ?>
            <?php $name_posts = json_decode($value['name']); ?>
            <?php $imgwebsite = json_decode($value['imgwebsite']); ?>
            <div class="col-md-<?= $view_show['symtem_extend_num'] ?>">
               <a href="<?= base_url().$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]?>">
                  <div class="img-post" style="background: url(<?php if(strlen($imgwebsite->{$this->id_language}) > 5){ echo $imgwebsite->{$this->id_language}; }else{ echo $imgwebsite->{'vn'}; } ?>)"></div>
               <p style="margin-top:10px"> <?php if(strlen($name_posts->{$this->id_language}) > 5){ echo $name_posts->{$this->id_language}; }else{ echo $name_posts->{'vn'}; } ?></p>
             </a>
          </div>
       <?php } ?>
    <?php } ?>
 <?php endforeach ?>
 </div>
</div>
</div>
</section>