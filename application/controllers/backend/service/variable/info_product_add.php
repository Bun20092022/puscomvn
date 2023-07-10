<?php 
	$price = array(
		'vn' => '',
		'en' => '',
		'jp' => '',
		'kr' => '',
		'ch' => '',
		'lg' => '',
	);
	$price[$this->language_main]= $_POST['price_'.$this->language_main];
	$price_product = array(
		'vn' => '',
		'en' => '',
		'jp' => '',
		'kr' => '',
		'ch' => '',
		'lg' => '',
	);
	$price_product[$this->language_main]= $_POST['price_product_'.$this->language_main];
	$price_event = array(
		'vn' => '',
		'en' => '',
		'jp' => '',
		'kr' => '',
		'ch' => '',
		'lg' => '',
	);
	$price_event[$this->language_main]= $_POST['price_event_'.$this->language_main];

	$color = [];
	if($_POST['color'] != null) {
		$color = $_POST['color'];
	}
	$size = [];
	if($_POST['size'] != null) {
		$size = $_POST['size'];
	}
	$nhaphanphoi = [];
	if($_POST['nhaphanphoi'] != null) {
		$nhaphanphoi = $_POST['nhaphanphoi'];
	}
?>