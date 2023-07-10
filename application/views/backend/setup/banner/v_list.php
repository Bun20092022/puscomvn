<div class="row">
   <div class="col-12 col-lg-3">
      <div class="card">
         <div class="card-body">
            <h5 class="my-3">Nhóm Banner</h5>
            <?php foreach ($listfather as $value): ?>
            <div class="fm-menu">
                  <a href="<?php echo $this->folder.'/list/'; ?><?= $value['id']; ?>" class="list-group-item py-1"><i class='bx bx-beer me-2'></i><span><?= $value['name']; ?></span></a>
            </div>   
            <?php endforeach ?>
            </div>
         </div>
   </div>
   <div class="col-12 col-lg-9">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Nội dung chuyên mục</h6>
            <form action="" method="post">
               <input type="hidden" name="template_id" value="<?= $id; ?>">
               <div class="mb-3">
                  <label class="form-label">Code File</label>
<textarea class="form-control" rows="30" name="codefile" id="editor">
<?php
    $read = file($view['link_file']);
    foreach ($read as $line) {
    echo $line;
    }
?>
</textarea>
               </div>   
               <button class="btn btn-primary" type="submit" name="edit">Chỉnh sửa thông tin</button>
         </div>
      </div>
   </div>
</div>
