<div id="preloader-active">
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-inner position-relative">
      <div class="page-loading">
        <div class="page-loading-inner">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
           <div class="hotline-phone-ring-circle"></div>
           <div class="hotline-phone-ring-circle-fill"></div>
           <div class="hotline-phone-ring-img-circle">
            <a href="tel:<?php $this->Model_info->get_phone(); ?>" class="pps-btn-img" id="12345168">
               <img src="<?= base_url(); ?>public/frontent/img/icon-call-nh.png" alt="Gọi điện thoại" width="50">
           </a>
       </div>
   </div>
   <div class="hotline-bar">
      <a href="tel:<?php $this->Model_info->get_phone(); ?>">
         <span class="text-hotline"><?php $this->Model_info->get_phone(); ?></span>
     </a>
 </div>
</div>