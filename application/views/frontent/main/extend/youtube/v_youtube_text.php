<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
	$this->id_language = $language['name_lang'];
}else{
	$this->id_language = 'vn';
}
?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<div class="row mt-3">
	<div class="col-md-6">
		<div class="video-container"><iframe width="853" height="480" src="https://www.youtube.com/embed/<?= get_youtube($view_extend['link_img']); ?>" frameborder="0" allowfullscreen></iframe></div>
	</div>
		<div class="col-md-6">
		<?php $this->Model_main->get_lang($view_extend['text'],$this->id_language); ?>
	</div>
</div>