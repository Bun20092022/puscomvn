<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title mb-3">Thêm thông tin <?= $view_work['extend']; ?></h6>
            <form action="" method="post">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label for="exampleInputText1">Tên nhân viên</label>
                     <input type="text" class="form-control" name="name" required value="<?= $view_ns['name']; ?>">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="exampleInputText1">Mã nhân sự</label>
                     <input type="text" class="form-control" name="manhansu" value="<?= $view_ns['manhansu']; ?>">
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputText1">User đăng nhập</label>
                     <input type="text" class="form-control" name="username" disabled value="<?= $view_ns['username']; ?>">
                  </div>
                  <div class="form-group col-md-12">
                     <label for="exampleInputText1">Password</label>
                     <input type="text" class="form-control" name="password" required value="<?= $view_ns['password']; ?>">
                  </div>

                  <div class="form-group col-md-12">
                     <label for="exampleInputText1">Số điện thoại</label>
                     <input type="text" class="form-control" name="phone" value="<?= $view_ns['phone']; ?>">
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="form-label">Ghi chú</label>
                     <textarea rows="6" class="form-control" name="ghichu"><?= $view_ns['ghichu']; ?></textarea>
                  </div>  
                  <div class="form-group col-md-12">
                     <button class="btn btn-primary" type="submit" name="update">Thêm thông tin</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
