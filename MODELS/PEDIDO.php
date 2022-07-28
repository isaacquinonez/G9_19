<?php

    class Pedidos extends Conectar{


        public function get_pedidos(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM pedido";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function get_pedido($numeropedido){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM pedido WHERE NUMERO_PEDIDO = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numeropedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function insert_pedido($numeropedido, $numerocliente, $empresa, $fechapedido, $direccion, $tipodepago, $montototal){
            $conectar= parent::Conexion();
            parent::set_names();
   
            $sql="INSERT INTO pedido(NUMERO_PEDIDO,NUMERO_CLIENTE,EMPRESA,FECHA_PEDIDO,DIRECCION,TIPO_DE_PAGO,MONTO_TOTAL)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numeropedido);
            $sql->bindValue(2, $numerocliente);
            $sql->bindValue(3, $empresa);
            $sql->bindValue(4, $fechapedido);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $tipodepago);
            $sql->bindValue(7, $montototal);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
        public function update_pedido( $numerocliente, $empresa, $fechapedido, $direccion, $tipodepago, $montototal,$numeropedido){
            $conectar= parent::Conexion();
            parent::set_names();
   
            $sql="UPDATE pedido SET NUMERO_CLIENTE = ?, EMPRESA = ? ,FECHA_PEDIDO = ? ,DIRECCION = ? ,TIPO_DE_PAGO = ? ,MONTO_TOTAL = ? WHERE NUMERO_PEDIDO = ?";
          
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numerocliente);
            $sql->bindValue(2, $empresa);
            $sql->bindValue(3, $fechapedido);
            $sql->bindValue(4, $direccion);
            $sql->bindValue(5, $tipodepago);
            $sql->bindValue(6, $montototal);
            $sql->bindValue(7, $numeropedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);



            }

            public function delete_pedido($numeropedido){
                $conectar= parent::Conexion();
                parent::set_names();
       
                $sql="DELETE FROM pedido WHERE NUMERO_PEDIDO = ?";
              
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $numeropedido); 
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    
    
    
                }
    

    }

    ?>