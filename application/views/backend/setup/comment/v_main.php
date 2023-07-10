<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table id="row_callback" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Ngày tháng</th>
                  <th>Tên</th>
                  <th>Trang thái</th>
                  <th>Bài viết</th>
                  <th>Trả lời</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php $dem = 0; ?>
               <?php foreach ($list_comment as $value): ?>
                  <?php $dem += 1; ?>
                  <tr>
                     <td><?= $dem; ?></td>
                     <td><?= date('d-m-Y', $value['comment_date']) ?></td>
                     <td class="fw-bold"><?= $value['name']; ?></td>
                     <td><span class="<?= $this->Model_backend->get_setup_class_id($value['read_info']); ?>"><?= $this->Model_backend->get_setup_extend_id($value['read_info']); ?></span></td>
                     <td><?php if(strlen($value['comment_rep']) > 10){ echo '<span class="badge rounded-pill bg-success">Đã trả lời</span>'; }else{ echo '<span class="badge rounded-pill bg-danger">Chưa trả lời</span>'; } ?></td>
                     <td><?= $this->Model_main->get_name_post_id($value['id_posts'],'vn'); ?></td>
                     <td>
                        <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
                           <i class="fas fa-pencil-alt"></i>
                        </a>
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