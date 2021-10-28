<?php
require_once("parameters.php");
class Connect_server{
    public $conn;
    public function __construct(){
        $connString = "mysql:host = " . host . ";dbname=" . base . ";charset=" . charset;
        try {
            $this->conn = new PDO($connString, user, password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->conn = "error de conexion";
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function connect(){
        return $this->conn;
    }
}

