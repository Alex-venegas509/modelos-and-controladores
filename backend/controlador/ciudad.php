<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/ciudad.php");

    $control = $_GET['control'];

    $ciudad = new ciudad($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $ciudad->consulta();
        break;
        case 'insertar':
            //$json = file_get_contents('php//input');
            $json = '{"nombre":"Bogota","fo_dpto":"Cundinamarca"}';
            $params = json_decode($json);
            $vec = $ciudad->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $ciudad->eliminar($id);
        break;
        case 'editar':
            //$json = file_get_contents('php//input');
            $json = '{"nombre":"Bogota","fo_dpto":"Cundinamarca"}';
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $ciudad->editar($id, $params);
        break;
        case 'filtro':
            //$json = '{"nombre":"Prueba2"}';
            $dato = $_GET['dato'];
            $vec = $ciudad->filtro($dato);
        break;
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
