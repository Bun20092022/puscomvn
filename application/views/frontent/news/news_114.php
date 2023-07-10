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

$view_show_code = $this->Model_frontent->view_id('qh_posts_extend',$view_url_post['show_code']);
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
  <!--hero section end--> 
  <div class="section mt-40">
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-12">
          <h3 class="color-brand-1"><?= $name_category->{$this->id_language}; ?></h3>
        </div>
        <div class="col-md-2">
          <?php 
            $view_category_father = $this->Model_frontent->view_id('qh_post_category',$view_url_category['father_id']);
             // Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
            $check_status = array(
              'father_id' => $view_url_category['father_id'],
              'post_status' => 2,
            );
            // xem có thư mục con không nếu có thì lấy thư mục con ra
            $list_sub = $this->db->select('*')->from('qh_post_category')->where($check_status)->get()->result_array();
            ?>
            <h2 class="title-news"><i class="fa-regular fa-clipboard" style="font-size: 20px;margin-left: 10px;margin-right: 15px;"></i>
              <?php $this->Model_main->get_lang($view_category_father['name'],$this->id_language); ?>
            </h2>
            <?php foreach ($list_sub as $value_post): ?>
              <a href="<?= $this->id_language.'/'.$value_post['url_'.$this->id_language]; ?>" class="title-news-a">
                <i class="fa-solid fa-caret-right" style="font-size: 20px;margin-left: 10px;margin-right: 15px;"></i>
                <?php $this->Model_main->get_lang($value_post['name'],$this->id_language); ?>
              </a>
            <?php endforeach ?>
        </div>
        <div class="col-md-10">
          <div class="row">
        <div class="col-xl-7 col-lg-7">
          <div class="content-single">
            <iframe src="frontent/demowebsite/view/<?= $view_url_post['main_post']; ?>" title="" width="100%" height="400px"></iframe>
          </div>
        </div>
        <div class="col-xl-5 col-lg-5">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">HTML</span>    
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false" tabindex="-1">
                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                <span class="d-none d-sm-block">CSS</span>    
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                <span class="d-none d-sm-block">Javascript</span>    
              </a>
            </li>
          </ul>
          <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="home" role="tabpanel">
              <pre data-enlighter-language="html">
                <?= $view_show_code['html_text'] ?>
              </pre>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <pre data-enlighter-language="css">
                <?= $view_show_code['css_text'] ?>
              </pre>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <pre data-enlighter-language="javascript">
                <?= $view_show_code['javascript_text'] ?>
              </pre>
            </div>
          </div>
          <a class="btn btn-brand-1 hover-up" style="background: red;" target="_blank" href="code-<?= $view_url_post['main_post']; ?>"><i class="fa-solid fa-play"></i> RUN CODE</a>
        </div>
        </div>
        </div>
      </div>
    </div>
    <div class="border-bottom bd-grey-80 mt-30"></div>
  </div>


