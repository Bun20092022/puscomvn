<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
  $this->id_language = $language['name_lang'];
}else{
  $this->id_language = 'vn';
}

$name_category = json_decode($view_url['name']);

$view_category_father = $this->Model_frontent->view_id('qh_post_category',$view_url['father_id']);
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
        </ul>
      </div>
    </div>
  </div>
  <!--hero section end--> 
  <div class="section mt-40">
    <div class="container"> 
      <div class="row">
        <div class="col-xl-2 col-lg-3">
          <div class="row">
            <h2 class="title-news"><i class="fa-regular fa-clipboard" style="font-size: 20px;margin-left: 10px;margin-right: 15px;"></i>
              <?php $this->Model_main->get_lang($view_category_father['name'],$this->id_language); ?>
            </h2>
            <?php 
             // Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
            $check_status = array(
              'father_id' => $view_category_father['id'],
              'post_status' => 2,
            );
            // xem có thư mục con không nếu có thì lấy thư mục con ra
            $list_sub = $this->db->select('*')->from('qh_post_category')->where($check_status)->get()->result_array();
            ?>
            <?php $list_posts = $this->db->select('*')->from('qh_posts')->where('post_category_id_ze',$view_url['id'])->order_by('post_date','desc')->get()->result_array(); ?>
            <?php foreach ($list_sub as $value_post): ?>
              <a href="<?= $this->id_language.'/'.$value_post['url_'.$this->id_language]; ?>" class="title-news-a">
                <i class="fa-solid fa-caret-right" style="font-size: 20px;margin-left: 10px;margin-right: 15px;"></i>
                <?php $this->Model_main->get_lang($value_post['name'],$this->id_language); ?>
              </a>
            <?php endforeach ?>
          </div>
        </div> 
        <div class="col-xl-10 col-lg-9">
          <div class="row">
            <?php foreach ($list_posts as $value): ?>
             <?php $imgwebsite = json_decode($value['imgwebsite']); ?>
             <?php $name_post = json_decode($value['name']); ?>
             <?php $description_post = json_decode($value['description']); ?>
             <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeIn mb-3">
              <div class="hover-up">
                <div class="card-image img-reveal">
                  <a href="<?= base_url().$this->id_language.'/'.$view_url['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]; ?>">
                    <?php if($value['main_post'] > 0){ ?>
                      <iframe src="frontent/demowebsite/view/<?= $value['main_post']; ?>" title="" width="100%" height="300px"></iframe>
                    <?php }else{ ?>
                      <img src="<?php if(strlen($imgwebsite->{$this->id_language}) > 5){ echo $imgwebsite->{$this->id_language}; }else{ echo $imgwebsite->{'vn'}; } ?>" alt="<?= $name_post->{$this->id_language}; ?>">
                    <?php } ?>
                  </a>
                </div>
                <div class="card-info">
                  <a href="<?= base_url().$this->id_language.'/'.$view_url['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]; ?>">
                    <h6 class="color-brand-1"><?= $name_post->{$this->id_language}; ?> </h6>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>

    </div>
  </div>
</div>

