<?php
	include_once("../../class/db.php");
	include_once("../../class/api.php");

	parse_str($_POST['data'], $data);
	
	$Api = new Api();
    $ToReturn = $Api->storeProduct($data['code'],$data['name'],$data['category_id'],$data['stock'],$data['price']);
    echo $ToReturn;
	
 ?>