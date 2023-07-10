<?php if($this->session->flashdata('access') == 'ok'){?>
   <div class="alert alert-success border-0" role="alert">
     <strong>Thành Công!</strong> <?= $this->session->flashdata('messenger'); ?>
  </div>
<?php } ?>
<?php if($this->session->flashdata('error') == 'ok'){?>
   <div class="alert alert-danger border-0" role="alert">
     <strong>Thất bại!</strong> <?= $this->session->flashdata('messenger'); ?>
  </div>
<?php } ?>