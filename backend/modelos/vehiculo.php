<?php
class vehiculo{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT v.*, m.nombre AS marca, ma.nombre AS mantenimiento FROM vehiculo v
                INNER JOIN marca m. ON v.fo_marca = m.id_marca
                INNER JOIN mantenimiento ma. ON v.fo_mantenimiento = ma.id_mantenimiento
                ORDER BY v.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM vehiculo WHERE id_vehiculo = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO vehiculo(nombre, modelo, cilindraje, numero_placa, fo_marca, fo_mantenimiento) 
                VALUES('$params->nombre','$params->modelo','$params->cilindraje','$params->numero_placa',
                '$params->fo_marca','$params->fo_mantenimiento')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE vehiculo SET nombre = '$params->nombre', modelo = '$params->modelo',
        cilindraje = '$params->cilindraje', numero_placa = '$params->numero_placa', fo_marca = '$params->fo_marca', 
        fo_mantenimiento = '$params->fo_mantenimiento' WHERE id_vehiculo = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT v.*, m.nombre AS marca, ma.nombre AS mantenimiento FROM vehiculo v
                    INNER JOIN marca m. ON v.fo_marca = m.id_marca
                    INNER JOIN mantenimiento ma. ON v.fo_mantenimiento = ma.id_mantenimiento
                    WHERE v.nombre LIKE '%$valor%' OR v.modelo LIKE '%$valor%' OR v.cilindraje LIKE '%$valor%' OR
                    v.numero_placa LIKE '%$valor%' OR marca LIKE '%$valor%' OR mantenimiento LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}