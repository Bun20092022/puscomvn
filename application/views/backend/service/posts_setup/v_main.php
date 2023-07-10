<a href="<?= $this->folder; ?>/add/<?= $id_posts_setup; ?>"><button type="button" class="btn btn-primary btn-sm px-5 mb-3">Thêm <?= $view_posts_setup['product_setup_group']; ?></button></a>
<div class="row">
</div>
<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
               <thead>
                  <tr>
                     <th width="50px">STT</th>
                     <?php foreach ($this->language as $value_flag): ?>
                       <th class="text-center"><img src="<?= $value_flag['link_img']; ?>" alt="" width="18px"></th>
                    <?php endforeach ?>
                    <?php if($view_posts_setup['id'] == 1){ ?>
                     <th>Ảnh màu</th>
                     <th>Màu sắc</th>
                  <?php } ?>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php $dem = 0; ?>
               <?php foreach ($list_posts_setup as $value): ?>
                  <?php $name = json_decode($value['product_setup_extend']) ?>
                  <?php $dem += 1; ?>
                  <tr>
                     <td><?= $dem; ?></td>
                     <?php foreach ($this->language as $value_flag): ?>
                        <td class="text-center"><?= $name->{$value_flag['name_des']}; ?></td>
                     <?php endforeach ?>

                     <?php if($view_posts_setup['id'] == 1){ ?>
                        <td>
                           <?php if(strlen($value['link_image']) > 3){ ?>
                              <img src="<?= $value['link_image']; ?>" width="20px" height="20px" alt="">
                           <?php } ?>
                        </td>
                        <td> <div style="background: <?= $value['product_color']; ?>;width: 20px;height: 20px;"></div></td>
                     <?php } ?>
                     <td class="text-center">
                        <a href="<?= $this->folder; ?>/update/<?= $value['id']; ?>/<?= $id_posts_setup; ?>" style="margin-right: 10px;"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>/<?= $id_posts_setup; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $value['product_setup_extend'];?>?')"><i class="far fa-trash-alt"></i></a>
                     </td>
                  </tr>
               <?php endforeach ?>
            </tbody>
         </table>
      </div>
   </div>
</div>  
</div>
</div>