<?php
require_once("connect.php");

class Students extends Connect_server
{
    private $list;
    public function getData()
    {
        $query = "SELECT * FROM estudiantes_col";
        $execute = $this->connectServer->query($query);
        $this->list = $execute->fetchAll(PDO::FETCH_ASSOC);
        return $this->list;
    }
    public function insertData($data)
    {
        $query = "INSERT INTO estudiantes_col (id_estudiante, Nombre_estudiante, Apellido_estud, direccion_est, telefono_est, acudiente, grupo_est)
            VALUES (:numDoc,:name,:lastName,:address,:phone,:guardian,:grade)";
        $execute = $this->connectServer->prepare($query)->execute($data);
        return $execute;
    }
    public function deleteData($numDoc)
    {
        $query = "DELETE FROM estudiantes_col WHERE id_estudiante=:numDoc";
        $execute = $this->connectServer->prepare($query)->execute($numDoc);
        return $execute;
    }
    public function update($data)
    {
        $query = "UPDATE estudiantes_col SET  `Nombre_estudiante`=:Nombre_estudiante,
`Apellido_estud`=:Apellido_estud, `direccion_est`=:direccion_est, `telefono_est`=:telefono_est, `acudiente`=:acudiente, `grupo_est`=:grupo_est
WHERE `id_estudiante`=:id_estudiante";
        $execute = $this->connectServer->prepare($query)->execute($data);
        return $execute;
    }
}
