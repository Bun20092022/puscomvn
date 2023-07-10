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
<header class="header sticky-bar">
  <div class="container">
    <div class="main-header">
      <div class="header-left">
        <div class="header-logo"><a class="d-flex" href=""><img alt="Ecom" src="public/img/logo.png"></a></div>
        <div class="header-nav">
          <?php $this->load->view('frontent/extendtion/v_menu'); ?>
          <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
        </div>
        <div class="header-right">
          <div class="d-inline-block box-search-top">
            <div class="form-search-top">
              <form action="#">
                <input class="input-search" type="text" placeholder="Search...">
                <button class="btn btn-search">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div><span class="font-lg icon-list search-post"><i class="fa-solid fa-magnifying-glass"></i></span>
          </div>
          <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span class="font-lg color-grey-900 arrow-down">VN</span></span>
            <div class="dropdown-account">
              <ul>
                <li><a class="font-md" href="#"><img src="public/frontent/assets/imgs/template/icons/en.png" alt="iori">
                English</a></li>
                <li><a class="font-md" href="#"><img src="public/frontent/assets/imgs/template/icons/en.png" alt="iori">
                Việt Nam</a></li>
              </ul>
            </div>
          </div>
          <div class="d-none d-sm-inline-block"><a class="btn btn-brand-1 hover-up" href="">KHO GIAO DIỆN</a></div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
  <div class="mobile-header-wrapper-inner">
    <div class="mobile-header-content-area">
      <div class="mobile-logo"><a class="d-flex" href=""><img alt="IORI" src="public/img/logo.png"></a></div>
      <div class="burger-icon"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
      <div class="perfect-scroll">
        <div class="mobile-menu-wrap mobile-header-border">
          <ul class="nav nav-tabs nav-tabs-mobile mt-25" role="tablist">
            <li><a class="active" href="#tab-menu" data-bs-toggle="tab" role="tab" aria-controls="tab-menu" aria-selected="true">
              <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>Menu</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tab-menu" role="tabpanel" aria-labelledby="tab-menu">
                <nav class="mt-15">
                  <ul class="mobile-menu font-heading">
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
            </div>
          </div>
        </div>
        <div class="site-copyright color-grey-400 mt-0">
          <div class="box-download-app">
            <p class="font-xs color-grey-400 mb-25">Download our Apps and get extra 15% Discount on your first Order…!</p>
            <div class="mb-25"><a class="mr-10" href=""><img src="public/frontent/assets/imgs/template/appstore.png" alt="iori"></a><a href=""><img src="public/frontent/assets/imgs/template/google-play.png" alt="iori"></a></div>
            <p class="font-sm color-grey-400 mt-20 mb-10">Secured Payment Gateways</p><img src="public/frontent/assets/imgs/template/payment-method.png" alt="iori">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>