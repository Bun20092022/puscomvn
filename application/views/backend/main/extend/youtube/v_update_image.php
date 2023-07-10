<div class="row">
	<div class="col-md-12 mb-3">
		<a href="<?= $this->folder; ?>/update/<?= $view['id_posts_extend'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-rotate-left"></i> Trở lại danh sách Youtube</a>
	</div>
	<div class="col-md-12 mb-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Thay thế video</h4>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="row">
						<div class="col-md-12 mb-3">
							<p>Video hiện tại</p>
							<iframe width="400" height="250" src="https://www.youtube.com/embed/<?= get_youtube($view['link']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Thay thế video</label>
							<div class="row">
								<input id="xFilePath" name="link_img" type="text" class="form-control" value="<?= $view['link']; ?>">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<button class="btn btn-primary" type="submit" name="update">Chỉnh sửa video</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>