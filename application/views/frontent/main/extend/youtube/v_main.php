<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
	$this->id_language = $language['name_lang'];
}else{
	$this->id_language = 'vn';
}
?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<?php $list_image = $this->db->select('*')->from('qh_post_img')->where('id_posts_extend',$id_extend)->get()->result_array(); ?>
<?php $view_setup = $this->Model_main->view_id('qh_system_template_setup',$view_extend['num_colum']); ?>
<style>
	.video-container {
		position: relative;
		padding-bottom: 56.25%;
		padding-top: 30px; height: 0; overflow: hidden;
	}

	.video-container iframe,
	.video-container object,
	.video-container embed {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
<div class="row">
	<?php foreach($list_image as $value): ?>
		<div class="col-md-<?= $view_setup['symtem_extend_num']; ?>">
			<div class="video-container"><iframe width="853" height="480" src="https://www.youtube.com/embed/<?= get_youtube($value['link']); ?>" frameborder="0" allowfullscreen></iframe></div>
		</div>
	<?php endforeach ?>
</div>