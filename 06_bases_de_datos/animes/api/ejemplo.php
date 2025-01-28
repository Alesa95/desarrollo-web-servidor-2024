<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );    

    $url = "http://localhost/Ejercicios/06_bases_de_datos/animes/api/api_estudios.php";
    $datos = [
        "nombre_estudio" => "Test",
        "ciudad" => "Test",
        "anno_fundacion" => "2000"
    ];

    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos)
        ]
    ];

    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents($url, false, $contexto);
    if($resultado === false) {
        echo "<h1>error</h1>";
    } else {
        echo "<h1>ok!</h1>";
    }

    var_dump($resultado);
?>