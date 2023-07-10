<?php
$view_url_website = $this->Model_backend->view_setup(1);
$view_url = json_decode($view_url_website['info']);  
?>

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
          <h4 class="card-title">Danh sách ngôn ngữ hiển thị trên Website</h4>
       </div><!--end card-header-->
       <div class="card-body">
          <table id="row_callback" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
           <thead>
            <tr>
               <th>ID</th>
               <th>Nội dung miêu tả</th>
               <th></th>
            </tr>
         </thead>


         <tbody>
            <?php foreach($list as $value): ?>
               <tr>
                  <td><?= $value['id']; ?></td>
                  <td><?= $value['name']; ?></td>
                  <td><?php if (isset($link_update)){ ?>
                     <a href="<?= $link_update; ?><?= $value['id']; ?>"><i class="fas fa-pencil-alt" style="margin-right: 15px;"></i></a>
                  <?php } ?>                                              
                  <?php if (isset($link_delete)){ ?>
                     <a href="<?= $link_delete; ?><?= $value['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="far fa-trash-alt"></i></a>
                     <?php } ?></td>
                  </td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>        
   </div>
</div>
</div>
</div>
