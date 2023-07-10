<?php
$view_url_website = $this->Model_backend->view_setup(1);
$view_url = json_decode($view_url_website['info']); 
?>
<a href="<?= base_url(); ?><?= $this->folder; ?>/add/<?= $this->post_type; ?>">
   <button type="button" class="btn btn-primary mb-3 btn-sm"><i class="fa-solid fa-plus"></i> Thêm Tags</button>
</a>
<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <?php foreach ($this->language as $value_flag): ?>
                    <th width="50px" class="text-center"><img src="<?= $value_flag['link_img']; ?>" alt="" width="18px"></th>
                 <?php endforeach ?>
                 <th></th>
                 <th class="text-center">Lượt view</th>
              </tr>
           </thead>
           <tbody>
            <?php foreach ($list_category as $value): ?>
               <tr>
                  <td><?= $value['id']; ?></td>
                  <td><?= $this->Model_main->get_lang_main($value['name'],$this->language_main); ?></td>
                  <?php foreach ($this->language as $value_flag): ?>
                    <td class="text-center">
                       <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value_flag['name_des']; ?>/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
                        <i class="fas fa-pencil-alt"></i>
                     </a>
                  </td>
               <?php endforeach ?>
               <td class="text-center">
                  <a href="<?= base_url(); ?>vn/<?= $value['url_vn']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>                                             
                  <?php if($value['post_status'] == 2){ ?>
                     <a href="<?= $this->folder; ?>/pause/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng Tags?')" title="Tạm dừng" style="margin-right: 10px;">
                        <i class="far fa-pause-circle"></i>
                     </a>
                  <?php } ?>
                  <?php if($value['post_status'] == 3){ ?>
                     <a href="<?= $this->folder; ?>/active/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động Tags?')" title="Hoạt động Tags" style="margin-right: 10px;">
                        <i class="fas fa-play"></i>
                     </a>
                     <a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa Tags">
                        <i class="far fa-trash-alt"></i>
                     </a>
                  <?php } ?>
               </td>
               <td class="text-center"><?= $value['view']; ?></td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
</div>
</div>
</div>