<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    # Origen, Destino, Duración (min), Precio (€)
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];

    /**
     * Ejercicio 1: Añadir dos líneas de autobús
     * 
     * Ejercicio 2: Ordenar por duración de más duración a menos
     * 
     * Ejercicio 3: Mostrar las líneas en una tabla
     */

    # Ejercicio 1
    $nuevo_autobus = ["Málaga", "Córdoba", 120, 18];
    array_push($autobuses, $nuevo_autobus);

    array_push($autobuses, ["Málaga", "Barcelona", 885, 28]);

    # Ejercicio 2
    $_duracion = array_column($autobuses, 2);
    array_multisort($_duracion, SORT_DESC, $autobuses);

    # Ejercicio 3 (ver tabla)

    $_origen = array_column($autobuses, 0);
    $_duracion = array_column($autobuses, 2);
    $_precio = array_column($autobuses, 3);
    array_multisort($_origen, SORT_ASC, $_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);

    //unset($autobuses[1]);
    //unset($autobuses[5]);
    
    /**
     * Ejercicio 4: Insertar 3 autobuses más
     * 
     * Ejercicio 5: Ordenar, primero por el origen, luego por el destino
     * 
     * Ejercicio 6: Ordenar, primero por la duración, luego por el precio
     */

    # Ejercicio 4
    //array_push($autobuses, ["Alhaurín de la Torre", "Málaga", 20, 5]);
    //array_push($autobuses, ["Torremolinos", "Benalmádena", 20, 2.5]);

    $_origen = array_column($autobuses, 0);
    $_destino = array_column($autobuses, 1);
    $_duracion = array_column($autobuses, 2);
    $_precio = array_column($autobuses, 3);

    # Ejercicio 5
    //array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC, $autobuses);

    # Ejercicio 6
    //array_multisort($_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);
    ?>
    <table>
        <thead>
            <tr>
               <th>Origen</th>
               <th>Destino</th>
               <th>Duración (min)</th>
               <th>Precio (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus) { 
                list($origen, $destino, $duracion, $precio) = $autobus; ?>
                <tr>
                    <td><?php echo $origen ?></td>
                    <td><?php echo $destino ?></td>
                    <td><?php echo $duracion ?></td>
                    <td><?php echo $precio ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    for($i = 0; $i < count($autobuses); $i++) {
        //$autobuses[$i][4] = "X";
        if($autobuses[$i][2] <= 30) {
            $autobuses[$i][4] = "Corta distancia";
        } elseif($autobuses[$i][2] > 30 && $autobuses[$i][2] <= 120){
            $autobuses[$i][4] = "Media distancia";
        } elseif($autobuses[$i][2] > 120) {
            $autobuses[$i][4] = "Larga distancia";
        }
    }
    /**
     * Si duracion <= 30 ENTONCES = Corta distancia
     * Si duracion > 30 && <= 120 ENTONCES = Media distancia
     * Si duración > 120 ENTONCES = Larga distancia
     */

    ?>
    <br><br><br>
    <table>
        <caption>Líneas de autobuses</caption>
        <thead>
            <tr>
               <th>Origen</th>
               <th>Destino</th>
               <th>Duración (min)</th>
               <th>Precio (€)</th>
               <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus) { 
                list($origen, $destino, $duracion, $precio, $tipo) = $autobus; ?>
                <tr>
                    <td><?php echo $origen ?></td>
                    <td><?php echo $destino ?></td>
                    <td><?php echo $duracion ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $tipo ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>