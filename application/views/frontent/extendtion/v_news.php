<style type="text/css">
  .sidebartitle {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 30px;
  }
  .sidebartitle:after {
    content: '';
    display: block;
    width: 30px;
    height: 3px;
    background: #85c44e;
    margin-top: 5px;
  }
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
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',27); ?>
<?php $view_show = $this->Model_frontent->view_id('qh_system_template_setup',$view_service['num_show']); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>
<?php $view_title1 = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text1']); ?>
<?php $view_title2 = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text2']); ?>
<?php 
$lang_title = json_decode($view_title['lang']); 
$lang_title1 = json_decode($view_title1['lang']); 
$lang_title2 = json_decode($view_title2['lang']); 
?>
<?php 
$list_category = $this->db->select('*')->from('qh_system_template_extend')->where('id_symtem_template',27)->get()->result_array();
$array_post = array();
foreach ($list_category as $value) {
   array_push($array_post, $value['id_category']);
}

$get_all_post = $this->db->select('*')->from('qh_posts')->where('post_status',2)->order_by('id','desc')->get()->result_array();

?>
<?php $dem = 0; ?>
<?php foreach ($get_all_post as $value): ?>
  <?php if(in_array($value['post_category_id_ze'], $array_post)){ ?>
    <?php $view_category = $this->Model_frontent->view_id('qh_post_category',$value['post_category_id_ze']); ?>
  <?php $img = json_decode($value['imgwebsite']); ?>
  <?php $name = json_decode($value['name']); ?>
  <?php $description = json_decode($value['description']); ?>
  <?php $dem += 1; ?>
  <?php 
  if($dem == 1){
    $url1 = base_url().'/'.$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language];
    $name1 = $name->{$this->id_language};
    $img1 = $img->{$this->id_language};
    $description1 = $description->{$this->id_language};
    }
    if($dem == 2){
    $url2 = base_url().'/'.$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language];
    $name2 = $name->{$this->id_language};
    $img2 = $img->{$this->id_language};
    $description2 = $description->{$this->id_language};
    }
    if($dem == 3){
    $url3 = base_url().'/'.$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language];
    $name3 = $name->{$this->id_language};
    $img3 = $img->{$this->id_language};
    $description3 = $description->{$this->id_language};
    }
    if($dem == 4){
    $url4 = base_url().'/'.$this->id_language.'/'.$view_category['url_'.$this->id_language].'/'.$value['url_'.$this->id_language];
    $name4 = $name->{$this->id_language};
    $img4 = $img->{$this->id_language};
    $description4 = $description->{$this->id_language};
    }
   ?>
 <?php } ?>
<?php endforeach ?>
    <!-- ======= About Section ======= -->
    <section style="background:url(<?= $view_service['link_img']; ?>);min-height: 200px;background-size: cover;">
      <div class="container" data-aos="fade-up">
        <h2 class="text-center fw-bold" style="color:#fff;"><?= $lang_title->{$this->id_language}; ?>
          <?php if(isset($info)){ ?>
         <a href="backend/symtem/thitruong" target="_blank" style="font-size: 13px;"><i class="far fa-edit"></i></a>
      <?php } ?>
        </h2>
        <div class="row" style="margin-top:50px">
          <div class="col-md-3 mb-3" style="background: #fff;min-height:400px;padding-top: calc(var(--bs-gutter-x) * .5)">
            <?php if(isset($img1)){ ?>
            <img src="<?= $img1; ?>" alt="" width="100%" style="border-radius: 5px;">
            <a href="<?= $url1; ?>">
              <h6 class="fw-bold" style="margin-top: 20px;"><?= $name1; ?></h6>
            </a>
            <p><?= $description1; ?></p>
          <?php } ?>
          </div>
          <div class="col-md-6">
            <div class="row" style="padding-left: 15px;padding-right: 15px;">
              <?php if(isset($img2)){ ?>
              <div class="col-md-12 mb-3" style="background: #fff;padding-top: calc(var(--bs-gutter-x) * .5);padding-bottom: calc(var(--bs-gutter-x) * .5)">
                
                <div class="row">
                  <div class="col-md-5"><img src="<?= $img2; ?>" alt="" width="100%"></div>
                  <div class="col-md-7">
                    <a href="<?= $url2; ?>">
                    <h6 class="fw-bold" style="margin-top: 20px;"><?= $name2; ?></h6>
                  </a>
                    <p><?= $description2; ?></p>
                  </div>
                </div>
              </div>
              <?php } ?>
               <?php if(isset($img3)){ ?>
              <div class="col-md-12 mb-3" style="background: #fff;padding-top: calc(var(--bs-gutter-x) * .5);padding-bottom: calc(var(--bs-gutter-x) * .5)">
               
                <div class="row">
                  <div class="col-md-5"><img src="<?= $img3; ?>" alt="" width="100%"></div>
                  <div class="col-md-7">
                    <a href="<?= $url3; ?>">
                    <h6 class="fw-bold" style="margin-top: 20px;"><?= $name3; ?></h6>
                  </a>
                    <p><?= $description3; ?></p>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php if(isset($img4)){ ?>
              <div class="col-md-12 mb-3" style="background: #fff;padding-top: calc(var(--bs-gutter-x) * .5);padding-bottom: calc(var(--bs-gutter-x) * .5)">
                <div class="row">
                  <div class="col-md-5"><img src="<?= $img4; ?>" alt="" width="100%"></div>
                  <div class="col-md-7">
                    <a href="<?= $url4; ?>">
                    <h6 class="fw-bold" style="margin-top: 20px;"><?= $name4; ?></h6>
                  </a>
                    <p><?= $description4; ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="col-md-3 mb-3" style="background: #fff;min-height:400px;padding-top: calc(var(--bs-gutter-x) * .5)">
            <?= $lang_title1->{$this->id_language}; ?>
            <marquee width="100%" height="250" direction="up" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
            <?= $lang_title2->{$this->id_language}; ?>
            </marquee>
            <style type="text/css">
              .sidebartitle {
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
              }
              .sidebartitle:after {
                content: '';
                display: block;
                width: 30px;
                height: 3px;
                background: #85c44e;
                margin-top: 5px;
              }
            </style>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->