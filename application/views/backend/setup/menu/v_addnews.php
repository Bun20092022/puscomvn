   <div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Thêm bài viết vào Menu</h6>
            <form action="" method="post">
               <div class="mb-3">
                  <label class="form-label">Danh sách bài viết hoạt động</label>
                  <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_posts">
                     <?php foreach ($list_posts_public as $value): ?>
                        <?php $name_post = json_decode($value['name']); ?>
                        <option value="<?= $value['id']; ?>"><b><?= $name_post->{'vn'}; ?></b></option>
                     <?php endforeach ?>
                  </select>
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
               <button class="btn btn-primary" type="submit" name="add">Thêm Menu</button>
            </div>
         </div>
      </div>
      
   </div>
</form>