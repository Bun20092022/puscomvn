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
<style type="text/css">
  .title-news{
    display: block;
    height: 48px;
    line-height: 48px;
    background-color: #eee;
    border-top: 1px solid #d0d0d0;
    border-bottom: 1px solid #d0d0d0;
    position: relative;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: none;
    font-size: 15px;
  }
  .title-news-a{
    display: block;
    position: relative;
    line-height: 44px;
    height: 44px;
    text-decoration: none;
    border-top: 1px solid #ddd;
    padding-left: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    color: #000;
  }
  .title-active{
    color: #8f0000;
  }
</style>
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
  <?php 
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   ?>
  <!--hero section end--> 
  <div class="section mt-40">
    <div class="container"> 
      <div class="row">
        <div class="col-xl-3 col-lg-4">
          <?php 
          $check_list_category = array(
            'father_id' => $view_url_category['father_id'],
            'post_status' => 2,
          ); 
          $list_category = $this->Model_backend->get_where('qh_post_category',$check_list_category);
          ?>
          <div class="row">
            <?php foreach ($list_category as $value_category): ?>
              <h2 class="title-news"><i class="fa-regular fa-clipboard" style="font-size: 20px;margin-left: 10px;margin-right: 15px;"></i>
                <?php $this->Model_main->get_lang($value_category['name'],$this->id_language); ?>
              </h2>
              <?php 
          // Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
              $check_status = array(
                'post_category_id_ze' =>$value_category['id'],
                'post_status' => 2,
              );
          // xem có thư mục con không nếu có thì lấy thư mục con ra
              $list_sub = $this->db->select('*')->from('qh_posts')->where($check_status)->get()->result_array();
              ?>
              <?php $dem = 0; ?>
              <?php foreach ($list_sub as $value_post): ?>
                <?php $dem += 1; ?>
                <a href="<?php $this->Model_main->get_url_post($value_post['post_category_id_ze'],$value_post['url_'.$this->id_language],$this->id_language); ?>" class="title-news-a">- Bài <?= $dem; ?>: <?php $this->Model_main->get_lang($value_post['name'],$this->id_language); ?></a>
              <?php endforeach ?>
            <?php endforeach ?>
          </div>
        </div> 
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
        
      </div>
    </div>
    <div class="border-bottom bd-grey-80 mt-30"></div>
  </div>

