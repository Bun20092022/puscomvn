 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
            </div><!--end card-header-->
            <div class="card-body">  
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên nhân sự</th>
                            <th class="text-center">User nhân sự</th>
                            <th class="text-center">Mã nhân viên</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Hoạt động</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $dem = 0; ?>
                        <?php foreach ($danhsachnhansu as $value): ?>
                            <?php $view_hoat_dong = $this->Model_backend->view_id('qh_setup',$value['active']); ?>
                            <?php $dem += 1; ?>
                        <tr>
                            <td class="text-center"><?= $dem; ?></td>
                            <td class="text-center"><?= $value['name']; ?></td>
                            <td class="text-center"><?= $value['username']; ?></td>
                            <td class="text-center"><?= $value['manhansu']; ?></td>
                            <td class="text-center"><?= $value['phone']; ?></td>
                            <td class="text-center"><?= $value['ghichu']; ?></td>
                            <td class="text-center"><span class="<?= $view_hoat_dong['class'] ?>"><?= $view_hoat_dong['extend'] ?></span></td>
                            <td class="text-center">
                                    <a href="<?= $this->folder; ?>/update/<?= $id_work; ?>/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php if($value['active'] == 2){ ?>
                                    <a href="<?= $this->folder; ?>/tamdung/<?= $id_work; ?>/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng tài khoản?')">
                                        <i class="far fa-pause-circle"></i>
                                    </a>
                                    <?php } ?>
                                    <?php if($value['active'] == 3){ ?>
                                    <a href="<?= $this->folder; ?>/kichhoat/<?= $id_work; ?>/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn active tài khoản?')" style="margin-right: 10px;">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    <a href="<?= $this->folder; ?>/delete/<?= $id_work; ?>/<?= $value['id']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
    </div> <!-- end col -->
</div> <!-- end row -->
