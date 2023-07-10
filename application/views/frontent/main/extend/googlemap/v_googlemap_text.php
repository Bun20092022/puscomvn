<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
	$this->id_language = $language['name_lang'];
}else{
	$this->id_language = 'vn';
}
?>
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
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<div class="row mt-3">
	<div class="col-md-6">
		<iframe src="<?= $view_extend['link_img']; ?>" width="100%" height="<?= $view_extend['height_object']; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
		<div class="col-md-6">
		<?php $this->Model_main->get_lang($view_extend['text'],$this->id_language); ?>
	</div>
</div>