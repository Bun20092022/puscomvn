<div class="card">
   <div class="card-body">
      <h6 class="card-title">Tải hình ảnh từ link</h6>
      <form action="" method="post">
         <div class="mb-3">
            <label class="form-label">Link hình ảnh</label>
            <input type="text" class="form-control" name="link_image" required>
         </div>
         <button class="btn btn-sm btn-primary" type="submit" name="add">Get Image</button>
      </form>
   </div>
</div>
<div class="card">
   <div class="card-body">
      <h6 class="card-title">Link hình ảnh đã Get Ảnh</h6>
         <input type="text" class="form-control" value="<?= $view['link_image']; ?>">
   </div>
</div>