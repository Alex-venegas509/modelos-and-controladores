<?php
class mantenimiento{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT ma.*, i.nombre AS insumos, cli.nombre AS cliente, u.nombre AS usuario FROM mantenimiento ma
                INNER JOIN insumos i. ON ma.fo_insumos = i.id_insumos
                INNER JOIN cliente cli. ON ma.fo_cliente = cli.id_cliente
                INNER JOIN usuario u. ON ma.fo_usuario = u.id_usuario
                ORDER BY ma.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM mantenimiento WHERE id_mantenimiento = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO mantenimiento(fo_insumos, cantidad, fo_cliente, subtotal, iva, total, fo_usuario) 
                VALUES('$params->fo_insumos','$params->cantidad','$params->fo_cliente','$params->subtotal','$params->iva',
                '$params->total','$params->fo_usuario')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE mantenimiento SET fo_insumos = '$params->fo_insumos', cantidad = '$params->cantidad',
        fo_cliente = '$params->fo_cliente', subtotal = '$params->subtotal', iva = '$params->iva', total = '$params->total'
        fo_usuario = '$params->fo_usuario'
        WHERE id_mantenimiento = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT ma.*, i.nombre AS insumos, cli.nombre AS cliente, u.nombre AS usuario FROM mantenimiento ma
                    INNER JOIN insumos i. ON ma.fo_insumos = i.id_insumos
                    INNER JOIN cliente cli. ON ma.fo_cliente = cli.id_cliente
                    INNER JOIN usuario u. ON ma.fo_usuario = u.id_usuario
                    WHERE ma.cantidad LIKE '%$valor%' OR ma.subtotal LIKE '%$valor%' OR ma.iva LIKE '%$valor%' OR
                    ma.total LIKE '%$valor%' OR insumos LIKE '%$valor%' OR cliente LIKE '%$valor%' OR usuario LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}