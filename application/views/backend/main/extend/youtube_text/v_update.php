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
				<div class="row">
					<div class="col-md-12 mb-3">
						<p class="form-label">Video hiện tại</p>
						<iframe width="400" height="250" src="https://www.youtube.com/embed/<?= get_youtube($view['link_img']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Thay thế Video</label>
							<div class="row">
								<input id="xFilePath" name="link_img" type="text" class="form-control" value="<?= $view['link_img']; ?>">
							</div>
						</div>
					</div>
				<div class="col-md-12 mb-3">
				<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
					<?php $dem = 0; ?>
					<?php foreach ($this->language as $value): ?>
					<?php $dem += 1; ?>
					<li class="nav-item" role="presentation">
						<a class="nav-link <?php if($dem == 1){ echo 'active'; } ?>" data-bs-toggle="tab" href="#tab<?= $value['id']; ?>" role="tab" aria-selected="true">
							<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
							<span class="d-none d-sm-block"><?= $value['name']; ?></span> 
						</a>
					</li>
					<?php endforeach ?>
				</ul>
				<div class="tab-content p-3 text-muted">
					<?php $dem = 0; ?>
					<?php foreach ($this->language as $value): ?>
					<?php $dem += 1; ?>
					<div class="tab-pane <?php if($dem == 1){ echo 'active'; } ?>" id="tab<?= $value['id']; ?>" role="tabpanel">
						<label class="form-label">Nội dung <?= $value['name']; ?></label>
						<textarea id="textarea" class="form-control" name="text_<?= $value['name_des']; ?>"><?php $this->Model_main->get_lang($view['text'],$value['name_des']); ?></textarea>
						<script>
							CKEDITOR.replace('text_<?= $value['name_des']; ?>');
						</script>
					</div>
					<?php endforeach ?>
				</div>
			</div>
				<div class="col-md-12 mb-3">
					<button class="btn btn-primary" type="submit" name="update">Chỉnh sửa nội dung</button>
				</div>
			</div>
		</form>
	</div>
</div>	
</form>