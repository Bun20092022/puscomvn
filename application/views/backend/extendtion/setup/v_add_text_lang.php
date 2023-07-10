<?php 
	$view_title = $this->Model_backend->view_id('qh_setup_extend',$view_text['id_text']);
	if(isset($view_title)) {
		$viewtitle = json_decode($view_title['lang']);
	}
?>
<div class="card">
	<div class="card-header">
		<h6 class="card-title">Hiển thị chung</h6>
	</div>
	<div class="card-body">
		<form action="" method="post" id="form12">
			<div class="row">
				<div class="col-md-8">
					<label>Tiêu đề từ ngữ (<a href="backend/setup/general/lang_menu" target="_blank" style="color:blue"><i class="fa fa-plus"></i>Thêm từ ngữ hiển thị</a>)</label>
					<select class="select2 form-control mb-3 custom-select" name="id_text" style="width: 100%; height:36px;" id="form12">
						<optgroup label="Danh mục chọn">
							<!-- Lấy 5 cấp của danh mục cha -->
							<?php 
								$check_lang_menu = array(
							        'lang_menu' => 1,
							    );
							    $list_lang_id = $this->Model_backend->get_where('qh_setup_extend',$check_lang_menu); 
      						?>
							<?php foreach ($list_lang_id as $value): ?>
								<option value="<?= $value['id']; ?>"><b><?= $value['name']; ?></b></option>
							<?php endforeach ?>
						</optgroup>
					</select>
				</div><!-- end col -->
				<div class="col-md-4">     
					<label>&nbsp;</label> <br>                             
					<button class="btn btn-primary" type="submit" name="title" id="form12">Chỉnh sửa tiêu đề</button>
				</div><!-- end col -->
			</div>
		</form>
		<h4>
			Tiêu đề: <?php if(isset($viewtitle)){ echo $view_title['name']; }else{ echo 'Chưa có tiêu đề'; } ?> 
			<a href="backend/setup/general/lang_menu/update/<?= $view_text['id_text'] ?>" class="edit" style="margin-right: 10px;font-size: 13px;" title="Chỉnh sửa bài viết" target="_blank">
				<i class="fas fa-pencil-alt"></i>
			</a>
		</h4>
	</div>
</div>