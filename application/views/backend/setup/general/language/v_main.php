<?php
   $view_url_website = $this->Model_backend->view_setup(1);
   $view_url = json_decode($view_url_website['info']);  
?>

<div class="row">
<div class="col-md-12">
<div class="card">
   <div class="card-header"><b>Danh sách ngôn ngữ Website</b></div>
<div class="card-body">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Viết tắt</th>
                  <th>Ảnh</th>
                  <th>Ngôn ngữ chính</th>
                  <th>Trạng thái</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
                     <?php foreach($list as $value): ?>
                     <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['name_des']; ?></td>
                        <td><img src="<?= $value['link_img']; ?>" width="20px"></td>
                        <td>
                           <?php if($value['lang_main'] == 1){ echo '<b>Chính</b>'; }elseif($value['public'] == 1){ ?>
                           <a href="<?= $this->folder; ?>/lang_main/<?= $value['id']; ?>" class="btn btn-sm btn-primary">Đặt ngôn ngữ chính</a>
                           <?php }else{} ?>
                        </td>
                        <td>
                           <?php if($value['public'] == 1){ ?>
                           <span class="bg-opacity-success color-success userDatatable-content-status active">Hoạt động</span>
                        <?php }else{ ?>
                           <span class="bg-opacity-danger color-danger userDatatable-content-status active">Không hoạt động</span>
                        <?php } ?>
                        </td>
                        <td>
                          <?php if (isset($link_update)){ ?>
                           <a href="<?= $link_update; ?><?= $value['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                          <?php } ?>
                        <?php if($value['public'] == 1){ ?>
                           <a href="<?= $this->folder; ?>/pause/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
                              <i class="far fa-pause-circle"></i>
                           </a>
                        <?php } ?>
                        <?php if($value['public'] == 0){ ?>
                           <a href="<?= $this->folder; ?>/active/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
                              <i class="fas fa-play"></i>
                           </a>
                        <?php } ?>
                        </td>
                     </tr>
                     <?php endforeach ?>

            </tbody>
         </table>
      </div>
   </div>
</div>
</div>
    