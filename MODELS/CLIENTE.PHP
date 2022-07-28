<?php
    
    class Clientes extends Conectar{
         
        public function get_clientes(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function get_cliente($NUMERO_CLIENTE){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente WHERE NUMERO_CLIENTE = ? " ;
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NUMERO_CLIENTE);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
        
        public function insert_cliente($NUMERO_CLIENTE, $NOMBRE, $APELLIDOS, $FECHA_REGISTRO, $DIRECCION_CLIENTE, $RTN, $EMAIL){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO cliente(NUMERO_CLIENTE, NOMBRE, APELLIDOS, FECHA_REGISTRO, DIRECCION_CLIENTE, RTN, EMAIL)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NUMERO_CLIENTE);
            $sql->bindValue(2,$NOMBRE);
            $sql->bindValue(3,$APELLIDOS);
            $sql->bindValue(4,$FECHA_REGISTRO);
            $sql->bindValue(5,$DIRECCION_CLIENTE);
            $sql->bindValue(6,$RTN);
            $sql->bindValue(7,$EMAIL);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($NOMBRE, $APELLIDOS, $FECHA_REGISTRO, $DIRECCION_CLIENTE, $RTN, $EMAIL, $NUMERO_CLIENTE){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE cliente SET NOMBRE = ?, APELLIDOS = ?, FECHA_REGISTRO = ?, DIRECCION_CLIENTE = ?, RTN = ?, EMAIL = ?
            WHERE NUMERO_CLIENTE = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NOMBRE);
            $sql->bindValue(2,$APELLIDOS);
            $sql->bindValue(3,$FECHA_REGISTRO);
            $sql->bindValue(4,$DIRECCION_CLIENTE);
            $sql->bindValue(5,$RTN);
            $sql->bindValue(6,$EMAIL);
            $sql->bindValue(7,$NUMERO_CLIENTE);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }  
        
        public function delete_cliente($NUMERO_CLIENTE){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="DELETE  FROM cliente WHERE NUMERO_CLIENTE = ? " ;
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NUMERO_CLIENTE);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>