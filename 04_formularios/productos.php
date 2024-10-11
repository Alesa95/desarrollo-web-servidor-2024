<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php

    $productos = [
        ["Nintendo Switch", 300],
        ["Playstation 5 Slim", 450],
        ["Playstation 5 Pro", 800],
        ["XBOX Series S", 300],
        ["XBOX Series X", 400]
    ];

    for($i = 0; $i < count($productos); $i++) {
        $productos[$i][2] = rand(0,5);
    }

    /**
     * Añadir al array una tercera columna que será el stock, y se generará
     * con un rand entre 0 y 5
     * 
     * Mostrar en una tabla cada producto junto a su precio y su stock
     * 
     * Crear un formulario donde se introduzca el nombre de un producto, y:
     * 
     * - Si hay stock, decimos que está disponible y su precio
     * - Si no hay, decimos que está agotado
     */
    ?>

    <table>
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto) {
                list($nombre_producto, $precio, $cantidad) = $producto; ?>
                <tr>
                    <td><?php echo $nombre_producto ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $cantidad ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <form action="" method="post">
        <label for="producto">Nombre del producto</label>
        <input type="text" name="producto" id="producto">
        <input type="submit" value="Comprobar stock">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $producto = $_POST["producto"];

        $i = 0;
        $fila_producto = null;
        $encontrado = false;
        while($i < count($productos) && !$encontrado) {
            if($productos[$i][0] == $producto) {
                $encontrado = true;
                $fila_producto = $i;
            }
            $i++;
        }
        if($encontrado && $productos[$fila_producto][2] > 0) {
            echo "<p>Tenemos " . $productos[$fila_producto][2] . " unidades de " . 
                $producto . " en stock</p>";
        } elseif($encontrado && $productos[$fila_producto][2] == 0) {
            echo "<p>No tenemos stock del producto $producto</p>";
        } else {
            echo "<p>El producto $producto no existe</p>";
        }
    }
    ?>
</body>
</html>