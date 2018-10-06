<?php

class dbConnection{
    private $servername;
    private $username;
    private $password;
    private $dbname;


    public function connect(){
        $this->servername='localhost';
        $this->username='root';
        $this->password='';
        $this->dbname='msp-voting';

        $conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        

        return $conn;
    }

    public function __destruct(){
        mysqli_close($this->connect());
        echo"connection closed";
    }

    

}

?>