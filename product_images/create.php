<?php
	require('../includes/DB.php');

	$product_id = $_POST['product_id'];
	$image_url = $_POST['image_url'];
	$title = $_POST['title'];
	$image_order = $_POST['image_order'];

	$db = new DB();

	$image = array("product_id"=>$product_id, "image_url"=>$image_url, "title"=> $title, "image_order"=>$image_order);

	$db->createImage($image);

?>