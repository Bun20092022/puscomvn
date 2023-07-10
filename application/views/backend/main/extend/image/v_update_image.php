<div class="row">
	<div class="col-md-12 mb-3">
		<a href="backend/main/extend/image/update/<?= $view['id_posts_extend'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách hình ảnh</a>
	</div>
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Thay thế hình ảnh</h4>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12 mb-3">
							<p>Hình ảnh hiện tại</p>
							<img src="<?= $view['link']; ?>" alt="" width="500">
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Thay thế hình ảnh</label>
							<div class="row">
								<div class="col-md-8">
									<input id="xFilePath" name="link_img" type="text" class="form-control" value="<?= $view['link']; ?>">
								</div>
								<div class="col-md-4">
									<input type="button" class="btn btn-primary" value="Load ảnh" onclick="BrowseServer();" />
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<button class="btn btn-primary" type="submit" name="update">Chỉnh sửa hình ảnh</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>