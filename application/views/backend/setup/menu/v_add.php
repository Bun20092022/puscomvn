   <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Nội dung chuyên mục</h6>
               <form action="" method="post">
                  <div class="mb-3">
                     <label class="form-label">Tên chuyên mục</label>
                     <input type="text" class="form-control" name="name_<?= $this->id_language;?>" id="name" onkeyup="ChangeToSlug();" oninput="checkname()" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Url hiển thị</label>
                     <input type="text" class="form-control" id="slug" name="url_<?= $this->id_language;?>">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Nội dung</label>
                     <textarea id="textarea" class="form-control" name="content_<?= $this->id_language;?>"></textarea>
                     <script>
                        CKEDITOR.replace('content_<?= $this->id_language;?>');
                     </script>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Danh mục cha</label>
                     <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="father_id">
                        <option value="0">Danh mục cha</option>
                        <optgroup label="Danh mục chọn">
                           <!-- Lấy 5 cấp của danh mục cha -->
                           <?php $list_lever1 = $this->Model_news_category->show_all_by_father(0); ?>
                           <?php foreach ($list_lever1 as $value1): ?>
                              <?php if($value1['posts_style'] == 2){
                                 $view_posts1 = $this->Model_backend->view_id('qh_posts',$value1['id_posts']);
                                 $category1 = json_decode($view_posts1['name']);
                              }else{
                                 $category1 = json_decode($value1['name']); 
                              }
                              ?>
                              <?php $list_lever2 = $this->Model_news_category->show_all_by_father($value1['id']); ?>
                              <option value="<?= $value1['id']; ?>"><b><?= $category1->{$this->id_language}; ?></b></option>
                              <?php foreach ($list_lever2 as $value2): ?>
                                 <?php if($value2['posts_style'] == 2){
                                    $view_posts2 = $this->Model_backend->view_id('qh_posts',$value2['id_posts']);
                                    $category2 = json_decode($view_posts2['name']);
                                 }else{
                                    $category2 = json_decode($value2['name']); 
                                 }
                                 ?>
                                 <?php $list_lever3 = $this->Model_news_category->show_all_by_father($value2['id']); ?>
                                 <option value="<?= $value2['id']; ?>">--- <?= $category2->{$this->id_language}; ?></option>
                                 <?php foreach ($list_lever3 as $value3): ?>
                                    <?php if($value3['posts_style'] == 2){
                                       $view_posts3 = $this->Model_backend->view_id('qh_posts',$value3['id_posts']);
                                       $category3 = json_decode($view_posts3['name']);
                                    }else{
                                       $category3 = json_decode($value3['name']); 
                                    }
                                    ?>
                                    <?php $list_lever4 = $this->Model_news_category->show_all_by_father($value3['id']); ?>
                                    <option value="<?= $value3['id']; ?>">------ <?= $category3->{$this->id_language}; ?></option>
                                    <?php foreach ($list_lever4 as $value4): ?>
                                       <?php if($value4['posts_style'] == 2){
                                          $view_posts4 = $this->Model_backend->view_id('qh_posts',$value4['id_posts']);
                                          $category4 = json_decode($view_posts4['name']);
                                       }else{
                                          $category4 = json_decode($value4['name']); 
                                       }
                                       ?>
                                       <?php $list_lever5 = $this->Model_news_category->show_all_by_father($value4['id']); ?>
                                       <option value="<?= $value4['id']; ?>">--------- <?= $category4->{$this->id_language}; ?></option>
                                       <?php foreach ($list_lever5 as $value5): ?>
                                          <?php if($value5['posts_style'] == 2){
                                             $view_posts5 = $this->Model_backend->view_id('qh_posts',$value5['id_posts']);
                                             $category5 = json_decode($view_posts5['name']);
                                          }else{
                                             $category5 = json_decode($value5['name']); 
                                          }
                                          ?>
                                          <option value="<?= $value5['id']; ?>">------------ <?= $category5->{$this->id_language}; ?></option>
                                       <?php endforeach ?>
                                    <?php endforeach ?>
                                 <?php endforeach ?>
                              <?php endforeach ?>
                           <?php endforeach ?>
                        </optgroup>
                     </select>
                  </div>
                  <button class="btn btn-primary" type="submit" name="add">Thêm thông tin</button>
               </div>
            </div>
         </div>
         <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h6 class="card-title">Tối ưu seo</h6>
                  <div class="mb-3">
                     <label class="form-label">Tên tin tức hiển thị Social</label>
                     <input type="text" class="form-control" name="title_<?= $this->id_language;?>" id="title" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Mô tả ngắn</label>
                     <textarea class="form-control" rows="5" name="description_<?= $this->id_language;?>" required></textarea>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Từ khóa</label>
                     <input type="text" class="form-control" name="keywords_<?= $this->id_language;?>">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Danh sách Template</label>
                     <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="post_templates_id">
                        <?php foreach ($list_templates as $value): ?>
                           <option value="<?= $value['id']; ?>"><b><?= $value['name']; ?></b></option>
                        <?php endforeach ?>
                     </select>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Ảnh website</label>
                     <div class="row">
                        <div class="col-md-8">
                           <input id="xFilePath1" name="imgwebsite_<?= $this->id_language;?>" type="text" size="60" class="form-control">
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
                           <input id="xFilePath" name="imgsocial_<?= $this->id_language;?>" type="text" size="60" class="form-control">
                        </div>
                        <div class="col-md-4">
                           <input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
                        </div>
                     </div>
                  </div> 
                  <div class="form-check form-switch">
                     <label class="form-label">Hiển thị</label>
                     <input class="form-check-input" type="checkbox" name="post_status" checked>
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