<?php
    
    class pagos extends Conectar{
         
        public function get_pagos(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM G9_19.PAGO";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>