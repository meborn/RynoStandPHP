<?php
	require('../includes/DB.php');

	$product_id = $_POST['product_id'];
	$name = $_POST['name'];
	$num = $_POST['num'];

	$db = new DB();

	$detail = array("product_id"=>$product_id, "name"=> $name, "num"=>$num);

	$db->createDetail($detail);

?>