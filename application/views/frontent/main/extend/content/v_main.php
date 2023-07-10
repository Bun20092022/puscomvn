<?php 
$language = $this->session->userdata('ss_languagew');
if(isset($language)){
	$this->id_language = $language['name_lang'];
}else{
	$this->id_language = 'vn';
}
?>
<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<?php $this->Model_main->get_lang($view_extend['text'],$this->id_language); ?>
