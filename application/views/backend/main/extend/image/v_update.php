<div class="row">
	<div class="col-md-12 mb-3">
		<a href="backend/news/posts_extend/add/<?= $view['id_posts'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại bài viết</a>
	</div>
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Thêm hình ảnh</h4>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12 mb-3">
							<label class="form-label">Link hình ảnh</label>
							<div class="row">
								<div class="col-md-8">
									<input id="xFilePath" name="link_img" type="text" size="60" class="form-control">
								</div>
								<div class="col-md-4">
									<input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<button class="btn btn-primary" type="submit" name="add">Thêm hình ảnh</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
		<div class="btn-group mb-3">
			<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
				Số cột hiển thị:  <?php $this->Model_main->get_fill_symtem('symtem_extend',$view['num_colum']); ?><i class="mdi mdi-chevron-down"></i>
			</button>
			<div class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 30px);" data-popper-placement="bottom-start">
				<?php $list_colum = $this->Model_backend->get_father_symtem_id(1); ?>
				<?php foreach ($list_colum as $value): ?>
					<a class="dropdown-item" href="backend/main/extend/image/change_colum/<?= $view['id']; ?>/<?= $value['id']; ?>">Hiển thị <?= $value['symtem_extend']; ?> cột</a>
				<?php endforeach ?>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Danh sách hình ảnh</h4>
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Hình ảnh</th>
							<th>Sắp xếp</th>
							<th>Hoạt động</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($list_extend_image as $value): ?>
							<tr>
								<td><?= $value['num']; ?></td>
								<td><img src="<?= $value['link']; ?>" alt="" width="100px"></td>
								<td>
									<?php if($value['num'] != 1){ ?>
										<a href="<?= $this->folder; ?>/tang/<?= $value['id']; ?>/<?= $view['id_posts'] ?>/<?= $value['id_posts_extend']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
									<?php } ?>
									<?php if($value['num'] != count($list_extend_image)){ ?>
										<a href="<?= $this->folder; ?>/giam/<?= $value['id']; ?>/<?= $view['id_posts'] ?>/<?= $value['id_posts_extend']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
									<?php } ?>
								</td>
								<td>
									<a href="backend/main/extend/image/update_image/<?= $value['id']; ?>" class="edit" style="margin-right: 10px;">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<?php if($value['post_status'] == 2){ ?>
										<a href="<?= $this->folder; ?>/tamdung/<?= $value['id']; ?>/<?= $view['id_posts'] ?>/<?= $value['id_posts_extend']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng chuyên mục?')" title="Tạm dừng" style="margin-right: 10px;">
											<i class="far fa-pause-circle"></i>
										</a>
									<?php } ?>
									<?php if($value['post_status'] == 3){ ?>
										<a href="<?= $this->folder; ?>/kichhoat/<?= $value['id']; ?>/<?= $view['id_posts'] ?>/<?= $value['id_posts_extend']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động chuyên mục?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
											<i class="fas fa-play" style="color: blue;"></i>
										</a>
										<a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>/<?= $value['id_posts_extend']; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
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