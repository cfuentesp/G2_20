<?php
    
    class Articulos extends Conectar{

        public function get_articulos(){
            $conectar = parent::conexion();
            $sql = "SELECT * FROM ma_articulos WHERE estado = 'S'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_articulo($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM ma_articulos WHERE estado = 'S' AND id = $id " ;
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function insert_articulo($id, $descripcion, $unidad, $costo, $precio, $aplica_isv, $porcentaje_isv, $estado, $id_socio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO ma_articulos(id,descripcion,unidad,costo,precio,aplica_isv,porcentaje_isv,estado,id_socio)
            VALUES (?,?,?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $descripcion);
            $sql->bindValue(3, $unidad);
            $sql->bindValue(4, $costo);
            $sql->bindValue(5, $precio);
            $sql->bindValue(6, $aplica_isv);
            $sql->bindValue(7, $porcentaje_isv);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $id_socio);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function update_articulo($id, $descripcion, $unidad, $costo, $precio, $aplica_isv, $porcentaje_isv, $estado, $id_socio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE ma_articulos SET id = ?, descripcion = ?, unidad = ?, costo = ?, precio = ?, aplica_isv = ?, porcentaje_isv = ?, estado = ?, id_socio = ? 
            WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->bindValue(2, $descripcion);
            $sql->bindValue(3, $unidad);
            $sql->bindValue(4, $costo);
            $sql->bindValue(5, $precio);
            $sql->bindValue(6, $aplica_isv);
            $sql->bindValue(7, $porcentaje_isv);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $id_socio);
            $sql->bindValue(10, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function delete_articulo($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM ma_articulos WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
    }
?>