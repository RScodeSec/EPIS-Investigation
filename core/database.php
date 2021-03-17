<?php

class Conexion{
    public $db;

 public function __construct()
    {
    $host = "localhost";
    $dbname = "biomedictec_docentesepis";
    $username = "root";
    $password = "";
    try {
        $this->db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    } catch (PDOException $th) {
        echo "Error: ". $th->getMessage();
    }

    }
    public function CloseConexion()
    {
        $this->db = null;
    }
}


?>