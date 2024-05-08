<?php
class proveedor{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT pr.*, ci.nombre AS ciudad FROM proveedor pr
                INNER JOIN ciudad ci. ON pr.fo_ciudad = ci.id_ciudad
                ORDER BY pr.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM proveedor WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO proveedor(nit, razon_social, direccion, celular, email, fo_ciudad) 
                VALUES('$params->nit','$params->razon_social','$params->direccion','$params->celular','$params->email',
                '$params->fo_ciudad')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE proveedor SET nit = '$params->nit', razon_social = '$params->razon_social',
        direccion = '$params->direccion', celular = '$params->celular', email = '$params->email', fo_ciudad = '$params->fo_ciudad'
        WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT pr.*, ci.nombre AS ciudad FROM proveedor pr
                    INNER JOIN ciudad ci. ON pr.fo_ciudad = ci.id_ciudad
                    WHERE pr.nit LIKE '%$valor%' OR pr.razon_social LIKE '%$valor%' OR pr.direccion LIKE '%$valor%' OR
                    pr.celular LIKE '%$valor%' OR pr.email LIKE '%$valor%' OR ciudad LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}