<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 24", "Deporte", 70],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Knight", "Plataformas", 30]
    ];

    foreach($videojuegos as $videojuego) {
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<p>$titulo, $categoria, $precio</p>";
    }
    ?>

    <?php
        $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
        array_push($videojuegos, $nuevo_videojuego);

        $_titulo = array_column($videojuegos, 0);
        array_multisort($_titulo, SORT_DESC, $videojuegos);
        # SORT_ASC para orden ascendiente
        # SORT_DESC para orden descendiente

        # Ej rapido 1: Ordenar por el precio de mas barato a mas caro
        $_precio = array_column($videojuegos, 2);
        array_multisort($_precio, SORT_ASC, $videojuegos);
        # Ej rapido 2: Ordenar por la categoria en orden alfabetico inverso
        $_categoria = array_column($videojuegos, 1);
        array_multisort($_categoria, SORT_DESC, $videojuegos);
    ?>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>