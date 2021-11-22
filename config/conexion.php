<?php

class Conectar{
    protected $dbh;

    protected function Conexion(){
        try{
            $conectar = $this->dbh = new PDO("mysql:host=34.68.196.220;dbname=G2_20","G2_20","KNptsf7k");
            return $conectar;
        } catch (Exeption $e) {
            print "!Error BD!: " . $e->getMessage() . "<br/>";
            die(); 
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>