<div class="card">
	<div class="card-header">
		<h4 class="card-title">Thêm nội dung code</h4>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Tên mô tả nội dung</label>
					<input type="text" class="form-control" name="name" value="Code Show">
				</div>
				<div class="col-md-12 mb-3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">
								<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
								<span class="d-none d-sm-block">HTML</span>    
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false" tabindex="-1">
								<span class="d-block d-sm-none"><i class="far fa-user"></i></span>
								<span class="d-none d-sm-block">CSS</span>    
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
								<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
								<span class="d-none d-sm-block">Javascript</span>    
							</a>
						</li>
					</ul>
					<div class="tab-content p-3 text-muted">
						<div class="tab-pane active" id="home" role="tabpanel">
							<label class="form-label">Nội dung HTML</label>
							<textarea class="form-control mb-3" rows="20" name="html_text"></textarea>
						</div>
						<div class="tab-pane" id="profile" role="tabpanel">
							<label class="form-label">Nội dung CSS</label>
							<textarea class="form-control mb-3" rows="20" name="css_text"></textarea>
						</div>
						<div class="tab-pane" id="messages" role="tabpanel">
							<label class="form-label">Nội dung Javacript</label>
							<textarea class="form-control mb-3" rows="20" name="javascript_text"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<button class="btn btn-primary" type="submit" name="add_code">Thêm code</button>
				</div>
			</div>
		</form>
	</div>
</div>	
</form>
bu