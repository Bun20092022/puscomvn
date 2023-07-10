<a href="<?= base_url(); ?><?= $this->folder; ?>/add">
   <button type="button" class="btn btn-primary mb-3 btn-sm">Thêm Feedback</button>
</a>
<div class="card">
   <div class="card-body">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Ảnh</th>
                  <th>Tên</th>
                  <th>Nội dung</th>
                  <th></th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($list_feedback as $value): ?>
                  <tr>
                     <td><?= $value['id']; ?></td>
                     <td><img src="<?= $value['img_account']; ?>" alt="" width="250px"></td>
                     <td class="fw-bold"><?= $value['name']; ?></td>
                     <td><?= $value['feedback']; ?></td>
                     <td>
                        <?php if($value['num'] != 1){ ?>
                           <a href="<?= $this->folder; ?>/tang/<?= $value['id']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
                        <?php } ?>
                        <?php if($value['num'] != count($list_feedback)){ ?>
                           <a href="<?= $this->folder; ?>/giam/<?= $value['id']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
                        <?php } ?>
                     </td>
                     <td>
                        <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
                           <i class="fas fa-pencil-alt"></i>
                        </a>
                        <?php if($value['post_status'] == 2 || $value['post_status'] == 4){ ?>
                           <a href="<?= $this->folder; ?>/tamdung/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng xe?')" style="margin-right: 10px;">
                            <i class="far fa-pause-circle"></i>
                         </a>
                      <?php } ?>
                      <?php if($value['post_status'] == 3){ ?>
                        <a href="<?= $this->folder; ?>/kichhoat/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn active tài khoản?')" style="margin-right: 10px;">
                         <i class="fas fa-play"></i>
                      </a>
                      <a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                         <i class="far fa-trash-alt"></i>
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