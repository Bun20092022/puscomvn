<div class="row">
   <div class="col-12 col-lg-3">
      <div class="card">
         <div class="card-body">
            <h5 class="my-3">Nhóm Banner</h5>
            <?php foreach ($listfather as $value): ?>
            <div class="fm-menu">
                  <a href="<?php echo $linkaddimg; ?><?= $value['id']; ?>" class="list-group-item py-1" <?php if($value['id'] == $id){ echo 'style="font-weight:bold;"'; } ?>><i class='bx bx-beer me-2'></i><span><?= $value['name']; ?></span></a>
            </div>   
            <?php endforeach ?>
            <h6 class="my-3">Copy vòng lặp banner</h6>
<textarea class="form-control" rows="5">
&lt;?php $listbanner = $this-&gt;Model_frontent-&gt;show_banner_by(<?= $id ?>);?&gt;&#10;&lt;?php foreach ($listbanner as $value): ?&gt;&#10;&lt;!-- Html banner --&gt;&#10;&#10;&lt;?php endforeach ?&gt;
</textarea>
<h6 class="my-3">Hiển thị ảnh</h6>
<textarea class="form-control">
&lt;?= $value[&#39;imgslider&#39;] ?&gt;
</textarea>
<h6 class="my-3">Hiển thị tên</h6>
<textarea class="form-control">
&lt;?= $value[&#39;title&#39;] ?&gt;
</textarea>
<h6 class="my-3">Hiển thị nội dung</h6>
<textarea class="form-control">
&lt;?= $value[&#39;info&#39;] ?&gt;
</textarea>
<h6 class="my-3">Hiển thị link</h6>
<textarea class="form-control">
&lt;?= $value[&#39;link&#39;] ?&gt;
</textarea>
<h6 class="my-3">Hiển thị nội dung nút bấm</h6>
<textarea class="form-control">
&lt;?= $value[&#39;button_name&#39;] ?&gt;
</textarea>
<h6 class="my-3">Hiển thị css nút bấm</h6>
<textarea class="form-control">
&lt;?= $value[&#39;button_css&#39;] ?&gt;
</textarea>
            </div>
         </div>
   </div>
   <div class="col-12 col-lg-9">
      <a href="<?= $add; ?>"><button class="btn btn-primary btn-xs mb-3">Thêm ảnh</button></a>
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-8">
                  <p>Kích thước đề xuất: 900px - 900px</p>
               </div>
               <div class="col-md-4 mb-3" style="text-align: right;">
                  
               </div>
            <?php foreach ($listslidergroup as $value): ?>
               <div class="col-md-4 mb-30">
               <div class="card bookmark bookmark--grid">
               <div class="bookmark__image">
               <img class="card-img-top img-fluid" src="<?php echo $value['imgslider']; ?>" alt="digital-chair">
               </div>
               <div class="card-body px-15 py-20">
               <div class="bookmark__body text-capitalize">
               <h6 class="card-title"><?php echo $value['title']; ?></h6>
               </div>
               <div class="bookmark__button d-flex mt-15 flex-wrap">
                  <a href="backend/setup/banner/updateimg/<?php echo $value['id']; ?>/<?php echo $value['id_slidergroup']; ?>">
               <button class="btn btn-primary btn-xs btn-squared border-0 " data-bs-toggle="modal" data-bs-target="#taskModal2">Edit
               </button>
            </a>
                                    <a href="backend/setup/banner/delete/<?php echo $value['id']; ?>/<?php echo $value['id_slidergroup']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?php echo $value['title'];?>?')">
               <button class="btn btn-xs btn-squared btn-outline-light color-light px-15 color-light">
               Remove
               </button>
            </a>
               </div>
               </div>
               </div>
               </div> 
            <?php endforeach ?>

         </div>
         </div>
      </div>
   </div>
</div>
