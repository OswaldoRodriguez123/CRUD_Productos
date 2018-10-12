<?php
	include_once("../../class/product.php");

	$Product = new Product();
    $ToReturn = $Product->getProducts();
    echo json_encode($ToReturn);
	
 ?>