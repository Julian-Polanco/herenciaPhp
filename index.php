<?php
require_once("class/class.php");
    $objStudents = new Students;
    $students=$objStudents->getData();
    print_r($students);
    