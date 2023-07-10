<?php $lang = json_decode($view['lang']); ?>
<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h6 class="card-title">Chỉnh sửa ngôn ngữ</h6>
                  <form action="" method="post">
                     <div class="row">
                        <div class="col-md-12 mt-3">
                           <label class="form-label">Mô tả nội dung gợi ý</label>
                           <input type="text" class="form-control" name="name" value="<?= $view['name']; ?>" required>
                        </div>
                        <?php foreach ($this->language as $value): ?>
                           <div class="col-md-12 mt-3">
                              <label class="form-label"><?= $value['name']; ?></label>
                              <div class="mb-3">
                                 <label class="form-label">Nội dung</label>
                                 <textarea id="textarea" class="form-control" name="name_<?= $value['name_des']; ?>"><?= $lang->{$value['name_des']}; ?></textarea>
                                 <script>
                                    CKEDITOR.replace('name_<?= $value['name_des']; ?>');
                                 </script>
                              </div> 
                           </div>
                        <?php endforeach ?>
                        <div class="col-md-12 mt-3">
                           <button class="btn btn-primary btn-sm" type="submit" name="update">Chỉnh sửa thông tin</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </form>