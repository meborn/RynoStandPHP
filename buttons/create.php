<?php
	require('../includes/DB.php');

	$product_id = $_POST['product_id'];
	$url = $_POST['url'];

	$db = new DB();

	$button = array("product_id"=>$product_id, "url"=> $url);

	$db->createButton($button);

?>