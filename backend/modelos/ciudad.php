<?php
class ciudad{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT ci.*, dp.nombre AS dpto FROM ciudad ci
                INNER JOIN dpto dp ON ci.fo_dpto = dp.id_dpto
                ORDER BY ci.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM ciudad WHERE id_ciudad = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La ciudad ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO ciudad(nombre, fo_dpto) VALUES('$params->nombre','$params->fo_dpto')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La ciudad ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE ciudad SET nombre = '$params->nombre', fo_dpto = '$params->fo_dpto' WHERE id_ciudad = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La ciudad ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT ci.*, dp.nombre AS dpto FROM ciudad ci
                    INNER JOIN dpto dp ON ci.fo_dpto = dp.id_dpto
                    WHERE ci.nombre LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}