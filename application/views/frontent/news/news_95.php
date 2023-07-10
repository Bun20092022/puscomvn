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
<div class="breadcrumbs" data-aos="fade-in" style="<?php if(strlen($img_background->{$this->id_language}) > 10){ ?>
background: url(<?= $img_background->{$this->id_language}; ?>);<?php }else{ ?>background:<?= $view_url['color_background']; ?> ;<?php } ?>background-size: cover;min-height: 400px;">
  <div class="container">
    <h2 style="margin-top: 260px;font-size: 40px;font-weight: bold;">
      <?= $name->{$this->id_language}; ?>
      <?php if(isset($info)){ ?>
            <a href="<?= base_url(); ?>backend/news/posts/add" target="_blank" style="font-size: 13px;"><i class="far fa-plus-square"></i></a>
            <a href="<?= base_url(); ?>backend/news/category/update/<?= $view_url['id']; ?>" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
         <?php } ?>
    </h2>
    <p><i class="bi bi-house-door-fill"></i> Trang chủ / <?= $name->{$this->id_language}; ?></p>
  </div>
</div><!-- End Breadcrumbs -->
<!-- Kiểm tra nếu có thư mục con thì Show thư mục con -->
<?php if(count($lis_sub) > 0){ ?>
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="sidebartitle"><?= $name->{$this->id_language}; ?></div>
      <?= $content_category->{$this->id_language}; ?>
      <div class="row">
        <?php foreach ($lis_sub as $value): ?>
          <?php $img = json_decode($value['imgwebsite']); ?>
          <?php $name = json_decode($value['name']); ?>
          
          <div class="col-md-3 mb-3">
           <a href="<?= $this->id_language.'/'.$value['url_'.$this->id_language]; ?>">
            <img src="<?= $img->{$this->id_language} ?>" width="100%" class="mb-3">
          </a>
          <a href="<?= $this->id_language.'/'.$value['url_'.$this->id_language]; ?>">
            <h6 class="text-center fw-bold"><?= $name->{$this->id_language} ?></h6>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section><!-- End Courses Section -->
<?php }else{ ?>
  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="sidebartitle"><?= $name->{$this->id_language}; ?>
        <?php if(isset($info)){ ?>
            <a href="<?= base_url(); ?>backend/news/category/update/<?= $view_url['id']; ?>" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
         <?php } ?>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php foreach ($list_post as $value): ?>
          <?php $imgwebsite = json_decode($value['imgwebsite']); ?>
          <?php $name_post = json_decode($value['name']); ?>
          <?php $description_post = json_decode($value['description']); ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <a href="<?= base_url().$this->id_language.'/'.$view_url['url_'.$this->id_language].'/'.$value['url_'.$this->id_language]; ?>" style="text-transform: capitalize;">
              <div class="img-post" style="background: url(<?php if(strlen($imgwebsite->{$this->id_language}) > 5){ echo $imgwebsite->{$this->id_language}; }else{ echo $imgwebsite->{'vn'}; } ?>);background-size: cover;background-repeat: no-repeat;"></div>
              <div class="course-content" style="min-height: 90px;">
                <?= $name_post->{$this->id_language}; ?>
              </div>
              </a>
            </div>
          </div> <!-- End Course Item-->
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Courses Section -->
<?php } ?>
