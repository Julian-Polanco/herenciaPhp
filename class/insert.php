<?php
require_once("class.php");

$data=array(
    "numDoc"=>$numDoc = $_POST['numDoc'],
    "name"=>$name = $_POST['name'],
    "lastName"=>$lastName = $_POST['lastName'],
    "address"=>$address = $_POST['address'],
    "phone"=>$phone = $_POST['phone'],
    "guardian"=>$guardian = $_POST['guardian'],
    "grade"=>$grade = $_POST['grade']
);
$objInsert = new Students;
echo $objInsert->insertData($data);

