<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
	$this->id_language = $language['name_lang'];
}else{
	$this->id_language = 'vn';
}
?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<div class="row mt-3">
	<div class="col-md-6">
		<img src="<?= $view_extend['link_img']; ?>" alt="" width="100%">
	</div>
	<div class="col-md-6">
		<?php $this->Model_main->get_lang($view_extend['text'],$this->id_language); ?>
	</div>
</div>