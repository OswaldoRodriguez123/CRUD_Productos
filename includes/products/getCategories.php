<?php
	include_once("../../class/product.php");
	include_once("../../class/db.php");

	$Product = new Product();
    $ToReturn = $Product->getCategories();
    echo json_encode($ToReturn);
	
 ?>