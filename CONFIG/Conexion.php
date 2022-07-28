<?php
    class Conectar {
       protected $dbh;

        protected function Conexion() {
            try{
               $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g9_19","G9_19","aSn2e4ri");
               return $conectar;
            } catch(Exception $e) {
               print "Error BD!: " . $e->getMessage() . "<br/>";
               die();
            }
        }
        public function set_names(){
           return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>



