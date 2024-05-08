<?php
class usuario{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT * FROM usuario ORDER BY nombre";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM usuario WHERE id_usuario = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO usuario(usuario, clave, tipo_usuario) 
                VALUES('$params->usuario','$params->clave','$params->tipo_usuario')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE usuario SET usuario = '$params->usuario', clave = '$params->clave', 
        tipo_usuario = '$params->tipo_usuario' WHERE id_usuario = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT * FROM usuario 
        WHERE u.usuario LIKE '%$valor%' OR u.clave LIKE '%$valor%' OR u.tipo_usuario LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}