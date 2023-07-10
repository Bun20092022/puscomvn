<?php
$view_url_website = $this->Model_backend->view_setup(1);
$view_url = json_decode($view_url_website['info']); 
?>
<a href="<?= base_url(); ?><?= $this->folder; ?>/add/<?= $this->post_type; ?>">
   <button type="button" class="btn btn-primary mb-3 btn-sm"><i class="fa-solid fa-plus"></i> Thêm chuyên mục</button>
</a>
<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <?php foreach ($this->language as $value_flag): ?>
                   <th width="50px"><img src="<?= $value_flag['link_img']; ?>" alt="" width="18px"></th>
                <?php endforeach ?>
                <th></th>
                <th>Lượt view</th>
             </tr>
          </thead>
          <tbody>
            <?php foreach ($list_category as $value1): ?>
               <?php $list_lever2 = $this->Model_backend->show_all_by_father($value1['id'],$this->post_type_id); ?>
               <tr>
                  <td><?= $value1['id']; ?></td>
                  <td class="fw-bold"><?= $this->Model_main->get_lang_main($value1['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                   <td>
                      <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $this->post_type; ?>/<?= $value_flag['name_des']; ?>/<?= $value1['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td>
                  <a href="<?= base_url(); ?>vn/<?= $value1['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>                                             
                  <?php if($value1['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $this->post_type; ?>/<?= $value1['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value1['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $this->post_type; ?>/<?= $value1['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value1['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?>
               </td>
               <td><?= $value1['view']; ?></td>
            </tr>
            <?php foreach ($list_lever2 as $value2): ?>
               <?php $list_lever3 = $this->Model_backend->show_all_by_father($value2['id'],$this->post_type_id); ?>
               <tr>
                  <td><?= $value2['id']; ?></td>
                  <td>----- <?= $this->Model_main->get_lang_main($value2['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                   <td>
                      <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value_flag['name_des']; ?>/<?= $value2['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td>
                  <a href="<?= base_url(); ?>vn/<?= $value2['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>
                  <?php if($value2['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $value2['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value2['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $this->post_type; ?>/<?= $value2['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value2['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?>
               </td>
               <td><?= $value2['view']; ?></td>
            </tr>
            <?php foreach ($list_lever3 as $value3): ?>
               <?php $list_lever4 = $this->Model_backend->show_all_by_father($value3['id'],$this->post_type_id); ?>
               <tr>
                  <td><?= $value3['id']; ?></td>
                  <td>------------------ <?= $this->Model_main->get_lang_main($value3['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                   <td>
                      <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value_flag['name_des']; ?>/<?= $value3['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td>
                  <a href="<?= base_url(); ?>vn/<?= $value3['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>
                  <?php if($value3['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $value3['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value3['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $this->post_type; ?>/<?= $value3['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value3['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?> 
               </td>
               <td><?= $value3['view']; ?></td>
            </tr>
            <?php foreach ($list_lever4 as $value4): ?>
               <?php $list_lever5 = $this->Model_backend->show_all_by_father($value4['id'],$this->post_type_id); ?>
               <tr>
                  <td><?= $value4['id']; ?></td>
                  <td>----------------------------- <?= $this->Model_main->get_lang_main($value4['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                   <td>
                      <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value_flag['name_des']; ?>/<?= $value4['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td>
                  <a href="<?= base_url(); ?>vn/<?= $value4['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>
                  <?php if($value4['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $value4['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value4['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $this->post_type; ?>/<?= $value4['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value4['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?>
               </td>
               <td><?= $value4['view']; ?></td>
            </tr>
            <?php foreach ($list_lever5 as $value5): ?>
               <tr>
                  <td><?= $value5['id']; ?></td>
                  <td>-------------------------------------------- <?= $this->Model_main->get_lang_main($value5['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                   <td>
                      <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value_flag['name_des']; ?>/<?= $value5['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td>
                  <a href="<?= base_url(); ?>vn/<?= $value5['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>
                  <?php if($value5['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $value5['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value5['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $this->post_type; ?>/<?= $value5['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value5['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?> 
               </td>
               <td><?= $value5['view']; ?></td>
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