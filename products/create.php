<?php
	require('../includes/DB.php');

	$name = $_POST['name'];
	$description = $_POST['description'];
	$image_url = $_POST['image_url'];
	$type = $_POST['type'];
	$price = $_POST['price'];

	$db = new DB();

	$product = array("name"=>$name, "description"=>$description, "image_url"=>$image_url, "type"=> $type, "price"=>$price);

	$db->createProduct($product);

?>