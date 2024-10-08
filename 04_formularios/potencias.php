<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
    <!--
        CREAR UN FORMULARIO QUE RECIBA DOS NÚMEROS: BASE Y EXPONENTE

        SE MOSTRARÁ EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE

        EJEMPLOS:

        2 ELEVADO A 3 = 8 -> 2 x 2 x 2
        3 ELEVADO A 2 = 9 -> 3 x 3
        2 ELEVADO A 1 = 2
        2 ELEVADO A 0 = 1
    -->

    <form action="" method="post">
        <input type="text" name="base"><br><br>
        <input type="text" name="exponente"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = (int)$_POST["base"];
        $exponente = (int)$_POST["exponente"];
        $resultado = 1;

        for($i = 0; $i < $exponente; $i++) {
            $resultado = $resultado * $base;
        }
        echo "<h1>El resultado de elevar $base a $exponente es $resultado</h1>";
        /**
         * 2 elevado a 3
         * 
         * - 1º iteracion: resultado = 1 * 2 = 2
         * - 2º iteracion: resultado = 2 * 2 = 4
         * - 3º iteracion: resultado = 4 * 2 = 8
         */
    }
    ?>
</body>
</html>