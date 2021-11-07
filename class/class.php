<?php
    require_once("connect.php");

    class Students extends Connect_server{
        private $list;
        public function getData(){
            $query = "SELECT * FROM datos";
            $execute = $this->connectServer->query($query);
            $this->list = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $this->list;
        }
    }
