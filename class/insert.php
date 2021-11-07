<?php
require_once("class.php");
$numDoc = $_POST['numDoc'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$guardian = $_POST['guardian'];
$grade = $_POST['grade'];
$data=array(
    "numDoc"=>$numDoc,
    "name"=>$name,
    "lastName"=>$lastName,
    "address"=>$address,
    "phone"=>$phone,
    "guardian"=>$guardian,
    "grade"=>$grade,
);
$objInsert = new Students;
echo $objInsert->insertData($data);

