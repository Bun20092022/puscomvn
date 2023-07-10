<?php $list_status = $this->db->select('*')->from('qh_setup')->where('father',1)->get()->result_array(); ?>
<div class="row">
    <div class="col-12 mb-3">
        <a href="<?= base_url(); ?><?= $this->folder; ?>/add/<?= $this->post_type; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Thêm bài viết mới</a>
        <?php foreach ($list_status as $value): ?>
            <?php 
            $check_status = array(
                'post_status' => $value['id'],
                'post_type_id' => $this->post_type_id,
            );
            $list_count = $this->Model_backend->get_where('qh_posts',$check_status);
            ?>
            <a href="<?= $this->folder; ?>/status/<?= $this->post_type; ?>/<?= $value['id']; ?>" class="<?= $value['class2']; ?> <?php if($id_status == $value['id']){ echo 'active'; } ?>"><?= $value['extend']; ?> (<?= count($list_count) ?>)</a>
        <?php endforeach ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách bài viết</h4>
                <p class="card-title-desc">Tổng hợp bài viết chuyên mục tin tức.</p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Bài viết</th>
                            <?php foreach ($this->language as $value_flag): ?>
                                <th width="50px" class="text-center"><img src="<?= $value_flag['link_img']; ?>" alt="" width="18px"></th>
                            <?php endforeach ?>
                            <th class="text-center">Chuyên mục</th>
                            <th class="text-center">Ngày đăng</th>
                            <th class="text-center">Lượt xem</th>
                            <th class="text-center">Tình trạng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $dem = 0; ?>
                        <?php foreach ($list_posts as $value): ?>
                            <?php $dem += 1; ?>
                            <?php $view_hoat_dong = $this->Model_backend->view_id('qh_setup_group',$value['post_status']); ?>
                            <?php $view_category = $this->Model_backend->view_id('qh_post_category',$value['post_category_id_ze']); ?>
                            <?php $name = json_decode($value['name']); ?>
                            <tr>
                                <td><?= $dem; ?></td>
                                <td><?= $name->{'vn'}; ?></td>
                                <?php foreach ($this->language as $value_flag): ?>
                                    <td class="text-center">
                                        <a href="<?= base_url(); ?><?= $this->folder; ?>/update/<?= $this->post_type; ?>/<?= $value_flag['name_des']; ?>/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                <?php endforeach ?>
                                <td class="text-center"><?php $this->Model_main->get_name_category_id($value['post_category_id_ze'],'vn'); ?></td>
                                <td class="text-center"><?= date('d-m-y H:i:s',$value['post_date']); ?></td>
                                <td class="text-center"><?= $value['view']; ?></td>
                                <td class="text-center"><span class="<?= $view_hoat_dong['class'] ?>"><?= $view_hoat_dong['extend'] ?></span></td>
                                <td>
                                    <?php if($value['post_status'] == 2 && isset($view_category)){ ?>
                                        <a href="<?= base_url(); ?>vn/<?= $view_category['url_vn']; ?>/<?= $value['url_vn']; ?>" class="view" style="margin-right: 10px;" target="_blank">
                                            <i class="fas fa-rss-square"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($value['post_status'] == 2 || $value['post_status'] == 4){ ?>
                                        <a href="<?= $this->folder; ?>/tamdung/<?= $this->post_type; ?>/<?= $value['id']; ?>/<?= $id_status; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng xe?')" style="margin-right: 10px;">
                                            <i class="far fa-pause-circle"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($value['post_status'] == 3){ ?>
                                        <a href="<?= $this->folder; ?>/kichhoat/<?= $this->post_type; ?>/<?= $value['id']; ?>/<?= $id_status; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn active tài khoản?')" style="margin-right: 10px;">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        <a href="<?= $this->folder; ?>/delete/<?= $this->post_type; ?>/<?= $value['id']; ?>/<?= $id_status; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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
