<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title mb-3">Thông tin người dùng</h6>
            <form action="" method="post">
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="form-label">Tên người dùng</label>
                     <input type="text" class="form-control" name="name" required value="<?= $view_user['name']; ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Bộ phận</label>
                     <input type="text" class="form-control" name="bophan" value="<?= $view_user['bophan']; ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Số điện thoại</label>
                     <input type="text" class="form-control" name="phone" value="<?= $view_user['phone']; ?>">
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="form-label">Mật khẩu</label>
                     <div class="input-group">                                            
                        <input type="text" class="form-control" name="password" value="<?= $view_user['password']; ?>">
                    </div>
                 </div>
               <div class="col-md-12">                                   
                  <button class="btn btn-primary" type="submit" name="update">Thay đổi thông tin</button>
               </div><!-- end col -->
            </div>
         </form>
      </div>
   </div>
</div>
</div>
