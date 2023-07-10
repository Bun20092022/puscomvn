<?php $info = json_decode($view['seo']); ?>
<div class="row">
<div class="col-md-12">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="header-title mt-0">Thông tin Website</h4>
               <form action="" method="post">
                  <div class="row">
                  <div class="col-md-12 mt-3">
                     <label>Tiêu đề</label>
                     <input type="text" class="form-control" maxlength="75" id="alloptions" name="title" value="<?php echo $info->{'title'};?>">
                     <small class="text-secondary">Tối đa nhập 75 kí tự</small>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Mô tả</label>
                     <textarea id="textarea" class="form-control" maxlength="225" rows="3" placeholder="Nhập nội dung mô tả." name="description"><?php echo $info->{'description'};?></textarea>
                     <small class="text-secondary">Tối đa nhập 225 kí tự</small> 
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Từ khóa</label>
                     <textarea id="textarea" class="form-control" maxlength="500" rows="3" placeholder="Nhập nội dung mô tả." name="keywords"><?php echo $info->{'keywords'};?></textarea>
                     <small class="text-secondary">Cách từ khóa cách nhau bằng dấu " , "</small>                  
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Logo header</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath4" class="form-control" name="logo" value="<?php echo $info->{'logo'};?>">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-sm" value="Load ảnh" onclick="BrowseServer4();" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Logo footer</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath4" class="form-control" name="logofooter" value="<?php echo $info->{'logofooter'};?>">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-sm" value="Load ảnh" onclick="BrowseServer4();" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Url Website</label>
                     <input type="text" class="form-control" name="url" value="<?php echo $info->{'url'};?>">
                  </div>
                  <div class="col-md-4 mt-3">
                     <label>Hotline</label>
                     <input type="text" class="form-control" name="hotline" value="<?php echo $info->{'hotline'};?>">
                  </div>
                  <div class="col-md-4 mt-3">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email" value="<?php echo $info->{'email'};?>">
                  </div>
                  <div class="col-md-4 mt-3">
                     <label>Địa chỉ</label>
                     <input type="text" class="form-control" name="diachi" value="<?php echo $info->{'diachi'};?>">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Link map Google</label>
                     <textarea id="textarea" class="form-control" rows="3" placeholder="Nhập nội dung mô tả." name="map"><?php echo $info->{'map'};?></textarea>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Ảnh đại diện website trên thanh công cụ</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath1" class="form-control" name="favicon" value="<?php echo $info->{'favicon'};?>" onclick="favicon();">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-sm" value="Load ảnh" onclick="BrowseServer1();" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Ảnh Social Website</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath2" class="form-control" name="imgsocial" value="<?php echo $info->{'imgsocial'};?>">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-sm" value="Load ảnh" onclick="BrowseServer2();" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label>Ảnh hiển thị nổi bật Google</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" id="xFilePath3" class="form-control" name="imggoogle" value="<?php echo $info->{'imggoogle'};?>">
                        </div>
                        <div class="col-md-2">
                           <input type="button" class="btn btn-primary btn-sm" value="Load ảnh" onclick="BrowseServer3();" />
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <center><input type="submit" class="btn btn-primary btn-sm" name="update" value="Chỉnh sửa"></center>
                  </div>
               </div>
               </form>
            </div>
            <!--end card-body--> 
         </div>
         <!--end card--> 
      </div>
      <!--end col-->                             
   </div>
   <!--end row-->
</div>
</div>
