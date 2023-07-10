<?php $list = $this->db->select('*')->from('qh_posts_extend')->get()->result_array(); ?>
<?php foreach ($list as $value): ?>
	<?php echo $value['text']; ?>
<?php endforeach ?>