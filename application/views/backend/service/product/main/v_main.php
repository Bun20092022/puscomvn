<div class="row">
	<div class="col-md-12 mb-3">
		<a href="backend/service/posts/update/product/vn/<?= $id_post; ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại bài viết</a>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Thêm thông tin hình ảnh cho Sản phẩm</h4>
			</div>
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
							<span class="d-none d-sm-block">Hình ảnh</span>    
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
							<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
							<span class="d-none d-sm-block">Video từ Youtube</span>    
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
							<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
							<span class="d-none d-sm-block">Video từ Computer</span>    
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
							<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
							<span class="d-none d-sm-block">Ảnh 360 độ</span>    
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-3 text-muted">
					<div class="tab-pane active" id="home" role="tabpanel">
						<form action="" method="post" id="form1">
							<div class="mb-3">
								<label class="form-label">Ảnh website</label>
								<div class="row">
									<div class="col-md-8">
										<input id="xFilePath1" name="link_img" type="text" size="60" class="form-control" id="form1">
									</div>
									<div class="col-md-4">
										<input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer1();" />
									</div>
									<div class="col-md-12 mt-3">
										<button class="btn btn-sm btn-primary" type="submit" name="add" value="addimg" id="form1">Thêm hình ảnh</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="profile" role="tabpanel">
						<form action="" method="post" id="form2">
							<div class="mb-3">
								<label class="form-label">Video Youtube</label>
								<div class="row">
									<div class="col-md-12">
										<input name="link_youtube" type="text" size="60" class="form-control" id="form2">
									</div>
									<div class="col-md-12 mt-3">
										<button class="btn btn-sm btn-primary" type="submit" name="add" value="addvideoyoutube" id="form2">Thêm Video Youtube</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="messages" role="tabpanel">
						<form action="" method="post" id="form3">
							<div class="mb-3">
								<label class="form-label">Tải Video Từ Máy Tính</label>
								<div class="row">
									<div class="col-md-8">
										<input id="xFilePath2" name="link_video_location" type="text" size="60" class="form-control" id="form3">
									</div>
									<div class="col-md-4">
										<input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer2();" />
									</div>
									<div class="col-md-12 mt-3">
										<button class="btn btn-sm btn-primary" type="submit" name="add" value="add_video_location" id="form3">Thêm Video từ Location</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="settings" role="tabpanel">
						<form action="" method="post" id="form4">
							<div class="mb-3">
								<label class="form-label">Ảnh 360 độ</label>
								<div class="row">
									<div class="col-md-8">
										<input id="xFilePath3" name="img_360" type="text" size="60" class="form-control" id="form4">
									</div>
									<div class="col-md-4">
										<input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer3();" />
									</div>
									<div class="col-md-12 mt-3">
										<button class="btn btn-sm btn-primary" type="submit" name="add" value="add_img_360" id="form4">Thêm Video từ Location</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php $list_posts_extend = $this->db->select('*')->from('qh_posts_product_extend')->where('id_product',$id_post)->order_by('num','asc')->get()->result_array(); ?>
<div class="row">
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
								<th>Hoạt động</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($list_posts_extend as $value): ?>
								<tr>
									<td><?= $value['num']; ?></td>
									<td>
										<?php if($value['id_product_setup'] == 26){ ?>
											<img src="<?= $value['link']; ?>" width="100px">
										<?php }elseif($value['id_product_setup'] == 27) { ?>
											<iframe width="200px" height="110px" src="https://www.youtube.com/embed/<?= get_youtube($value['link']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
										<?php }elseif($value['id_product_setup'] == 28){ ?>
											<video controls width="200px">
										        <source src="<?= $value['link']; ?>">
										    </video>
										<?php } ?>
									</td>
									<td>
										<?php if($value['num'] != 1){ ?>
											<a href="<?= $this->folder; ?>/tang/<?= $value['id']; ?>/<?= $value['id_product']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color: green;" title="Tăng 1 cấp"><i class="fas fa-angle-double-up"></i></a>
										<?php } ?>
										<?php if($value['num'] != count($list_posts_extend)){ ?>
											<a href="<?= $this->folder; ?>/giam/<?= $value['id']; ?>/<?= $value['id_product']; ?>/<?= $value['num']; ?>" style="margin-right: 10px;color:red;" title="Giảm 1 cấp"><i class="fas fa-angle-double-down"></i></a>
										<?php } ?>
									</td>
									<td>
										<?php if($value['post_status'] == 2){ ?>
											<a href="<?= $this->folder; ?>/tamdung/<?= $value['id']; ?>/<?= $id_post; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn tạm dừng?')" title="Tạm dừng" style="margin-right: 10px;">
												<i class="far fa-pause-circle"></i>
											</a>
										<?php } ?>
										<?php if($value['post_status'] == 3){ ?>
											<a href="<?= $this->folder; ?>/kichhoat/<?= $value['id']; ?>/<?= $id_post; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn hoạt động?')" title="Hoạt động chuyên mục" style="margin-right: 10px;">
												<i class="fas fa-play" style="color: blue;"></i>
											</a>
											<a href="<?= $this->folder; ?>/delete/<?= $value['id']; ?>/<?= $id_post; ?>" class="remove" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa chuyên mục">
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