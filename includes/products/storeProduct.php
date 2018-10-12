<?php
	include_once("../../class/product.php");
	
	$Product = new Product();
    $ToReturn = $Product->storeProduct($_POST['data']);
    echo $ToReturn;
	
 ?>