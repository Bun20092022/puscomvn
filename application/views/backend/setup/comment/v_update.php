<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Nội dung Comment</h6>
            <form action="" method="post">
               <div class="mb-3">
                  <label class="form-label">Tên Comment</label>
                  <input type="text" class="form-control" name="name" value="<?= $view['name']; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung Comment</label>
                  <textarea class="form-control" rows="5" name="comment_text" required><?= $view['comment_text']; ?></textarea>
                  <script>
                     CKEDITOR.replace('comment_text');
                  </script>
               </div>
               <div class="mb-3">
                  <label class="form-label">Trả lời Comment</label>
                  <textarea class="form-control" rows="5" name="comment_rep"><?= $view['comment_rep']; ?></textarea>
                  <script>
                     CKEDITOR.replace('comment_rep');
                  </script>
               </div>
               <button class="btn btn-primary" type="submit" name="edit">Chỉnh sử Comment</button>
            </div>
         </div>
      </div>
      <
   </div>
</form>