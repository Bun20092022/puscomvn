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
</style>
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
      <?php 
      $check_list_category = array(
        'father_id' => $view_url['id'],
        'post_status' => 2,
      ); 
      $list_category = $this->Model_backend->get_where('qh_post_category',$check_list_category);
      ?>
      <div class="row mt-50">
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
  </section>
  <script></script>