<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h6 class="card-title">Thêm quản lý Social</h6>
                  <form action="" method="post">
                     <div class="row">
                        <?php foreach ($this->language as $value): ?>
                           <div class="col-md-12 mt-3">
                              <label class="form-label"><?= $value['name']; ?></label>
                              <input type="text" class="form-control" name="name_<?= $value['name_des']; ?>">
                           </div>
                        <?php endforeach ?>
                        <div class="col-md-12 mt-3">
                           <button class="btn btn-primary btn-sm" type="submit" name="add">Thêm thông tin</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </form>