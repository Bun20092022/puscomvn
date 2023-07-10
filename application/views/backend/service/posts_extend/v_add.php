<div class="row" style="margin-bottom: 500px;">
	<div class="col-md-12 mb-3">
		<a href="backend/service/posts/update/<?= $view_post_type['uri']; ?>/vn/<?= $id_posts; ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại bài viết</a>
		<a href="backend/main/extend/neo/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Thẻ neo</a>
		<a href="backend/main/extend/content/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Nội dung</a>
		<div class="btn-group">
			<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
				Thêm hình ảnh <i class="mdi mdi-chevron-down"></i>
			</button>
			<div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 30px);" data-popper-placement="bottom-start">
				<?php $list_colum = $this->Model_backend->get_father_symtem_id(1); ?>
				<?php foreach ($list_colum as $value): ?>
					<a class="dropdown-item" href="backend/main/extend/image/add/<?= $id_posts; ?>/<?= $value['id']; ?>">Thêm hình ảnh <?= $value['symtem_extend']; ?> cột</a>
				<?php endforeach ?>
				<a class="dropdown-item" href="backend/main/extend/image_text/add/<?= $id_posts; ?>">Thêm hình Responsive</a>
				<a class="dropdown-item" href="backend/main/extend/image_text/add/<?= $id_posts; ?>">Thêm hình ảnh - Text</a>
				<a class="dropdown-item" href="backend/main/extend/text_image/add/<?= $id_posts; ?>">Thêm Text - hình ảnh</a>
				<a class="dropdown-item" href="backend/main/extend/image_text_image/add/<?= $id_posts; ?>">Thêm hình ảnh - Text - hình ảnh</a>
				<a class="dropdown-item" href="backend/main/extend/text_image_text/add/<?= $id_posts; ?>">Thêm Text - hình ảnh - Text</a>
			</div>
		</div>
		<a href="backend/main/extend/sliderimg/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Slide ảnh</a>
		<div class="btn-group">
			<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
				Youtube <i class="mdi mdi-chevron-down"></i>
			</button>
			<div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 30px);" data-popper-placement="bottom-start">
				<?php $list_colum = $this->Model_backend->get_father_symtem_id(1); ?>
				<?php foreach ($list_colum as $value): ?>
					<a class="dropdown-item" href="backend/main/extend/youtube/add/<?= $id_posts; ?>/<?= $value['id']; ?>">Thêm video <?= $value['symtem_extend']; ?> cột</a>
				<?php endforeach ?>
				<a class="dropdown-item" href="backend/main/extend/youtube_text/add/<?= $id_posts; ?>">Thêm Video - Text</a>
				<a class="dropdown-item" href="backend/main/extend/text_youtube/add/<?= $id_posts; ?>">Thêm Text - Video</a>
			</div>
		</div>
		<div class="btn-group">
			<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
				GoogleMap <i class="mdi mdi-chevron-down"></i>
			</button>
			<div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 30px);" data-popper-placement="bottom-start">
				<?php $list_colum = $this->Model_backend->get_father_symtem_id(1); ?>
				<?php foreach ($list_colum as $value): ?>
					<a class="dropdown-item" href="backend/main/extend/googlemap/add/<?= $id_posts; ?>/<?= $value['id']; ?>">Thêm GoogleMap <?= $value['symtem_extend']; ?> cột</a>
				<?php endforeach ?>
				<a class="dropdown-item" href="backend/main/extend/googlemap_text/add/<?= $id_posts; ?>">Thêm GoogleMap - Text</a>
				<a class="dropdown-item" href="backend/main/extend/text_googlemap/add/<?= $id_posts; ?>">Thêm Text - GoogleMap</a>
			</div>
		</div>
		<a href="backend/main/extend/code/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Thêm code</a>
		<a href="backend/main/extend/code_demo/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Thêm code Demo</a>
		<a href="backend/main/extend/code_show/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Code show</a>
		<a href="backend/main/extend/space/add/<?= $id_posts; ?>" class="btn btn-sm btn-primary">Khoảng trống</a>
	</div>
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Mô tả</th>
								<th>Sắp xếp</th>
								<th>Thể loại</th>
								<th>Đặt làm đại diện</th>
								<th>Hoạt động</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list_posts_extend as $value): ?>
								<tr>
									<td><?= $value['num']; ?></td>
									<td><?= $value['name']; ?></td>
									<td>
										<?php if($value['num'] != 1){ ?>
											<a href="<?= $this->folder; ?>/tang/<?= $value['id']; ?>/<?= $value['id_posts']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
										<?php } ?>
										<?php if($value['num'] != count($list_posts_extend)){ ?>
											<a href="<?= $this->folder; ?>/giam/<?= $value['id']; ?>/<?= $value['id_posts']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
										<?php } ?>
									</td>
									<td><?php $this->Model_main->get_fill('qh_setup','extend',$value['type_posts']); ?></td>
									<td>
									<?php if($value['type_posts'] == 56){ ?>
										<?php if($value['main_post'] == 0){ ?>
										<a href="backend/main/extend/main_post/add/<?= $value['id']; ?>" class="btn btn-sm btn-primary" onclick="return confirm('Bạn có chắc chắn muốn đặt làm đại diện?')">Đặt làm đại diện</a>
									<?php }else{ ?>
										<a href="backend/main/extend/main_post/delete/<?= $value['id']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Bạn có chắc chắn muốn hủy làm đại diện?')">Hủy đại diện</a>
									<?php } ?>
									<?php } ?>
									<?php if($value['type_posts'] == 57){ ?>
										<?php if($value['show_code'] == 0){ ?>
										<a href="backend/main/extend/show_code/add/<?= $value['id']; ?>" class="btn btn-sm btn-primary" onclick="return confirm('Bạn có chắc chắn muốn đặt làm đại diện?')">Show Code</a>
									<?php }else{ ?>
										<a href="backend/main/extend/show_code/delete/<?= $value['id']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Bạn có chắc chắn muốn hủy làm đại diện?')">Hủy Show Code</a>
									<?php } ?>
									<?php } ?>
									</td>
									<td>
										<a href="<?php $this->Model_main->get_fill_setup('url_backend',$value['type_posts']); ?><?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
											<i class="fas fa-pencil-alt"></i>
										</a>
										<?php if($value['post_status'] == 2){ ?>
											<a href="<?= $this->folder; ?>/tamdung/<?= $value['id']; ?>/<?= $value['id_posts']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
												<i class="far fa-pause-circle"></i>
											</a>
										<?php } ?>
										<?php if($value['post_status'] == 3){ ?>
											<a href="<?= $this->folder; ?>/kichhoat/<?= $value['id']; ?>/<?= $value['id_posts']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
												<i class="fas fa-play" style="color: blue;"></i>
											</a>
											<a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>/<?= $value['id_posts']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
												<i class="far fa-trash-alt" style="color: red;"></i>
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
</div>