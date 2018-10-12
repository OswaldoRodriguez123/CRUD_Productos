<?php
	include_once("../../class/db.php");
	include_once("../../class/product.php");

	parse_str($_POST['data'], $data);
	
	$Product = new Product();
    $ToReturn = $Product->storeProduct($data['code'],$data['name'],$data['category_id'],$data['stock'],$data['price']);
    echo $ToReturn;
	
 ?>