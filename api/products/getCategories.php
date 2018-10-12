<?php
	include_once("../../class/db.php");
	include_once("../../class/api.php");

	$Api = new Api();
    $ToReturn = $Api->getCategories();
    echo json_encode($ToReturn);
	
 ?>