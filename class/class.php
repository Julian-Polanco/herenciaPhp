<?php
    require_once("connect.php");

    class Students extends Connect_server{
        private $list=array();
        public function getData(){
            $query = "SELECT * FROM datos";
            $execute = $this->connectServer->query($query);
            while ($response=$execute->fetchAll(PDO::FETCH_ASSOC)){
                $this->list[]=$response;                
            }
            return $this->list;
        }
    }
