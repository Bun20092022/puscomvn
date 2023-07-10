<div class="row">
<div class="col-md-12">
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Chỉnh sửa quản lý ngôn ngữ</h6>
            <form action="" method="post">
               <input type="hidden" name="id" value="<?= $id; ?>">
               <div class="row">
               <div class="col-md-6">
                  <label class="form-label">Chỉnh sửa ngôn ngữ</label>
                  <input type="text" class="form-control" name="name" required value="<?= $view['name']; ?>">
               </div>
               <div class="col-md-3">
                  <label class="form-label">Kí hiệu ngôn ngữ</label>
                  <input type="text" class="form-control" name="name_des" required value="<?= $view['name_des']; ?>" disabled>
               </div>
               <div class="col-md-3">
                  <label class="form-label">Hiển thị</label>
                  <select class="form-control" name="public">
                     <option value="1" <?php if($view['public'] == 1){ echo 'selected'; } ?>>Hiển thị</option>
                     <option value="0" <?php if($view['public'] == 0){ echo 'selected'; } ?>>Không hiển thị</option>
                  </select>
               </div>
               <div class="col-md-12 mt-3">
                     <label class="form-label">Ảnh đại diện website trên thanh công cụ</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath1" class="form-control" name="link_img" value="<?= $view['link_img']; ?>">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-xs" value="Load ảnh" onclick="BrowseServer1();" />
                        </div>
                     </div>
                  </div>
               <div class="col-md-12 mt-3">
               <button class="btn btn-primary btn-xs" type="submit" name="edit">Chỉnh sửa thông tin</button>
            </div>
            </div>
         </div>
      </div>
   </div>

</div>
</div>
</form>