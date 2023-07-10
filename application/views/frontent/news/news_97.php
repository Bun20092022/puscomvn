<?php $info = $this->session->userdata('userinfoone'); ?>
<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
 $this->id_language = $language['name_lang'];
}else{
 $this->id_language = 'vn';
}

$name = json_decode($view_url['name']);
$content_category = json_decode($view_url['content']);
$img_background = json_decode($view_url['img_background']);
?>
<?php 
// Nếu là cấp cuối thì lấy toàn bộ đơn vị bài viết ra
$check_status = array(
  'father_id' =>$view_url['id'],
  'post_status' => 2,
);
  // xem có thư mục con không nếu có thì lấy thư mục con ra
$lis_sub = $this->db->select('*')->from('qh_post_category')->where($check_status)->get()->result_array();
?>
<section class="section mt-50">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-12 col-md-12">
              <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s"><?= $name->{$this->id_language}; ?>
    <?php if(isset($info)){ ?>
      <a href="<?= base_url(); ?>backend/news/category/update/<?= $view_url['id']; ?>" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
    <?php } ?></h2>
              <p class="font-lg color-gray-500 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum</p>
            </div>
          </div>
          <div class="row mt-55">
             <?php foreach ($list_post as $value): ?>
    <?php $imgwebsite = json_decode($value['imgwebsite']); ?>
    <?php $name_post = json_decode($value['name']); ?>
    <?php $description_post = json_decode($value['description']); ?>
            <div class="col-xl-3 col-lg-6 col-md-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
              <div class="card-blog-grid card-blog-grid-2 hover-up">
                <div class="card-image img-reveal">
                  <a href="<?= base_url().$this->id_language.'/'.$view_url['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]; ?>">
                    <?php if($value['main_post'] > 0){ ?>
                      <iframe class="mb-10" src="frontent/demowebsite/view/<?= $value['main_post']; ?>" title="" width="100%" height="300px"></iframe>
                    <?php }else{ ?>
                    <img src="<?php if(strlen($imgwebsite->{$this->id_language}) > 5){ echo $imgwebsite->{$this->id_language}; }else{ echo $imgwebsite->{'vn'}; } ?>" alt="<?= $name_post->{$this->id_language}; ?>">
                  <?php } ?>
                  </a>
                </div>
                <div class="card-info">
                  <a href="<?= base_url().$this->id_language.'/'.$view_url['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]; ?>">
                    <h6 class="color-brand-1"><?= $name_post->{$this->id_language}; ?></h6>
                  </a>
                  <div class="mt-20 d-flex align-items-center border-top pt-20"><span class="date-post font-xs color-grey-300 mr-15">
                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                      </svg>29 May 2022</span><span class="time-read font-xs color-grey-300">
                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>3 mins read</span></div>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </section>
<script></script>