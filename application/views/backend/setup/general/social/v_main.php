<?php
   $view_url_website = $this->Model_backend->view_setup(1);
   $view_url = json_decode($view_url_website['info']);  
?>

<div class="row">

<div class="col-md-12">
<div class="card">
   <div class="card-header"><b>Danh sách các trang mạng xã hội</b></div>
<div class="card-body">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Trạng thái</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
                     <?php foreach($list as $value): ?>
                     <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['name_social']; ?></td>
                        <td>
                           <span class="bg-opacity-success  color-success userDatatable-content-status active">Hoạt động</span>
                        </td>
                        <td>
                          <?php if (isset($link_update)){ ?>
                           <a href="<?= $link_update; ?><?= $value['id']; ?>"><i class="fas fa-pencil-alt" style="margin-right: 15px;"></i></a>
                          <?php } ?>                                              
                           <?php if (isset($link_delete)){ ?>
                               <a href="<?= $link_delete; ?><?= $value['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $value['name_social'];?>?')"><i class="far fa-trash-alt"></i></a>
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
    