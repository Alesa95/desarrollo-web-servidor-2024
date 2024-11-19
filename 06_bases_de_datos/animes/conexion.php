<?php
    $_servidor = "localhost"; // ó "127.0.0.1" (loopback)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "animes_bd";

    //  Tenemos dos opciones de librerías para crear una conexion con BBDD
    //  Mysqli (más simple) ó PDO (más completa)
    $_conexion = new Mysqli($_servidor,$_usuario,$_contrasena,$_base_de_datos)
        or die("Error de conexión");
?>