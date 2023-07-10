<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title"><?php if(isset($title)){ echo $title; } ?></h6>
            <form action="" method="post">
               <div class="form-group col-md-12">
                  <label for="exampleInputText1">Tên banner</label>
                  <input type="text" class="form-control" name="title" >
               </div>
               <div class="form-group col-md-12">
                              <label>Content</label>
                              <textarea id="textarea" class="form-control" rows="3" placeholder="Nhập nội dung mô tả." name="info"></textarea>
                           <script>
                              CKEDITOR.replace('info');
                           </script>
                           </div>
               <div class="form-group col-md-12">
                  <label for="exampleInputEmail3">Tên trên nút hiển thị</label>
                  <input type="text" class="form-control" name="button_name">
               </div>
               <div class="form-group col-md-12">
                  <label>Ảnh banner</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgslider" type="text" size="60" class="form-control" value="">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <label for="exampleInputEmail3">Link dẫn</label>
                  <input type="text" class="form-control" name="link">
               </div>
               <div class="form-group col-md-12">
                  <label for="exampleInputEmail3">Vị trí</label>
                  <input type="text" class="form-control" name="num">
               </div>
               <button class="btn btn-primary" type="submit" name="themthongtin">Thêm thông tin</button>
         </div>
      </div>
   </div>
</div>
</form>