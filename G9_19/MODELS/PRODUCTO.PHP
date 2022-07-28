<?php
    
    class PRODUCTOS extends Conectar{
         
       

        public function GET_PRODUCTOS(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM PRODUCTO";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
        public function GET_PRODUCTO($Numero_de_Pedido){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM PRODUCTO WHERE Numero_de_Pedido=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_de_Pedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function INSERT_PRODUCTO($Numero_de_Pedido, $Nombre_de_Articulo, $Precio_Unitario, $Fecha_de_Pedido, $Cantidad_de_Articulo, $Monto_Total ,$Aplicar_Impuesto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO PRODUCTO(Numero_de_Pedido, Nombre_de_Articulo, Precio_Unitario, Fecha_de_Pedido, Cantidad_de_Articulo,Monto_total, Aplicar_Impuesto)
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_de_Pedido);
            $sql->bindValue(2, $Nombre_de_Articulo);
            $sql->bindValue(3, $Precio_Unitario);
            $sql->bindValue(4, $Fecha_de_Pedido);
            $sql->bindValue(5, $Cantidad_de_Articulo);
            $sql->bindValue(6, $Monto_Total);  
            $sql->bindValue(7, $Aplicar_Impuesto);            
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateproducto($Nombre_de_Articulo, $Precio_Unitario, $Fecha_de_Pedido, $Cantidad_de_Articulo, $Monto_Total,$Aplicar_Impuesto, $Numero_de_Pedido){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE PRODUCTO SET Nombre_de_Articulo= ?,  Precio_Unitario= ?, Fecha_de_Pedido = ?, Cantidad_de_Articulo = ?, Monto_Total= ?,Aplicar_Impuesto  = ?
            WHERE  Numero_de_Pedido = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Nombre_de_Articulo);
            $sql->bindValue(2,$Precio_Unitario);
            $sql->bindValue(3,$Fecha_de_Pedido);
            $sql->bindValue(4,$Cantidad_de_Articulo);
            $sql->bindValue(5,$Monto_Total);
            $sql->bindValue(6,$Aplicar_Impuesto);
            $sql->bindValue(7,$Numero_de_Pedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }  

        public function DeleteProducto($Numero_de_Pedido){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="DELETE  FROM PRODUCTO WHERE Numero_de_Pedido = ?" ;
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$Numero_de_Pedido);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>

