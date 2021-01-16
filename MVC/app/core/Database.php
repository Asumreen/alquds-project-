<?php

class Database
{

    private $username, $dbname, $password, $host;
    public $connect;
    public  function __construct()
    {
        $this->username = "root";
        $this->dbname = "alquds";
        $this->password = "";
        $this->host = "localhost";
    }

    public function ConnectToDataBase()
    {
        $this->connect =  new mysqli($this->host, $this->username,$this->password,$this->dbname);
        return $this->connect;
    }

    
    public function DisconnectDataBase()
    {
        $this->connect->close();
    }


}
?>
