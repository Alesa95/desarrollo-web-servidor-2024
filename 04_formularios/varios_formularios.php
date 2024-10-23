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
            /*
            if($tmp_base != '') {
                if(filter_var($tmp_base, FILTER_VALIDATE_INT) !== FALSE) {
                    if($tmp_base >= 0) {
                        $base = $tmp_base;
                    } else {
                        echo "<p>La base debe ser mayor que 0</p>";
                    }
                } else {
                    echo "<p>La base debe ser un número entero</p>";
                }
            } else {
                echo "<p>La base es obligatoria</p>";
            }
            */

            if($tmp_base == '') {
                echo "<p>La base es obligatoria</p>";
            } else {
                if(filter_var($tmp_base, FILTER_VALIDATE_INT) === FALSE) {
                    echo "<p>La base debe ser un número entero</p>";
                } else {
                    if($tmp_base < 0) {
                        echo "<p>La base debe ser mayor que 0</p>";
                    } else {
                        $base = $tmp_base;
                    }
                }
            }

            //  Validación del exponente
            /*
            if($tmp_exponente != '') {
                if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) !== FALSE) {
                    if($tmp_exponente >= 0) {
                        $exponente = $tmp_exponente;
                    } else {
                        echo "<p>El exponente debe ser mayor que 0</p>";
                    }
                } else {
                    echo "<p>El exponente debe ser un número entero</p>";
                }
            } else {
                echo "<p>El exponente es obligatorio</p>";
            }
            */

            if($tmp_exponente == '') {
                echo "<p>El exponente es obligatorio</p>";
            } else {
                if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE) {
                    echo "<p>El exponente debe ser un número entero</p>";
                } else {
                    if($tmp_exponente < 0) {
                        echo "<p>El exponente debe ser mayor que 0</p>";
                    } else {
                        $exponente = $tmp_exponente;
                    }
                }
            }            

            if(isset($base) && isset($exponente)) {
                $resultado = calcularPotencia($base, $exponente);
                echo "<h1>$resultado</h1>";
            }
        }
    }
    ?>
</body>
</html>