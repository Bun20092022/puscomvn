<div class="row">
	<div class="col-md-12 mb-3">
		<a href="<?= $this->folder; ?>/update/<?= $view['id_posts_extend'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách Youtube</a>
	</div>
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Thay thế Thêm Google Map</h4>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12 mb-3">
							<p>Thêm Google Map hiện tại</p>
							<iframe src="<?= $view['link']; ?>" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Thay thế Thêm Google Map</label>
							<textarea class="form-control" name="link_img" rows="5" required><?= $view['link']; ?></textarea>
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Chiều cao Google Map (px)</label>
							<input type="number" class="form-control" name="height_object" value="<?= $view['height_object']; ?>" required>
						</div>
						<div class="col-md-12 mb-3">
							<button class="btn btn-primary" type="submit" name="update">Chỉnh sửa Thêm Google Map</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>