<?php
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "animes_bd";

    try {
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_base_de_datos",
            $_usuario,$_contrasena);
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Conexión fallida: " . $e -> getMessage());
    }
?>