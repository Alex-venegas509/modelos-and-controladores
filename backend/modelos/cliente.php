<?php
class cliente{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT cli.*, ci.nombre AS ciudad FROM cliente cli
                INNER JOIN ciudad ci. ON cli.fo_ciudad = ci.id_ciudad
                ORDER BY cli.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM cliente WHERE id_cliente = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El cliente ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO cliente(identificacion, nombre, direccion, celular, email, fo_ciudad) VALUES($params->identificacion,'$params->nombre','$params->direccion'$params->celular,'$params->email','$params->fo_ciudad')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El cliente ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE cliente SET identificacion = '$params->identificacion', nombre = '$params->nombre', direccion = '$params->direccion', celular = '$params->celular', email = '$params->email', fo_ciudad = '$params->fo_ciudad' WHERE id_cliente = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El cliente ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT cli.*, ci.nombre AS ciudad FROM cliente cli
                    INNER JOIN ciudad ci. ON cli.fo_ciudad = ci.id_ciudad
                    WHERE cli.identificacion LIKE '%$valor%' OR cli.nombre LIKE '%$valor%' OR cli.direccion LIKE '%$valor%' OR
                    cli.celular LIKE '%$valor%' OR cli.email LIKE '%$valor%' OR ciudad LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}