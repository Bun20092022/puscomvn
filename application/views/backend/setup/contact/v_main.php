<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table id="row_callback" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Ngày tháng</th>
                  <th>Tên</th>
                  <th>Nội dung</th>
                  <th>Trang thái</th>
                  <th></th>
                  
               </tr>
            </thead>
            <tbody>
               <?php $dem = 0; ?>
               <?php foreach ($list_contact as $value): ?>
                  <?php $dem += 1; ?>
                  <tr>
                     <td><?= $dem; ?></td>
                     <td><?= date('d-m-Y', $value['contact_date']) ?></td>
                     <td>
                        <span class="fw-bold">Tên: </span><?= $value['name']; ?><br>
                        <span class="fw-bold">Phone: </span><?= $value['phone']; ?><br>
                        <span class="fw-bold">Mail: </span><?= $value['email']; ?>
                     </td>
                     <td><?= $value['contact']; ?></td>
                     <td><span class="<?= $this->Model_backend->get_setup_class_id($value['read_info']); ?>"><?= $this->Model_backend->get_setup_extend_id($value['read_info']); ?></span></td>
                     <td style="text-align: center;">
                        <a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                          <i class="far fa-trash-alt"></i>
                       </a>
                    </td>
                    
                 </tr>
              <?php endforeach ?>
           </tbody>
        </table>
     </div>
  </div>
</div>