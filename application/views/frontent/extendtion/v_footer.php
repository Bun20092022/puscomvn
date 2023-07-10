<?php $info = $this->session->userdata('userinfoone'); ?>
<?php
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
 $this->id_language = $language['name_lang'];
}else{
 $this->id_language = 'vn';
}

?>
<?php $view_service = $this->Model_frontent->view_id('qh_system_template',22); ?>
<?php $view_title = $this->Model_frontent->view_id('qh_setup_extend',$view_service['id_text']); ?>

<?php $view_menu_1 = $this->Model_frontent->view_id('qh_setup_menu',96); ?>
<?php $view_title_1 = $this->Model_frontent->view_id('qh_setup_extend',$view_menu_1['id_text']); ?>
<?php $name_menu_1 = json_decode($view_title_1['lang']); ?>
<?php $list_menu_father1 = $this->Model_frontent->list_menu_group(0,96); ?>

<?php $view_menu_2 = $this->Model_frontent->view_id('qh_setup_menu',98); ?>
<?php $view_title_2 = $this->Model_frontent->view_id('qh_setup_extend',$view_menu_2['id_text']); ?>
<?php $name_menu_2 = json_decode($view_title_2['lang']); ?>
<?php $list_menu_father2 = $this->Model_frontent->list_menu_group(0,98); ?>

<?php $view_menu_3 = $this->Model_frontent->view_id('qh_setup_menu',101); ?>
<?php $view_title_3 = $this->Model_frontent->view_id('qh_setup_extend',$view_menu_3['id_text']); ?>
<?php $name_menu_3 = json_decode($view_title_3['lang']); ?>
<?php $list_menu_father3 = $this->Model_frontent->list_menu_group(0,101); ?>

<?php $view_footer_2 = $this->Model_frontent->view_id('qh_setup_extend',32); ?>
<?php $name_footer_2 = json_decode($view_footer_2['lang']); ?>

<!-- ======= Footer ======= -->
<footer id="footer" style="background:<?= $view_service['color_background']; ?>;color:<?= $view_service['color_text']; ?>">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 footer-contact">
          <img src="<?php $this->Model_info->get_logofooter(); ?>" alt="" width="100%">
          <?php if(isset($info)){ ?><a href="<?= base_url(); ?>bbackend/setup/general/main/infowebsite" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
        </div>
        <div class="col-lg-2 col-md-6 footer-links">
          <h4><?= $name_menu_1->{$this->id_language}; ?>
            <?php if(isset($info)){ ?><a href="<?= base_url(); ?>backend/news/menu/group/96" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
          </h4>
          <ul>
            <?php foreach ($list_menu_father1 as $value1): ?>
             <?php
             $name = $this->Model_frontent->check_name_menu($value1['id']); 
             $url = $this->Model_frontent->check_url_menu($value1['id']); 
             ?>
             <li><i class="bx bx-chevron-right"></i> 
              <a href="<?= $url; ?>"><?php if(strlen($name->{$this->id_language}) < 3){ echo $name->{'vn'}; }else{ echo $name->{$this->id_language}; } ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 footer-links">
        <h4><?= $name_menu_2->{$this->id_language}; ?>
          <?php if(isset($info)){ ?><a href="<?= base_url(); ?>backend/news/menu/group/98" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
        </h4>
        <ul>
          <?php foreach ($list_menu_father2 as $value1): ?>
             <?php
             $name = $this->Model_frontent->check_name_menu($value1['id']); 
             $url = $this->Model_frontent->check_url_menu($value1['id']); 
             ?>
             <li><i class="bx bx-chevron-right"></i> 
              <a href="<?= $url; ?>"><?php if(strlen($name->{$this->id_language}) < 3){ echo $name->{'vn'}; }else{ echo $name->{$this->id_language}; } ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="col-lg-4 col-md-6 footer-links">
        <h4><?= $name_menu_3->{$this->id_language}; ?>
          <?php if(isset($info)){ ?><a href="<?= base_url(); ?>backend/news/menu/group/101" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
        </h4>
        <ul>
          <?php foreach ($list_menu_father3 as $value1): ?>
             <?php
             $name = $this->Model_frontent->check_name_menu($value1['id']); 
             $url = $this->Model_frontent->check_url_menu($value1['id']); 
             ?>
             <li><i class="bx bx-chevron-right"></i> 
              <a href="<?= $url; ?>"><?php if(strlen($name->{$this->id_language}) < 3){ echo $name->{'vn'}; }else{ echo $name->{$this->id_language}; } ?></a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <hr>
      <div class="col-md-8">
        <?php if(isset($info)){ ?><a href="<?= base_url(); ?>backend/setup/general/extend_website/update/32" target="_blank" style="font-size: 15px;color:green"><i class="far fa-edit"></i></a><?php } ?>
        <?= $name_footer_2->{$this->id_language}; ?>
      </div>
    </div>
  </div>
</div>
  </footer><!-- End Footer -->