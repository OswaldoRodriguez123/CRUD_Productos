<?php
	include_once("../../class/db.php");
	include_once("../../class/api.php");
	$Api = new Api();
    $ToReturn = $Api->getProduct($_POST['data']);
    echo json_encode($ToReturn);
	
 ?>