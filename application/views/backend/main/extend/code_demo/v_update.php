<div class="card">
	<div class="card-header">
		<h4 class="card-title">Thêm nội dung code</h4>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Tên mô tả nội dung</label>
					<input type="text" class="form-control" name="name" value="<?= $view['name'] ?>">
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Nội dung code</label>
					<textarea class="form-control mb-3" rows="20" name="text_code"><?= $view['text'] ?></textarea>
				</div>
				<div class="col-md-12 mb-3">
					<button class="btn btn-primary" type="submit" name="update_code">Thêm code</button>
				</div>
			</div>
		</form>
	</div>
</div>	
</form>