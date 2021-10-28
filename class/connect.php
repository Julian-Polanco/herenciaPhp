<?php
require_once("parameters.php");
class Connect_server{
    public $connectServer;
    public function __construct(){
        $connString = "mysql:host = " . host . ";dbname=" . base . ";charset=" . charset;
        try {
            $this->connectServer = new PDO($connString, user, password);
            $this->connectServer->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function connect(){
        return $this->connectServer;
    }
}

