<?php
class marca{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT * FROM marca ORDER BY nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM marca WHERE id_marca = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO marca(nombre) VALUES('$params->nombre')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE marca SET nombre = '$params->nombre' WHERE id_marca = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT * FROM marca WHERE nombre LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}