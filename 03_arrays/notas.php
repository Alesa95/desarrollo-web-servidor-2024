<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"]
    ];

    array_push($notas, ["Guillermo", "Diseño de interfaces"]);
    array_push($notas, ["Guillermo", "Despliegue de aplicaciones web"]);
    array_push($notas, ["Guillermo", "Desarrollo web cliente"]);
    array_push($notas, ["Joaquín", "Diseño de interfaces"]);

    unset($notas[1]);
    $notas = array_values($notas);

    for($i = 0; $i < count($notas); $i++) {
        $notas[$i][2] = rand(1,10);
    }

    for($i = 0; $i < count($notas); $i++) {
        $nota = $notas[$i][2];
        if($nota < 5) $notas[$i][3] = "NO APTO";
        else $notas[$i][3] = "APTO";
    }

    $_estudiante = array_column($notas, 0);
    $_asignatura = array_column($notas, 1);
    $_nota = array_column($notas, 2);

    array_multisort($_estudiante, SORT_ASC, 
                    $_nota, SORT_ASC,
                    $_asignatura, SORT_ASC);

    /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * 
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida
     * aleatoriamente entre 1 y 10
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego por
     * nota. Si hay varias filas con el mismo nombre y la misma nota,
     * ordenar por la asignatura alfabéticamente
     * 
     * Ejercicio 6: Mostrarlo todo en una tabla
     */
    ?>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($notas as $nota) {
                echo "<tr>";
                echo "<td>$nota[0]</td>";
                echo "<td>$nota[1]</td>";
                echo "<td>$nota[2]</td>";
                echo "<td>$nota[3]</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br><br>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($notas as $nota) {
                list($estudiante, $asignatura, $puntos, $calificacion) = $nota; ?>
                <tr>
                    <td><?php echo $estudiante ?></td>
                    <td><?php echo $asignatura ?></td>
                    <td><?php echo $puntos ?></td>
                    <td><?php echo $calificacion ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>