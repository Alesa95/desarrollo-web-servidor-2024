<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../05_funciones/edades.php');
        require('../05_funciones/potencias.php');
    ?>
</head>
<body>
    <h1>Formulario edad</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <input type="text" name="edad" placeholder="Edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edad">
        <input type="submit" value="Comprobar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["accion"] == "formulario_edad") {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            comprobarEdad($nombre, $edad);
        }
    }
    ?>
    <br><br>
    <h1>Formulario potencia</h1>
    <form action="" method="post">
        <input type="text" name="base" placeholder="Base"><br><br>
        <input type="text" name="exponente" placeholder="Exponente"><br><br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["accion"] == "formulario_potencia") {
            $tmp_base = $_POST["base"];
            $tmp_exponente = $_POST["exponente"];  

            //  Validación de la base
            if($tmp_base != '') {
                if(is_numeric($tmp_base)) {
                    if($tmp_base > 0) {
                        $base = $tmp_base;
                    } else {
                        echo "<p>La base debe ser mayor que 0</p>";
                    }
                } else {
                    echo "<p>La base debe ser un número</p>";
                }
            } else {
                echo "<p>La base es obligatoria</p>";
            }

            //  Validación del exponente
            if($tmp_exponente != '') {
                if(is_numeric($tmp_exponente)) {
                    if($tmp_exponente > 0) {
                        $exponente = $tmp_exponente;
                    } else {
                        echo "<p><El exponente debe ser mayor que 0</p>";
                    }
                } else {
                    echo "<p>El exponente debe ser un número</p>";
                }
            } else {
                echo "<p>El exponente es obligatorio</p>";
            }            

            if(isset($base) && isset($exponente)) {
                $resultado = calcularPotencia($base, $exponente);
            }
        }
    }
    ?>
</body>
</html>