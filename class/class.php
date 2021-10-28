<?php
    require_once("connect.php");

    class Students extends Connect_server{
        private $data1=array();
        private $data2=array();
        private $value="";
        private $connect;
        public function __construct(){
            $this->connect = new Connect_server();
            $this->connect =  $this->connect->connect();
        } 
        public function getData(){
            $sql = "SELECT * FROM datos";
            $execute= $this->connect->query($sql);
            while ($response=$execute->fetchAll(PDO::FETCH_ASSOC)){
                $this->data1[]=$response;                
            }
            return $this->data1;
        }
    }
