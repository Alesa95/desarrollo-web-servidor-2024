<?php
    /*
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    */

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    function manejarGet($_conexion) {
        echo json_encode(["metodo" => "get"]);
    }

    function manejarPost($_conexion, $entrada) {
        echo json_encode(["metodo" => "post"]);
    }

    function manejarPut($_conexion, $entrada) {
        echo json_encode(["metodo" => "put"]);
    }

    function manejarDelete($_conexion, $entrada) {
        echo json_encode(["metodo" => "delete"]);
    }
?>