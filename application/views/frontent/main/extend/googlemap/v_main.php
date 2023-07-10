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
<div class="row mt-3">
	<?php foreach($list_image as $value): ?>
		<iframe src="<?= $value['link']; ?>" width="100%" height="<?= $value['height_object']; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	<?php endforeach ?>
</div>