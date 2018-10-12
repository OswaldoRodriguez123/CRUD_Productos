<?php
	include_once("../../class/product.php");
	$Product = new Product();
    $ToReturn = $Product->getProduct($_POST['id']);
    echo json_encode($ToReturn);
	
 ?>