<?php
$name = json_decode($view_category['name']);
$name->{$lang} = $_POST['name_'.$lang];

$title = json_decode($view_category['title']);
$title->{$lang} = $_POST['title_'.$lang];

$description = json_decode($view_category['description']);
$description->{$lang} = $_POST['description_'.$lang];

$keywords = json_decode($view_category['keywords']);
$keywords->{$lang} = $_POST['keywords_'.$lang];

$imgwebsite = json_decode($view_category['imgwebsite']);
$imgwebsite->{$lang} = $_POST['imgwebsite_'.$lang];

$imgsocial = json_decode($view_category['imgsocial']);
$imgsocial->{$lang} = $_POST['imgsocial_'.$lang];

$content = json_decode($view_category['content']);
$content->{$lang} = $_POST['content_'.$lang];

$imgbackground = json_decode($view_category['img_background']);
$imgbackground->{$lang} = $_POST['imgbackground_'.$lang];
?>