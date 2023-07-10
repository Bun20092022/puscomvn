<?php $info = $this->session->userdata('userinfoone'); ?>
<?php 
$this->id_language = $this->session->userdata('ss_languagew');
if(isset($this->id_language)){
   $this->id_language = $this->id_language['name_lang'];
}else{
   $this->id_language = 'vn';
}
?>
<?php 
// Lấy Menu danh mục cha "0" theo ID Menu
$list_menu_father1 = $this->Model_frontent->list_menu_group(0,21);
?>
<nav class="nav-main-menu d-none d-xl-block">
            <ul class="main-menu">
    <?php foreach ($list_menu_father1 as $value1): ?>
        <?php
        $name = $this->Model_frontent->check_name_menu($value1['id']); 
        $url = $this->Model_frontent->check_url_menu($value1['id']); 
        $list_menu_father2 = $this->Model_frontent->list_menu_group($value1['id'],21);
        ?>
        <?php if(count($list_menu_father2) == 0){ ?>
            <li><a href="<?= $url; ?>"><?= $name->{$this->id_language}; ?></a></li>
        <?php }else{ ?>
            <li class="has-children"><a href="<?= $url; ?>"><?= $name->{$this->id_language}; ?></a>
                <ul class="sub-menu">
                    <?php foreach ($list_menu_father2 as $value2): ?>
                      <?php
                      $name = $this->Model_frontent->check_name_menu($value2['id']); 
                      $url = $this->Model_frontent->check_url_menu($value2['id']); 
                      ?>
                      <li><a href="<?= $url; ?>"><?= $name->{$this->id_language}; ?></a></li>
                  <?php endforeach ?>
              </ul>
          </li>
      <?php } ?>
  <?php endforeach ?>
</ul>
          </nav>