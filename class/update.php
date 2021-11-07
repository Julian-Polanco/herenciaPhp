<?php
require_once("class.php");
$data=array(
    "Nombre_estudiante"=>$Nombre_estudiante = $_POST['Nombre_estudiante'],
    "Apellido_estud"=>$Apellido_estud = $_POST['Apellido_estud'],
    "direccion_est"=>$direccion_est = $_POST['direccion_est'],
    "telefono_est"=>$telefono_est = $_POST['telefono_est'],
    "acudiente"=>$acudiente = $_POST['acudiente'],
    "grupo_est"=>$grupo_est = $_POST['grupo_est'],
    "id_estudiante"=>$id_estudiante = $_POST['id_estudiante'],
);
$objUpdate = new Students;
echo $objUpdate->update($data);