<?php
class insumos{
    //atributo
    public $conexion;
    //metodo construcción
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    //metodos
    public function consulta() {
        $con = "SELECT i.*, c.nombre AS categoria, pr.nombre AS proveedor, m.nombre AS marca FROM insumos i
                INNER JOIN categoria c. ON i.fo_categoria = c.id_categoria
                INNER JOIN proveedor pr ON i.fo_proveedor = pr.id_proveedor
                INNER JOIN marca m. ON i.fo_marca = m.id_marca
                ORDER BY i.nombre"; 
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id){
        $del = "DELETE FROM insumos WHERE id_insumos = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido eliminado";
        return $vec;
    }
    public function insertar($params){
        $ins = "INSERT INTO insumos(nombre, fo_categoria, valor_compra, fo_proveedor, fo_marca) 
                VALUES('$params->nombre','$params->fo_categoria','$params->valor_compra','$params->fo_proveedor','$params->fo_marca')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido guardada";
        return $vec;
    }
    public function editar($id,$params){
        $editar = "UPDATE insumos SET nombre = '$params->nombre', fo_categoria = '$params->fo_categoria',
        valor_compra = '$params->valor_compra', fo_proveedor = '$params->fo_proveedor', fo_marca = '$params->fo_marca'
        WHERE id_insumos = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La categoria ha sido editada";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELECT i.*, c.nombre AS categoria, pr.nombre AS proveedor, m.nombre AS marca FROM insumos i
                    INNER JOIN categoria c. ON i.fo_categoria = c.id_categoria
                    INNER JOIN proveedor pr ON i.fo_proveedor = pr.id_proveedor
                    INNER JOIN marca m. ON i.fo_marca = m.id_marca
                    WHERE i.nombre LIKE '%$valor%' OR i.valor_compra LIKE '%$valor%' OR categoria
                    LIKE '%$valor%' OR proveedor LIKE '%$valor%' OR marca LIKE '%$valor%' "; 
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }

}