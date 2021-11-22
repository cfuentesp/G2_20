<?php

     class Pedidos extends Conectar{

        public function get_pedidos(){
             $conectar = parent::conexion();
             $sql = "SELECT * FROM ma_pedidos";
             $sql = $conectar->prepare($sql);
             $sql->execute();
             return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_uno($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM ma_pedidos WHERE id_pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_pedidos($id_socio,$fecha_pedido,$detalle,$sub_total,$total_isv,$total,$fecha_entrega,$estado){
            $conectar = parent::conexion();
            parent::set_names();
            $sql= "INSERT INTO ma_pedidos(id_socio,fecha_pedido,detalle,sub_total,total_isv,total,fecha_entrega,estado)
            VALUES (?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_socio);
            $sql->bindValue(2, $fecha_pedido);
            $sql->bindValue(3, $detalle);
            $sql->bindValue(4, $sub_total);
            $sql->bindValue(5, $total_isv);
            $sql->bindValue(6, $total);
            $sql->bindValue(7, $fecha_entrega);
            $sql->bindValue(8, $estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_pedidos($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM ma_pedidos
                    where id_pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_pedidos($id,$id_socio,$fecha_pedido,$detalle,$sub_total,$total_isv,$total,$fecha_entrega,$estado){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE ma_pedidos 
                    SET id_pedido = ?, id_socio = ?, fecha_pedido = ?, detalle = ?, sub_total = ?, total_isv = ?, total = ?, fecha_entrega = ?, estado = ?
                    WHERE id_pedido = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $id_socio);
            $sql->bindValue(3, $fecha_pedido);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $sub_total);
            $sql->bindValue(6, $total_isv);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fecha_entrega);
            $sql->bindValue(9, $estado);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


        
     }
?>     