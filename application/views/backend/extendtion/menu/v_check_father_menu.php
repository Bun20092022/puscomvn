<?php $name_tags =  json_encode(array('vn' => '<span style="color:red">Dữ liệu đã xóa</span>')); ?>
<label>Danh mục cha</label>
<select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="father_id" id="form3">
   <option value="0">Danh mục cha</option>
   <optgroup label="Danh mục chọn">
      <!-- Lấy 5 cấp của danh mục cha -->
      <?php $list_lever1 = $this->Model_backend->show_all_menu_by_father(0,$id_menu_group); ?>
      <?php foreach ($list_lever1 as $value1): ?>
         <?php if($value1['posts_style'] == 30){
            $view_posts1 = $this->Model_backend->view_id('qh_posts',$value1['id_posts']);
            if(isset($view_posts1)){ $category1 = json_decode($view_posts1['name']); }else{ $category1 = json_decode($name_tags); }
         }elseif($value1['posts_style'] == 29){
            $view_posts1 = $this->Model_backend->view_id('qh_post_category',$value1['id_category']);
            if(isset($view_posts1)){ $category1 = json_decode($view_posts1['name']); }else{ $category1 = json_decode($name_tags); }
         }elseif($value1['posts_style'] == 31){
            $view_posts1 = $this->Model_backend->view_id('qh_setup_extend',$value1['id_name_out']);
            if(isset($view_posts1)){ $category1 = json_decode($view_posts1['lang']); }else{ $category1 = json_decode($name_tags); }
         }else{
            $category1 = json_decode($name_tags); 
         }
         ?>
         <?php $list_lever2 = $this->Model_backend->show_all_menu_by_father($value1['id'],$id_menu_group); ?>
         <option value="<?= $value1['id']; ?>"><b><?= $category1->{'vn'}; ?></b></option>
         <?php foreach ($list_lever2 as $value2): ?>
            <?php if($value2['posts_style'] == 30){
               $view_posts2 = $this->Model_backend->view_id('qh_posts',$value2['id_posts']);
               if(isset($view_posts2)){ $category2 = json_decode($view_posts2['name']); }else{ $category2 = json_decode($name_tags); }
            }elseif($value2['posts_style'] == 29){
               $view_posts2 = $this->Model_backend->view_id('qh_post_category',$value2['id_category']);
               if(isset($view_posts2)){ $category2 = json_decode($view_posts2['name']); }else{ $category2 = json_decode($name_tags); }
            }elseif($value2['posts_style'] == 31){
               $view_posts2 = $this->Model_backend->view_id('qh_setup_extend',$value2['id_name_out']);
               if(isset($view_posts2)){ $category2 = json_decode($view_posts2['lang']); }else{ $category2 = json_decode($name_tags); }
            }else{
               $category2 = json_decode($name_tags); 
            }
            ?>
            <?php $list_lever3 = $this->Model_backend->show_all_menu_by_father($value2['id'],$id_menu_group); ?>
            <option value="<?= $value2['id']; ?>">--- <?= $category2->{'vn'}; ?></option>
            <?php foreach ($list_lever3 as $value3): ?>
               <?php if($value3['posts_style'] == 30){
                  $view_posts3 = $this->Model_backend->view_id('qh_posts',$value3['id_posts']);
                  if(isset($view_posts2)){ $category3 = json_decode($view_posts3['name']); }else{ $category3 = json_decode($name_tags); }
               }elseif($value3['posts_style'] == 29){
                  $view_posts3 = $this->Model_backend->view_id('qh_post_category',$value3['id_category']);
                  if(isset($view_posts3)){ $category3 = json_decode($view_posts3['name']); }else{ $category3 = json_decode($name_tags); }
               }elseif($value3['posts_style'] == 31){
                  $view_posts3 = $this->Model_backend->view_id('qh_setup_extend',$value3['id_name_out']);
                  if(isset($view_posts3)){ $category3 = json_decode($view_posts3['lang']); }else{ $category3 = json_decode($name_tags); }
               }else{
                  $category3 = json_decode($name_tags); 
               }
               ?>
               <?php $list_lever4 = $this->Model_backend->show_all_menu_by_father($value3['id'],$id_menu_group); ?>
               <option value="<?= $value3['id']; ?>">------ <?= $category3->{'vn'}; ?></option>
               <?php foreach ($list_lever4 as $value4): ?>
                 <?php if($value4['posts_style'] == 30){
                  $view_posts4 = $this->Model_backend->view_id('qh_posts',$value4['id_posts']);
                  if(isset($view_posts4)){ $category4 = json_decode($view_posts4['name']); }else{ $category4 = json_decode($name_tags); }
               }elseif($value4['posts_style'] == 29){
                  $view_posts4 = $this->Model_backend->view_id('qh_post_category',$value4['id_category']);
                  if(isset($view_posts4)){ $category4 = json_decode($view_posts4['name']); }else{ $category4 = json_decode($name_tags); }
               }elseif($value4['posts_style'] == 31){
                  $view_posts4 = $this->Model_backend->view_id('qh_setup_extend',$value4['id_name_out']);
                  if(isset($view_posts4)){ $category4 = json_decode($view_posts4['lang']); }else{ $category4 = json_decode($name_tags); }
               }else{
                  $category4 = json_decode($name_tags); 
               }
               ?>
               <?php $list_lever5 = $this->Model_backend->show_all_menu_by_father($value4['id'],$id_menu_group); ?>
               <option value="<?= $value4['id']; ?>">--------- <?= $category4->{'vn'}; ?></option>
               <?php foreach ($list_lever5 as $value5): ?>
                  <?php if($value5['posts_style'] == 30){
                     $view_posts5 = $this->Model_backend->view_id('qh_posts',$value5['id_posts']);
                     if(isset($view_posts5)){ $category5 = json_decode($view_posts5['name']); }else{ $category5 = json_decode($name_tags); }
                  }elseif($value5['posts_style'] == 29){
                     $view_posts5 = $this->Model_backend->view_id('qh_post_category',$value5['id_category']);
                     if(isset($view_posts5)){ $category5 = json_decode($view_posts5['name']); }else{ $category5 = json_decode($name_tags); }
                  }elseif($value5['posts_style'] == 31){
                     $view_posts5 = $this->Model_backend->view_id('qh_setup_extend',$value5['id_name_out']);
                     if(isset($view_posts5)){ $category5 = json_decode($view_posts5['lang']); }else{ $category5 = json_decode($name_tags); }
                  }else{
                     $category5 = json_decode($name_tags); 
                  }
                  ?>
                  <option value="<?= $value5['id']; ?>">------------ <?= $category5->{'vn'}; ?></option>
               <?php endforeach ?>
            <?php endforeach ?>
         <?php endforeach ?>
      <?php endforeach ?>
   <?php endforeach ?>
</optgroup>
</select>