<form action="" method="post">
   <div class="row">
      <div class="col-md-9 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung Tags</h6>
               <div class="mb-3">
                  <label class="form-label">Tên Tags</label>
                  <input type="text" class="form-control" name="name_<?= $language; ?>" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" value="<?= $this->Model_main->get_lang_symtem($view['name'],$language,$this->language_main); ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" <?php if(strlen($view['url_'.$language]) == 0){ echo 'id="slug"'; } ?> name="url_<?= $language; ?>" value="<?= $view['url_'.$language];?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Nội dung</label>
                  <textarea id="textarea" class="form-control" name="content_<?= $language; ?>"><?= $this->Model_main->get_lang_symtem($view['content'],$language,$this->language_main); ?></textarea>
                  <script>
                     CKEDITOR.replace('content_<?= $language; ?>');
                  </script>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h6 class="card-title">Cài đặt Tags</h6>
            </div>
            <div class="card-body">
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Tối ưu Seo</span>    
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Settings</span>    
                     </a>
                  </li>
               </ul>
               <div class="tab-content p-3 text-muted">
                  <div class="tab-pane active" id="home" role="tabpanel">
                     <div class="mb-3">
                        <label class="form-label">Tên tin tức hiển thị Social</label>
                        <input type="text" class="form-control" name="title_<?= $language; ?>" id="title" value="<?= $this->Model_main->get_lang_symtem($view['title'],$language,$this->language_main); ?>" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Mô tả ngắn</label>
                        <textarea class="form-control" rows="5" name="description_<?= $language; ?>"><?= $this->Model_main->get_lang_symtem($view['description'],$language,$this->language_main); ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Từ khóa</label>
                        <input type="text" class="form-control" name="keywords_<?= $language; ?>" value="<?= $this->Model_main->get_lang_symtem($view['keywords'],$language,$this->language_main); ?>">
                     </div>
                  </div>
                  <div class="tab-pane" id="settings" role="tabpanel">
                     <div class="mb-3">
                        <img src="<?= $this->Model_main->get_lang_symtem($view['img_background'],$language,$this->language_main); ?>" alt="" width="300px">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Ảnh Background</label>
                        <div class="row">
                           <div class="col-md-8">
                              <input id="xFilePath2" name="imgbackground_<?= $language; ?>" type="text" size="60" class="form-control" value="<?= $this->Model_main->get_lang_symtem($view['img_background'],$language,$this->language_main); ?>">
                           </div>
                           <div class="col-md-4">
                              <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer2();" />
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Màu sắc hiển thị Background</label>
                        <input type="color" name="color_background" class="form-control form-control-color" value="<?= $view['color_background']; ?>">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Màu sắc chữ</label>
                        <input type="color" name="color_text" class="form-control form-control-color" value="<?= $view['color_text']; ?>">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
         <button class="btn btn-primary btn-sm mb-3" type="submit" name="edit">Chỉnh sửa thông tin</button>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Danh mục</h6>
               <div class="col-md-12 mb-3">
                  <label class="my-3">Trạng thái</label>
                  <select class="select2 form-control mb-3 custom-select" name="post_status">
                     <option value="3" <?php if($view['post_status'] == 3){ echo 'selected'; } ?>>Bản nháp</option>
                     <option value="2" <?php if($view['post_status'] == 2){ echo 'selected'; } ?>>Công khai</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Giao diện - Hình ảnh</h6>
               <div class="mb-3">
                  <label class="form-label">Danh sách Template</label>
                  <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="post_templates_id">
                     <?php foreach ($list_templates as $value): ?>
                        <option value="<?= $value['id']; ?>" <?php if($view['post_templates_id'] == $value['id']){ echo 'selected'; } ?>><b><?= $value['name']; ?></b></option>
                     <?php endforeach ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label class="form-label">Thay ảnh website</label>
                  <div class="row">
                     <div class="col-md-12 mb-3">
                        <img src="<?= $this->Model_main->get_lang_symtem($view['imgwebsite'],$language,$this->language_main); ?>" alt="" width="100%">
                     </div>
                     <div class="col-md-8">
                        <input id="xFilePath1" name="imgwebsite_<?= $language; ?>" type="text" size="60" class="form-control" value="<?= $this->Model_main->get_lang_symtem($view['imgwebsite'],$language,$this->language_main); ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="form-label">Thảy ảnh Socail</label>
                  <div class="row">
                     <div class="col-md-12 mb-3">
                        <img src="<?= $this->Model_main->get_lang_symtem($view['imgsocial'],$language,$this->language_main); ?>" alt="" width="100%">
                     </div>
                     <div class="col-md-8">
                        <input id="xFilePath" name="imgsocial_<?= $language; ?>" type="text" size="60" class="form-control" value="<?= $this->Model_main->get_lang_symtem($view['imgsocial'],$language,$this->language_main); ?>">
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
</form>
<script type="text/javascript">
   function checkname() {
     var name = document.getElementById('name').value;
       // Thêm nội dung vào thẻ title và ID ggtitle
     document.getElementById('title').value = name;
  }
</script>