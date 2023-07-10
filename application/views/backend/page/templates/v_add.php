<h6 class="mb-0 text-uppercase"><?php if(isset($title)){ echo $title; } ?></h6>
<hr/>
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Nội dung thẻ templates</h6>
            <form action="" method="post">
               <input type="hidden" name="template_type" value="<?= $template_type; ?>">
               <div class="mb-3">
                  <label class="form-label">Tên thẻ templates</label>
                  <input type="text" class="form-control" name="name" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" disabled name="template_link">
               </div>
               <button class="btn btn-primary" type="submit" name="add">Thêm thông tin</button>
         </div>
      </div>
   </div>
</div>
</form>