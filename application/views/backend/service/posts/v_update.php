<?php $post_category_id = json_decode($view['post_category_id']); ?>
<?php $post_tags_id = json_decode($view['post_tags_id']); ?>
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
                  <input type="text" class="form-control" name="name_<?= $language;?>" id="name" onkeyup="ChangeToSlug();" <?php if(strlen($this->Model_main->get_lang_symtem($view['title'],$language,$this->language_main)) == 0){ ?>oninput="checkname()"<?php } ?> required  value="<?= $this->Model_main->get_lang_symtem($view['name'],$language,$this->language_main); ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" <?php if(strlen($view['url_'.$language]) == 0){ echo 'id="slug"'; } ?> name="url_<?= $language; ?>" value="<?= $view['url_'.$language]; ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung <button class="btn btn-sm btn-primary" type="submit" name="add" value="extend">Chỉnh sửa trình soạn thảo nâng cao</button></label>
                  <textarea id="textarea" class="form-control" name="content_<?= $language;?>"><?= $this->Model_main->get_lang_symtem($view['content'],$language,$this->language_main); ?></textarea>
                  <script>
                     CKEDITOR.replace('content_<?= $language;?>');
                  </script>
               </div>
            </div>
         </div>
         <div class="card">
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
                     <a class="nav-link" data-bs-toggle="tab" href="#phanphoi" role="tab" aria-selected="true">Nhà phân phối</a>
                  </li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div class="tab-pane p-3 active" id="price" role="tabpanel">
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <label class="form-label">Mã sản phẩm( Để trống sẽ tự sinh mã sản phẩm )</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                        <div class="col-md-12 mb-3">
                           <label class="form-label">Giá tự điền</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Giá bán</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Giá khuyến mại</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane p-3" id="color" role="tabpanel">
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <label class="form-label">Màu sắc</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane p-3" id="phanphoi" role="tabpanel">
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <label class="form-label">Nhà phân phối</label>
                           <input type="text" class="form-control" name="code_product" value="">
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <!--end card-body-->
         </div>

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
                        <input type="text" class="form-control" name="title_<?= $language;?>" required value="<?= $this->Model_main->get_lang_symtem($view['title'],$language,$this->language_main); ?>" <?php if(strlen($this->Model_main->get_lang_symtem($view['title'],$language,$this->language_main)) == 0){ echo 'id="title"'; } ?>>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Mô tả ngắn</label>
                        <textarea id="textarea" class="form-control" maxlength="225" rows="5" name="description_<?= $language;?>" placeholder="Giới hạn tốt nhất cho Seo là tối đa 225 ki tự hiển thị."><?= $this->Model_main->get_lang_symtem($view['description'],$language,$this->language_main); ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Từ khóa</label>
                        <input type="text" class="form-control" name="keywords_<?= $language;?>" value="<?= $this->Model_main->get_lang_symtem($view['keywords'],$language,$this->language_main); ?>">
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
               <button class="btn btn-sm btn-success" type="submit" name="add" value="update_all_close">Lưu và thoát</button>
               <?php if($view['post_status'] == 3){ ?>
                  <a href="<?= $this->folder; ?>/delete/<?= $view['id']; ?>/2" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa bản nháp?')">
                     <button class="btn btn-sm btn-danger" type="button" name="edit">Xóa nháp</button>
                  </a>
               <?php } ?>
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
                        <option value="3" <?php if($view['post_status'] == 3){ echo 'selected'; } ?>>Bản nháp</option>
                        <option value="2" <?php if($view['post_status'] == 2){ echo 'selected'; } ?>>Công khai</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="my-3">Bình luận</label>
                     <select class="select2 form-control mb-3 custom-select" name="post_comment">
                        <option value="3" <?php if($view['post_comment'] == 3){ echo 'selected'; } ?>>Không bình luận</option>
                        <option value="2" <?php if($view['post_comment'] == 2){ echo 'selected'; } ?>>Cho phép bình luận</option>
                     </select>
                  </div>
                  <div class="col-md-12">
                     <label class="my-3">Ngày đăng</label>
                     <div class="input-group">                                            
                        <input type="datetime-local" class="form-control" name="post_date" value="<?= date('Y-m-d H:i:s',$view['post_date']); ?>">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Danh mục</h6>
               <?php $data_update['post_category_id_ze'] = $view['post_category_id_ze']; ?>
               <?php $this->load->view('backend/service/extend/v_post_by_category',$data_update); ?>
               <?php $data_extend['post_category_id'] = $view['post_category_id']; ?>
               <?php $this->load->view('backend/service/extend/v_post_category_extend',$data_extend); ?>
               <button class="btn btn-sm btn-primary" type="submit" name="add" value="category">Thêm chuyên mục</button>
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
                        <?php foreach ($list_tags as $value): ?>
                           <option value="<?= $value['id']; ?>" <?php if(in_array($value['id'], $post_tags_id)){ echo 'selected'; } ?>><b><?= $this->Model_main->get_lang_symtem($value['name'],$language,$this->language_main); ?></b></option>
                        <?php endforeach ?>
                     </select>
                     <button class="btn btn-sm btn-primary mt-3" type="submit" name="add" value="tags">Thêm Tags</button>
                  </div>
                  <!-- end col -->
                  <div class="col-md-12 mb-3">
                     <label class="mb-3">Danh sách Template</label>
                     <select class="select2 form-control mb-3 custom-select" name="post_templates_id" style="width: 100%; height:36px;">
                        <optgroup label="Chọn mẫu Template">
                           <?php foreach ($list_templates as $value): ?>
                              <option value="<?= $value['id']; ?>" <?php if($view['post_templates_id'] == $value['id']){ echo 'selected'; } ?>><b><?= $value['name']; ?></b></option>
                           <?php endforeach ?>
                        </optgroup>
                     </select>
                  </div>
                  <!-- end col -->
                  <div class="mb-3">
                     <label class="form-label">Ảnh website</label>
                     <div class="row">
                        <div class="col-md-8">
                           <input id="xFilePath1" name="imgwebsite_<?= $language;?>" type="text" size="60" class="form-control" value="<?= $this->Model_main->get_lang_symtem($view['imgwebsite'],$language,$this->language_main); ?>">
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
                           <input id="xFilePath" name="imgsocial_<?= $language;?>" type="text" size="60" class="form-control" value="<?= $this->Model_main->get_lang_symtem($view['imgsocial'],$language,$this->language_main); ?>">
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