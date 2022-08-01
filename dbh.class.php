<?php
Class Dbh{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "products_list";

    protected function connect(){
        $con = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        return $con;
    }

}

