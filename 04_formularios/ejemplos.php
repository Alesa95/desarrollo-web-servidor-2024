<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
</head>
<body>
    <?php
    /**
     *  SINGLE PAGE FORM -> TODA LA INFORMACIÓN SE PROCESA EN LA MISMA PÁGINA
     * 
     *  MULTI PAGE FORM -> REENVÍAN A OTRA PÁGINA
     */
    ?>

    <form action="" method="post">
        <input type="text" name="mensaje"><br><br>
        <input type="text" name="veces"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        /**
         * El servidor ejecutará este bloque de código cuando reciba
         * una petición a través del método POST
         */
        $mensaje = $_POST["mensaje"];
        $veces = (int)$_POST["veces"];

        for($i = 0; $i < $veces; $i++) {
            echo "<h1>$mensaje</h1>";
        }
        /**
         *  Modificar el formulario anterior para que se pueda introducir
         *  también un número
         * 
         *  El mensaje se mostrará tantas veces como indique el número
         */
    }
    ?>
</body>
</html>