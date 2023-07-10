<?php
$this->id_language = $this->session->userdata('ss_language');
if(isset($this->id_language)){
   $this->id_language = $this->id_language['name_des'];
}else{
   $this->id_language = 'vn';
}

$check_menu = array(
   'father_id' => 0,
   'id_menu_group' => 0,
   'posts_style' => 0,
);
$list_menu = $this->db->select('*')->from('qh_setup_menu')->where($check_menu)->get()->result_array();  
?>
<div class="btn-group me-1 mt-2 mb-3">
   <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
     Chọn danh sách Menu <i class="mdi mdi-chevron-down"></i>
  </button>
  <div class="dropdown-menu">
   <?php foreach ($list_menu as $value): ?>
      <a class="dropdown-item" href="<?= base_url(); ?>backend/setup/menu/group/<?= $value['id']; ?>"><?= $value['menu_group']; ?></a>
   <?php endforeach ?>
  </div>
</div>
<?php if(isset($id_menu_group)){ ?>
   <?php $list_type_id = $this->Model_backend->get_all('qh_post_type'); ?>
   <?php $check_lang_menu = array(
      'lang_menu' => 1,
   );
   $list_lang_id = $this->Model_backend->get_where('qh_setup_extend',$check_lang_menu);
   ?>
   <?php $this->load->view('backend/extendtion/setup/v_add_text_lang'); ?>
   <a href="backend/news/menu/delete_group/<?= $id_menu_group; ?>" class="btn btn-danger btn-xs mb-3" onclick="return confirm('Bạn có chắc chắn muốn xóa Menu?')">Xóa Menu</a>
   <a href="backend/news/menu/editgroup/<?= $id_menu_group; ?>" class="btn btn-warning btn-xs mb-3">Chỉnh sửa tên</a>
   <div class="row" style="margin-bottom: 500px;"> 
      <div class="col-md-4">
         <div class="card">
           <div class="card-header">
            <h4 class="card-title">Thêm liên kết</h4>
         </div><!--end card-header-->
         <div class="card-body">
            <div class="accordion" id="accordionExample">
             <div class="accordion-item">
              <h5 class="accordion-header m-0" id="headingOne">
               <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Chuyên mục
             </button>
          </h5>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
             <form action="" method="post" id="form1">
               <div class="mb-3">
                  <label>Danh sách chuyên mục</label>
                  <select class="select2 form-control mb-3 custom-select" name="id_category" style="width: 100%; height:36px;" id="form1">
                     <?php foreach ($list_type_id as $value): ?>
                        <optgroup label="<?= $value['name_type']; ?>">
                          <!-- Lấy 5 cấp của danh mục cha -->
                          <?php $list_lever1 = $this->Model_backend->get_category_father(0,$value['id']); ?>
                          <?php foreach ($list_lever1 as $value1): ?>
                           <?php $category1 = json_decode($value1['name']) ?>
                           <?php $list_lever2 = $this->Model_backend->show_all_by_father($value1['id'],$value['id']); ?>
                           <?php if($value1['posts_style'] == 1){ ?>
                              <option value="<?= $value1['id']; ?>"><b><?= $category1->{$this->id_language}; ?></b></option>
                           <?php } ?>
                           <?php foreach ($list_lever2 as $value2): ?>
                              <?php $category2 = json_decode($value2['name']) ?>
                              <?php $list_lever3 = $this->Model_backend->show_all_by_father($value2['id'],$value['id']); ?>
                              <?php if($value2['posts_style'] == 1){ ?>
                                 <option value="<?= $value2['id']; ?>">--- <?= $category2->{$this->id_language}; ?></option>
                              <?php } ?>
                              <?php foreach ($list_lever3 as $value3): ?>
                                 <?php $category3 = json_decode($value3['name']) ?>
                                 <?php $list_lever4 = $this->Model_backend->show_all_by_father($value3['id'],$value['id']); ?>
                                 <?php if($value3['posts_style'] == 1){ ?>
                                    <option value="<?= $value3['id']; ?>">------ <?= $category3->{$this->id_language}; ?></option>
                                 <?php } ?>
                                 <?php foreach ($list_lever4 as $value4): ?>
                                    <?php $category4 = json_decode($value4['name']) ?>
                                    <?php $list_lever5 = $this->Model_backend->show_all_by_father($value4['id'],$value['id']); ?>
                                    <?php if($value4['posts_style'] == 1){ ?>
                                       <option value="<?= $value4['id']; ?>">--------- <?= $category4->{$this->id_language}; ?></option>
                                    <?php } ?>
                                    <?php foreach ($list_lever5 as $value5): ?>
                                       <?php $category5 = json_decode($value5['name']) ?>
                                       <?php if($value5['posts_style'] == 1){ ?>
                                          <option value="<?= $value5['id']; ?>">---------------- <?= $category5->{$this->id_language}; ?></option>
                                       <?php } ?>
                                    <?php endforeach ?>
                                 <?php endforeach ?>
                              <?php endforeach ?>
                           <?php endforeach ?>
                        <?php endforeach ?>
                     </optgroup> 
                  <?php endforeach ?>

               </select>
            </div>
            <div class="mb-3">
               <label>Danh mục cha</label>
               <?php $this->load->view('backend/extendtion/menu/v_check_father_menu'); ?>
            </div>
            <button class="btn btn-primary" type="submit" name="add_category" id="form1">Thêm Menu</button>
         </form>
      </div>
   </div>
</div>
<div class="accordion-item">
  <h5 class="accordion-header m-0" id="headingTwo">
   <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwopage" aria-expanded="false" aria-controls="collapseTwo">
    Trang
 </button>
</h5>
<div id="collapseTwopage" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
   <div class="accordion-body">
    <form action="" method="post" id="form2">
      <div class="mb-3">
         <label>Danh sách bài viết hoạt động</label>
         <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_posts" id="form2">
            <?php foreach ($list_posts_public as $value): ?>
               <?php $name_post = json_decode($value['name']); ?>
               <option value="<?= $value['id']; ?>"><b><?= $name_post->{'vn'}; ?></b></option>
            <?php endforeach ?>
         </select>
      </div>
      <div class="mb-3">
         <?php $this->load->view('backend/extendtion/menu/v_check_father_menu'); ?>
      </div>
      <button class="btn btn-primary" type="submit" name="add_post" id="form2">Thêm Menu</button>
   </form>
</div>
</div>
</div>
<div class="accordion-item">
  <h5 class="accordion-header m-0" id="headingTwo">
   <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
    Bài viết
 </button>
</h5>
<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
   <div class="accordion-body">
    <form action="" method="post" id="form2">
      <div class="mb-3">
         <label>Danh sách bài viết hoạt động</label>
         <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_posts" id="form2">
            <?php foreach ($list_posts_public as $value): ?>
               <?php $name_post = json_decode($value['name']); ?>
               <option value="<?= $value['id']; ?>"><b><?= $name_post->{'vn'}; ?></b></option>
            <?php endforeach ?>
         </select>
      </div>
      <div class="mb-3">
         <?php $this->load->view('backend/extendtion/menu/v_check_father_menu'); ?>
      </div>
      <button class="btn btn-primary" type="submit" name="add_post" id="form2">Thêm Menu</button>
   </form>
</div>
</div>
</div>
<div class="accordion-item">
  <h5 class="accordion-header m-0" id="headingThree">
   <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
    Liên kết tự tạo
 </button>
</h5>
<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
   <div class="accordion-body">
    <form action="" method="post" id="form3">
      <div class="mb-3">
         <label>Link liên kết</label>
         <input type="text" class="form-control" id="form3" name="link_out">
      </div>
      <div class="mb-3">
         <label>Tên hiển thị (<a href="backend/setup/general/lang_menu" target="_blank">Thêm từ ngữ hiển thị</a>)</label>
         <select  class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_name_out" id="form3">
            <?php foreach ($list_lang_id as $value): ?>
               <option value="<?= $value['id']; ?>"><b><?= $value['name']; ?></b></option>
            <?php endforeach ?>
         </select>
      </div>
      <div class="mb-3">
         <?php $this->load->view('backend/extendtion/menu/v_check_father_menu'); ?>
      </div>
      <button class="btn btn-primary" type="submit" name="add_link_out" id="form3">Thêm Menu</button>
   </form>
</div>
</div>
</div>
</div>                                 
</div><!--end card-body-->
</div>
</div>
<div class="col-md-8">
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Tên</th>
                     <th>Cột Menu</th>
                     <th>Sắp xếp</th>
                     <th></th>
                  </tr>
               </thead>
               <?php $name_tags =  json_encode(array('vn' => '<span style="color:red">Dữ liệu đã xóa</span>')); ?>
               <tbody>
                  <?php $list_lever1 = $this->Model_backend->show_all_menu_by_father(0,$id_menu_group); ?>
                  <?php foreach ($list_lever1 as $value1): ?>
                     <?php if($value1['posts_style'] == 30){
                        $view_posts1 = $this->Model_backend->view_id('qh_posts',$value1['id_posts']);
                        if(isset($view_posts1)){ $name1 = json_decode($view_posts1['name']); }else{ $name1 = json_decode($name_tags); }
                     }elseif($value1['posts_style'] == 29){
                        $view_posts1 = $this->Model_backend->view_id('qh_post_category',$value1['id_category']);
                        if(isset($view_posts1)){ $name1 = json_decode($view_posts1['name']); }else{ $name1 = json_decode($name_tags); }
                     }elseif($value1['posts_style'] == 31){
                        $view_posts1 = $this->Model_backend->view_id('qh_setup_extend',$value1['id_name_out']);
                        $name1 = json_decode($view_posts1['lang']);
                     }else{
                        $name1 = json_decode($name_tags); 
                     }
                     ?>
                     <?php $view_colum =  $this->Model_backend->view_id('qh_setup',$value1['num_colum']);?>
                     <?php $list_lever2 = $this->Model_backend->show_all_menu_by_father($value1['id'],$id_menu_group); ?>
                     <tr>
                        <td><?= $value1['id']; ?></td>
                        <td class="fw-bold"><?php if(strlen($name1->{$this->id_language}) > 0){ echo $name1->{$this->id_language}; }else{ echo $name1->{'vn'}; } ?></td>
                        <td>
                           <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true"><?= $view_colum['extend']; ?><i class="mdi mdi-chevron-down"></i></button>
                           <div class="dropdown-menu" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(119px, -56px);" data-popper-placement="top-start" data-popper-reference-hidden="">
                             <a class="dropdown-item" href="<?= $this->folder; ?>/num_colum/<?= $value1['id']; ?>/33/<?= $id_menu_group; ?>">Menu 1 cột</a>
                             <a class="dropdown-item" href="<?= $this->folder; ?>/num_colum/<?= $value1['id']; ?>/34/<?= $id_menu_group; ?>">Menu nhiều cột</a>
                          </div>
                       </td>
                       <td>
                        <?php if($value1['num'] != 1){ ?>
                           <a href="<?= $this->folder; ?>/tang/<?= $value1['id']; ?>/<?= $value1['father_id']; ?>/<?= $value1['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                        <?php } ?>
                        <?php if($value1['num'] != count($list_lever1)){ ?>
                           <a href="<?= $this->folder; ?>/giam/<?= $value1['id']; ?>/<?= $value1['father_id']; ?>/<?= $value1['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                        <?php } ?>
                     </td>
                     <td>
                        <a href="<?= $this->folder; ?>/delete/<?= $value1['id']; ?>/<?= $value1['father_id']; ?>/<?= $id_menu_group; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                           <i class="far fa-trash-alt"></i>
                        </a>
                     </td>
                  </tr>
                  <?php foreach ($list_lever2 as $value2): ?>
                     <?php if($value2['posts_style'] == 30){
                        $view_posts2 = $this->Model_backend->view_id('qh_posts',$value2['id_posts']);
                        if(isset($view_posts2)){ $name2 = json_decode($view_posts2['name']); }else{ $name2 = json_decode($name_tags); }
                     }elseif($value2['posts_style'] == 29){
                        $view_posts2 = $this->Model_backend->view_id('qh_post_category',$value2['id_category']);
                        if(isset($view_posts2)){ $name2 = json_decode($view_posts2['name']); }else{ $name2 = json_decode($name_tags); }
                     }elseif($value2['posts_style'] == 31){
                        $view_posts2 = $this->Model_backend->view_id('qh_setup_extend',$value2['id_name_out']);
                        if(isset($view_posts2)){ $name2 = json_decode($view_posts2['lang']); }else{ $name2 = json_decode($name_tags); }
                     }else{
                        $name2 = json_decode($name_tags); 
                     }
                     ?>
                     <?php $list_lever3 = $this->Model_backend->show_all_menu_by_father($value2['id'],$id_menu_group); ?>
                     <tr>
                        <td><?= $value2['id']; ?></td>
                        <td>----- <?= $name2->{'vn'}; ?></td>
                        <td></td>
                        <td>
                           <?php if($value2['num'] != 1){ ?>
                              <a href="<?= $this->folder; ?>/tang/<?= $value2['id']; ?>/<?= $value2['father_id']; ?>/<?= $value2['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                           <?php } ?>
                           <?php if($value2['num'] != count($list_lever2)){ ?>
                              <a href="<?= $this->folder; ?>/giam/<?= $value2['id']; ?>/<?= $value2['father_id']; ?>/<?= $value2['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                           <?php } ?>
                        </td>
                        <td>
                           <a href="<?= $this->folder; ?>/delete/<?= $value2['id']; ?>/<?= $value2['father_id']; ?>/<?= $id_menu_group; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                              <i class="far fa-trash-alt"></i>
                           </a>
                        </td>
                     </tr>
                     <?php foreach ($list_lever3 as $value3): ?>
                        <?php if($value3['posts_style'] == 30){
                           $view_posts3 = $this->Model_backend->view_id('qh_posts',$value3['id_posts']);
                           if(isset($view_posts2)){ $name3 = json_decode($view_posts3['name']); }else{ $name3 = json_decode($name_tags); }
                        }elseif($value3['posts_style'] == 29){
                           $view_posts3 = $this->Model_backend->view_id('qh_post_category',$value3['id_category']);
                           if(isset($view_posts3)){ $name3 = json_decode($view_posts3['name']); }else{ $name3 = json_decode($name_tags); }
                        }elseif($value3['posts_style'] == 31){
                           $view_posts3 = $this->Model_backend->view_id('qh_setup_extend',$value3['id_name_out']);
                           if(isset($view_posts3)){ $name3 = json_decode($view_posts3['lang']); }else{ $name3 = json_decode($name_tags); }
                        }else{
                           $name3 = json_decode($name_tags); 
                        }
                        ?>
                        <?php $list_lever4 = $this->Model_backend->show_all_menu_by_father($value3['id'],$id_menu_group); ?>
                        <tr>
                           <td><?= $value3['id']; ?></td>
                           <td>------------------ <?php if(strlen($name3->{$this->id_language}) > 0){ echo $name3->{$this->id_language}; }else{ echo $name3->{'vn'}; } ?></td>
                           <td></td>
                           <td>
                              <?php if($value3['num'] != 1){ ?>
                                 <a href="<?= $this->folder; ?>/tang/<?= $value3['id']; ?>/<?= $value3['father_id']; ?>/<?= $value3['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                              <?php } ?>
                              <?php if($value3['num'] != count($list_lever3)){ ?>
                                 <a href="<?= $this->folder; ?>/giam/<?= $value3['id']; ?>/<?= $value3['father_id']; ?>/<?= $value3['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                              <?php } ?>
                           </td>
                           <td>
                              <a href="<?= $this->folder; ?>/delete/<?= $value3['id']; ?>/<?= $value3['father_id']; ?>/<?= $id_menu_group; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                                 <i class="far fa-trash-alt"></i>
                              </a>
                           </td>
                        </tr>
                        <?php foreach ($list_lever4 as $value4): ?>
                           <?php if($value4['posts_style'] == 30){
                              $view_posts4 = $this->Model_backend->view_id('qh_posts',$value4['id_posts']);
                              if(isset($view_posts4)){ $name4 = json_decode($view_posts4['name']); }else{ $name4 = json_decode($name_tags); }
                           }elseif($value4['posts_style'] == 29){
                              $view_posts4 = $this->Model_backend->view_id('qh_post_category',$value4['id_category']);
                              if(isset($view_posts4)){ $name4 = json_decode($view_posts4['name']); }else{ $name4 = json_decode($name_tags); }
                           }elseif($value4['posts_style'] == 31){
                              $view_posts4 = $this->Model_backend->view_id('qh_setup_extend',$value4['id_name_out']);
                              if(isset($view_posts4)){ $name4 = json_decode($view_posts4['lang']); }else{ $name4 = json_decode($name_tags); }
                           }else{
                              $name4 = json_decode($name_tags); 
                           }
                           ?>
                           <?php $list_lever5 = $this->Model_backend->show_all_menu_by_father($value4['id'],$id_menu_group); ?>
                           <tr>
                              <td><?= $value4['id']; ?></td>
                              <td>----------------------------- <?php if(strlen($name4->{$this->id_language}) > 0){ echo $name4->{$this->id_language}; }else{ echo $name4->{'vn'}; } ?></td>
                              <td></td>
                              <td>
                                 <?php if($value4['num'] != 1){ ?>
                                    <a href="<?= $this->folder; ?>/tang/<?= $value4['id']; ?>/<?= $value4['father_id']; ?>/<?= $value4['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                                 <?php } ?>
                                 <?php if($value4['num'] != count($list_lever4)){ ?>
                                    <a href="<?= $this->folder; ?>/giam/<?= $value4['id']; ?>/<?= $value4['father_id']; ?>/<?= $value4['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                                 <?php } ?>
                              </td>
                              <td>
                                 <a href="<?= $this->folder; ?>/delete/<?= $value4['id']; ?>/<?= $value4['father_id']; ?>/<?= $id_menu_group; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                                    <i class="far fa-trash-alt"></i>
                                 </a>
                              </td>
                           </tr>
                           <?php foreach ($list_lever5 as $value5): ?>
                              <?php if($value5['posts_style'] == 30){
                                 $view_posts5 = $this->Model_backend->view_id('qh_posts',$value5['id_posts']);
                                 if(isset($view_posts5)){ $name5 = json_decode($view_posts5['name']); }else{ $name5 = json_decode($name_tags); }
                              }elseif($value5['posts_style'] == 29){
                                 $view_posts5 = $this->Model_backend->view_id('qh_post_category',$value5['id_category']);
                                 if(isset($view_posts5)){ $name5 = json_decode($view_posts5['name']); }else{ $name5 = json_decode($name_tags); }
                              }elseif($value5['posts_style'] == 31){
                                 $view_posts5 = $this->Model_backend->view_id('qh_setup_extend',$value5['id_name_out']);
                                 if(isset($view_posts5)){ $name5 = json_decode($view_posts5['lang']); }else{ $name5 = json_decode($name_tags); }
                              }else{
                                 $name5 = json_decode($name_tags); 
                              }
                              ?>
                              <tr>
                                 <td><?= $value5['id']; ?></td>
                                 <td>-------------------------------------- <?php if(strlen($name5->{$this->id_language}) > 0){ echo $name5->{$this->id_language}; }else{ echo $name5->{'vn'}; } ?></td>
                                 <td></td>
                                 <td>
                                    <?php if($value5['num'] != 1){ ?>
                                       <a href="<?= $this->folder; ?>/tang/<?= $value5['id']; ?>/<?= $value5['father_id']; ?>/<?= $value5['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                                    <?php } ?>
                                    <?php if($value5['num'] != count($list_lever5)){ ?>
                                       <a href="<?= $this->folder; ?>/giam/<?= $value5['id']; ?>/<?= $value5['father_id']; ?>/<?= $value5['num']; ?>/<?= $id_menu_group; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                                    <?php } ?>
                                 </td>
                                 <td>
                                    <a href="<?= $this->folder; ?>/delete/<?= $value5['id']; ?>/<?= $value5['father_id']; ?>/<?= $id_menu_group; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                                       <i class="far fa-trash-alt"></i>
                                    </a>
                                 </td>
                              </tr>
                           <?php endforeach ?>
                        <?php endforeach ?>
                     <?php endforeach ?>
                  <?php endforeach ?>
               <?php endforeach ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
</div>
</div>
<?php } ?>