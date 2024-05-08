<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/insumos.php");

    $control = $_GET['control'];

    $insumos = new insumos($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $insumos->consulta();
        break;
        case 'insertar':
            //$json = file_get_contents('php//input');
            $json = '{"nombre":"Bogota","fo_dpto":"Cundinamarca"}';
            $params = json_decode($json);
            $vec = $insumos->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $insumos->eliminar($id);
        break;
        case 'editar':
            //$json = file_get_contents('php//input');
            $json = '{"nombre":"Bogota"}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $insumos->editar($id, $params);
        break;
        case 'filtro':
            //$json = '{"nombre":"Prueba2"}';
            $dato = $_GET['dato'];
            $vec = $insumos->filtro($dato);
        break;
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
