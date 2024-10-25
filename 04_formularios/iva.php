<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <?php
    //  Activamos los errores de PHP
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05_funciones/iva.php');
    ?>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_precio = $_POST["precio"];
        $tmp_iva = $_POST["iva"];

        if($tmp_precio == '') {
            $err_precio = "El precio es obligatorio";
        } else {
            if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_precio = "El precio debe ser un número";
            } else {
                if($tmp_precio < 0) {
                    $err_precio = "El precio no puede ser un número negativo";
                } else {
                    $precio = $tmp_precio;
                }
            }
        }

        if($tmp_iva == '') {
            $err_iva = "El tipo de IVA es obligatorio";
        }

    }
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>" ?>
        <br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <?php if(isset($err_iva)) echo "<span class='error'>$err_iva</span>" ?>
        <br><br>
        <input type="submit" value="Calcular PVP">
    </form>
</body>
</html>