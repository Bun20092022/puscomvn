<div class="card">
	<div class="card-body">
		<h6 class="card-title">Hiển thị chung</h6>
		<form action="" method="post" id="form12">
			<div class="row">
				<div class="col-md-8">
					<label class="mt-3">Tiêu đề từ ngữ (<a href="backend/setup/general/lang_menu" target="_blank" style="color:blue"><i class="fa fa-plus"></i>Thêm từ ngữ hiển thị</a>)</label>
					<select class="select2 form-control mb-3 custom-select" name="id_text" style="width: 100%; height:36px;" id="form12">
						<optgroup label="Danh mục chọn">
							<!-- Lấy 5 cấp của danh mục cha -->
							<?php $list_lever1 = $this->Model_backend->get_all_asc('qh_setup_extend'); ?>
							<?php foreach ($list_lever1 as $value1): ?>
								<option value="<?= $value1['id']; ?>"><b><?= $value1['name']; ?></b></option>
							<?php endforeach ?>
						</optgroup>
					</select>
				</div><!-- end col -->
				<div class="col-md-4">     
					<label class="mt-3">&nbsp;</label> <br>                             
					<button class="btn btn-primary" type="submit" name="title" id="form12">Chỉnh sửa tiêu đề</button>
				</div><!-- end col -->
			</div>
		</form>
	</div>
</div>