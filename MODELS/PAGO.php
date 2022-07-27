<?php
    
    class PAGOS extends Conectar{
         
        public function get_pagos(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM PAGO";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }


        public function get_pago($NUMERO_DE_PAGO){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM PAGO WHERE NUMERO_DE_PAGO=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_DE_PAGO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }


        public function insert_pago($NUMERO_DE_PAGO, $FECHA_DE_PAGO, $MONTO_DE_PAGO, $TIPO_DE_PAGO, $NUMERO_DE_PEDIDO, $EMPRESA){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO PAGO(NUMERO_DE_PAGO,FECHA_DE_PAGO,MONTO_DE_PAGO,TIPO_DE_PAGO,NUMERO_DE_PEDIDO,EMPRESA)
            VALUES(?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_DE_PAGO);
            $sql->bindValue(2, $FECHA_DE_PAGO);
            $sql->bindValue(3, $MONTO_DE_PAGO);
            $sql->bindValue(4, $TIPO_DE_PAGO);
            $sql->bindValue(5, $NUMERO_DE_PEDIDO);
            $sql->bindValue(6, $EMPRESA);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


    }
    
    

?>