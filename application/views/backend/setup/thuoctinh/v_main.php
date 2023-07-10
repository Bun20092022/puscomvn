<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <h4 class="mt-0 header-title"><?php if(isset($title)){ echo $title; } ?></h4>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>Tên thuộc tính</th>
                     <th>Code</th>
                     <th>Hoạt động</th>
                  </tr>
               </thead>
               <tbody>
                     <?php $dem = 0; ?>
                     <?php foreach ($list as $value): ?>
                     <?php $dem = $dem + 1; ?>
                     <tr>
                        <td><?php echo $dem; ?></td>
                        <td><?php echo $value['thuoctinh']; ?></td>
                        <td><?php echo $value['code']; ?></td>
                        <td>                                                      
                           <a href="<?php echo $linkupdate; ?><?php echo $value['id']; ?>"><button type="button" class="btn btn-xs btn-success"><i class="fas fa-edit"></i></button></a>
                           <a href="<?php echo $linkdelete; ?><?php echo $value['id']; ?>/<?php echo $value['id_templategroup']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?php echo $value['thuoctinh'];?>?')"><button type="button" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                     </tr>
                     <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!-- end col -->
</div>
<!-- end row -->