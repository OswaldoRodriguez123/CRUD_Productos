<?php
	include_once("../../class/product.php");
	
	$Product = new Product();
    $ToReturn = $Product->deleteProduct($_POST['id']);
    echo $ToReturn;
	
 ?>