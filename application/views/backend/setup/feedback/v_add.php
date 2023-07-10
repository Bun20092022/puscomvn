<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Nội dung Feedback</h6>
            <form action="" method="post">
               <div class="mb-3">
                  <label class="form-label">Tên Feedback</label>
                  <input type="text" class="form-control" name="name" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung Feedback</label>
                  <textarea class="form-control" name="feedback"></textarea>
               </div>
               <div class="mb-3">
                  <label class="form-label">Ảnh người Feedback</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath2" name="img_account" type="text" size="60" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer2();" />
                     </div>
                  </div>
               </div>
               <button class="btn btn-primary" type="submit" name="add">Thêm Feedback</button>
            </div>
         </div>
      </div>
      <
   </div>
</form>