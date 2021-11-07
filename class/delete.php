<?php
require_once("class.php");
$numDoc=array("numDoc"=> $numDoc = $_POST['numDoc']);
$objDelete = new Students;
echo $objDelete->deleteData($numDoc);