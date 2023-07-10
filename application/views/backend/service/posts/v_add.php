<form action="" method="post">
   <div class="row">
      <div class="col-md-12 mb-3">
         <a href="<?= $this->folder; ?>/status/<?= $this->post_type; ?>/2" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách bài viết</a>
      </div>
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name_<?= $this->language_main;?>" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" id="slug" name="url_<?= $this->language_main; ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung <button class="btn btn-sm btn-primary" type="submit" name="add" value="extend"><i class="fa-solid fa-bars"></i> Chỉnh sửa trình soạn thảo nâng cao</button></label>
                  <textarea id="textarea" class="form-control" name="content_<?= $this->language_main;?>"></textarea>
                  <script>
                     CKEDITOR.replace('content_<?= $this->language_main;?>');
                  </script>
               </div>
            </div>
         </div>
         <?php if($this->post_type_id == 2){ ?>
            <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="add_img_product"><i class="fa-regular fa-image"></i> Danh sách hình ảnh sản phẩm</button>
            <div class="card mt-3">
               <div class="card-header">
                  <h4 class="card-title">Thông tin sản phẩm</h4>
               </div>
               <!--end card-header-->
               <div class="card-body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#price" role="tab" aria-selected="true">Giá sản phẩm</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#color" role="tab" aria-selected="true">Màu sắc</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#size" role="tab" aria-selected="true">Kích thước</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#phanphoi" role="tab" aria-selected="true">Nhà phân phối</a>
                     </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane p-3 active" id="price" role="tabpanel">
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Mã sản phẩm <button class="btn btn-sm btn-primary" type="submit" name="add" value="code_product" style="padding: 0px 3px;"><i class="fa-solid fa-plus"></i> Tạo mã</button></label>
                              <select class="select2 form-control mb-3 custom-select" name="code_product">
                                 <option value="0" selected>Không có mã sản phẩm</option>
                                 <?php foreach ($list_code_product as $value): ?>
                                 <option value="<?= $value['id']; ?>"><b><?= $this->Model_main->get_lang($value['product_setup_extend'],$this->language_main); ?></b></option>
                              <?php endforeach ?>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Tình trạng hàng</label>
                              <select class="select2 form-control mb-3 custom-select" name="stock">
                                 <option value="23" selected>Còn hàng</option>
                                 <option value="24">Hết hàng</option>
                              </select>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label class="form-label">Giá tự điền</label>
                              <input type="text" class="form-control" name="price_<?= $this->language_main;?>">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Giá bán</label>
                              <input type="text" class="form-control" name="price_product_<?= $this->language_main;?>">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Giá khuyến mại</label>
                              <input type="text" class="form-control" name="price_event_<?= $this->language_main;?>">
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane p-3" id="color" role="tabpanel">
                        <div class="mb-3">
                           <select class="select2 form-control mb-3 custom-select" multiple="multiple" name="color[]" style="width: 100%; height:36px;">
                              <?php foreach ($list_color as $value): ?>
                                 <option value="<?= $value['id']; ?>"><b><?= $this->Model_main->get_lang($value['product_setup_extend'],$this->language_main); ?></b></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                        <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="color">Thêm màu sắc</button>
                     </div>
                     <div class="tab-pane p-3" id="size" role="tabpanel">
                        <div class="mb-3">
                           <select class="select2 form-control mb-3 custom-select" multiple="multiple" name="size[]" style="width: 100%; height:36px;">
                              <?php foreach ($list_size as $value): ?>
                                 <option value="<?= $value['id']; ?>"><b><?= $this->Model_main->get_lang($value['product_setup_extend'],$this->language_main); ?></b></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                        <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="size">Thêm kích thước</button>
                     </div>
                     <div class="tab-pane p-3" id="phanphoi" role="tabpanel">
                       <div class="mb-3">
                        <select class="select2 form-control mb-3 custom-select" multiple="multiple" name="nhaphanphoi[]" style="width: 100%; height:36px;">
                           <?php foreach ($list_nhaphanphoi as $value): ?>
                              <option value="<?= $value['id']; ?>"><b><?= $this->Model_main->get_lang($value['product_setup_extend'],$this->language_main); ?></b></option>
                           <?php endforeach ?>
                        </select>
                        <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="nhaphanphoi">Thêm nhà phân phối</button>
                     </div>
                  </div>
               </div>
            </div>
            <!--end card-body-->
         </div>
      <?php } ?>
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Thông tin mở rộng Website</h4>
         </div>
         <!--end card-header-->
         <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Seo Website</a>
               </li>
               <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                     <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                     <span class="d-none d-sm-block">Settings</span>    
                  </a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane p-3 active" id="home" role="tabpanel">
                  <div class="mb-3">
                     <label class="form-label">Tên tin tức hiển thị Social</label>
                     <input type="text" class="form-control" name="title_<?= $this->language_main;?>" required id="title">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Mô tả ngắn</label>
                     <textarea id="textarea" class="form-control" maxlength="225" rows="5" name="description_<?= $this->language_main;?>" placeholder="Giới hạn tốt nhất cho Seo là tối đa 225 ki tự hiển thị."></textarea>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Từ khóa</label>
                     <input type="text" class="form-control" name="keywords_<?= $this->language_main;?>">
                  </div>
               </div>
               <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="mb-3">
                     <label class="form-label">Ảnh Background</label>
                     <div class="row">
                        <div class="col-md-8">
                           <input id="xFilePath2" name="imgbackground_<?= $this->language_main; ?>" type="text" size="60" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer2();" />
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Màu sắc hiển thị Background</label>
                     <input type="color" name="color_background" class="form-control form-control-color">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Màu sắc chữ</label>
                     <input type="color" name="color_text" class="form-control form-control-color">
                  </div>
               </div>
            </div>
         </div>
         <!--end card-body-->
      </div>
   </div>
   <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
         <div class="card-body"> 
            <button class="btn btn-sm btn-primary" type="submit" name="add" value="update_all"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
            <button class="btn btn-sm btn-success" type="submit" name="add" value="update_all_close"><i class="fa-solid fa-arrow-right-from-bracket"></i> Lưu và thoát</button>
         </div>
      </div>
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Hiển thị và ngày tháng</h4>
         </div>
         <!--end card-header-->
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <label class="my-3">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="post_status">
                     <option value="3">Bản nháp</option>
                     <option value="2" selected>Công khai</option>
                  </select>
               </div>
               <div class="col-md-6">
                  <label class="my-3">Bình luận</label>
                  <select class="select2 form-control mb-3 custom-select" name="post_comment">
                     <option value="3" selected>Không bình luận</option>
                     <option value="2">Cho phép bình luận</option>
                  </select>
               </div>
               <div class="col-md-12">
                  <label class="my-3">Ngày đăng</label>
                  <div class="input-group">                                            
                     <input type="datetime-local" class="form-control" name="post_date" value="<?= date('Y-m-d H:i:s'); ?>">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Danh mục</h6>
            <?php $this->load->view('backend/service/extend/v_post_by_category'); ?>
            <?php $this->load->view('backend/service/extend/v_post_category_extend'); ?>
            <button class="btn btn-sm btn-primary" type="submit" name="add" value="category"><i class="fa-solid fa-folder-plus"></i> Thêm chuyên mục</button>
         </div>
      </div>
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Thuộc tính bài viết</h4>
         </div>
         <!--end card-header-->
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="mb-3">Danh sách Tags</label>
                  <select class="select2 form-control mb-3 custom-select" multiple="multiple" name="post_tags_id[]" style="width: 100%; height:36px;">
                     <option value="0">Chưa tags</option>
                     <?php foreach ($list_tags as $value): ?>
                        <option value="<?= $value['id']; ?>"><b><?= $this->Model_main->get_lang_symtem($value['name'],$this->language_main,$this->language_main); ?></b></option>
                     <?php endforeach ?>
                  </select>
                  <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="tags"><i class="fa-solid fa-tag"></i> Thêm Tags</button>
               </div>
               <!-- end col -->
               <div class="col-md-12 mb-3">
                  <label class="mb-3">Danh sách Template</label>
                  <select class="select2 form-control mb-3 custom-select" name="post_templates_id" style="width: 100%; height:36px;">
                     <optgroup label="Chọn mẫu Template">
                        <?php foreach ($list_templates as $value): ?>
                           <option value="<?= $value['id']; ?>"><b><?= $value['name']; ?></b></option>
                        <?php endforeach ?>
                     </optgroup>
                  </select>
               </div>
               <!-- end col -->
               <div class="mb-3">
                  <label class="form-label">Ảnh đại diện</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite_<?= $this->language_main;?>" type="text" size="60" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Video đại diện</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite_<?= $this->language_main;?>" type="text" size="60" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Ảnh Socail</label>
                  <div class="row">
                     <div class="col-md-8">
                        <input id="xFilePath" name="imgsocial_<?= $this->language_main;?>" type="text" size="60" class="form-control">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end accordion-item -->
</form>
<script type="text/javascript">
   function checkname() {
     var name = document.getElementById('name').value;
       // Thêm nội dung vào thẻ title và ID ggtitle
     document.getElementById('title').value = name;
  }
</script>