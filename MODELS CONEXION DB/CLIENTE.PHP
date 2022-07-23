<?php
    
    class Clientes extends Conectar{
         
        public function get_clientes(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>