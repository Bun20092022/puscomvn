<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Chỉnh sửa quản lý website</h6>
            <form action="" method="post">
               <input type="hidden" name="id" value="<?= $id; ?>">
               <div class="mb-3">
                  <label class="form-label">Chỉnh sửa website</label>
                  <input type="text" class="form-control" name="website" required value="<?= $view['website']; ?>">
               </div>
               <button class="btn btn-primary" type="submit" name="edit">Chỉnh sửa thông tin</button>
            </form>
         </div>
      </div>
   </div>
</div>
