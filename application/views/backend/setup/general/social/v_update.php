<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Chỉnh sửa quản lý website</h6>
            <form action="" method="post">
               <input type="hidden" name="id" value="<?= $id; ?>">
               <div class="row">
                  <div class="col-md-6 mt-3">
                     <label class="form-label">Thêm tên Social</label>
                     <input type="text" class="form-control" name="name_social" required value="<?= $view['name_social']; ?>">
                  </div>
                  <div class="col-md-6 mt-3">
                     <label class="form-label">Thêm class Social</label>
                     <input type="text" class="form-control" name="class_social" value="<?= $view['class_social']; ?>">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label class="form-label">Thêm link liên kết Social</label>
                     <input type="text" class="form-control" name="link_socical" value="<?= $view['link_socical']; ?>">
                  </div>
                  <div class="col-md-6 mt-3">
                     <label class="form-label">Thứ tự</label>
                     <input type="text" class="form-control" name="num_social" value="<?= $view['num_social']; ?>">
                  </div>
                  <div class="col-md-12 mt-3">
                     <button class="btn btn-primary btn-xs" type="submit" name="edit">Chỉnh sửa thông tin</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

   </div>
</div>
