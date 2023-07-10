<?php $name = json_decode($view_posts_setup['product_setup_extend']) ?>
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-header">
            <h6 class="card-title"><?= $view_posts_setup['product_setup_group']; ?> sản phẩm</h6>
         </div>
         <div class="card-body">
            <form action="" method="post">
               <div class="mb-3">
                  <label class="form-label">Tên <?= $view_posts_setup['product_setup_group'] ?></label>
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                     <?php $dem = 0; ?>
                     <?php foreach ($this->language as $value): ?>
                        <?php $dem += 1; ?>
                        <li class="nav-item" role="presentation">
                           <a class="nav-link <?php if($dem == 1){ echo 'active'; } ?>" data-bs-toggle="tab" href="#tab<?= $value['id']; ?>" role="tab" aria-selected="true">
                              <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                              <span class="d-none d-sm-block"><?= $value['name']; ?></span> 
                           </a>
                        </li>
                     <?php endforeach ?>
                  </ul>
                  <div class="tab-content p-3 text-muted">
                     <?php $dem = 0; ?>
                     <?php foreach ($this->language as $value): ?>
                        <?php $dem += 1; ?>
                        <div class="tab-pane <?php if($dem == 1){ echo 'active'; } ?>" id="tab<?= $value['id']; ?>" role="tabpanel">
                           <label class="form-label">Tên <?= $view_posts_setup['product_setup_group'] ?> <?= $value['name']; ?></label>
                           <input type="text" class="form-control" name="name_<?= $value['name_des']; ?>" value="<?= $name->{$value['name_des']}; ?>" required>
                        </div>
                     <?php endforeach ?>
                  </div>
               </div>
               <?php if($view_posts_setup_father['id'] == 1){ ?>
               <div class="mb-3">
                  <label class="form-label">Ảnh đại diện màu sắc(Kích thước 90px x 90px)</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="link_image" type="text" size="60" class="form-control" value="<?= $view_posts_setup['link_image']; ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Mã <?= $view_posts_setup['product_setup_group'] ?></label>
                  <input type="text" class="form-control" name="product_color" id="colorpicker-showinput-intial" value="<?= $view_posts_setup['product_color']; ?>" required>
               </div>
               <?php } ?>
               <?php if($view_posts_setup_father['id'] == 3){ ?>
               <div class="mb-3">
                  <label class="form-label">Logo nhà phân phối</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="link_image" type="text" size="60" class="form-control" value="<?= $view_posts_setup['link_image']; ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <?php } ?>
               <button class="btn btn-primary" type="submit" name="edit">Chỉnh sửa <?= $view_posts_setup_father['product_setup_group'] ?></button>
         </div>
      </div>
   </div>
</div>
</form>