<?php
	include_once("../../class/product.php");
	$Product = new Product();
    $ToReturn = $Product->updateProduct($_POST['data']);
    echo $ToReturn;
	
 ?>