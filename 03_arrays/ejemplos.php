<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    );

    //echo $frutas["clave 4"];
    //echo "<br>";

    $numeros1 = [1,2,3,4,5];
    $numeros2 = ["1","2","3","4","5"];

    if($numeros1 === $numeros2) {
        echo "<h3>Los arrays de números son iguales</h3>";
    } else {
        echo "<h3>Los arrays de números NO iguales</h3>";
    }

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    $frutas1 = [
        "Cereza",
        "Naranja",
        "Manzana",
    ];

    $frutas2 = [
        0 => "Naranja",
        1 => "Manzana",
        2 => "Cereza"
    ];

    $frutas3 = [
        1 => "Manzana",
        0 => "Naranja",
        2 => "Cereza"
    ];

    if($frutas3 == $frutas2) {
        echo "<h3>Los arrays son iguales</h3>";
    } else {
        echo "<h3>Los arrays no son iguales</h3>";
    }

    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
    for($i = 0; $i < count($frutas); $i++) {    //  3N
        echo "<li>" . $frutas[$i] . "</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while($i < count($frutas)) {
        echo "<li>" . $frutas[$i] . "</li>";    //  3N
        $i++;
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH con claves</h3>";
    echo "<ol>";
    foreach($frutas as $clave => $fruta) {
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    //echo $frutas[1];
    $frutas = array_values($frutas);

    unset($frutas[1]);

    //print_r($frutas);

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */

    $personas = [
        "11223344F" => "José Alonso",
        "22331133G" => "Enya García",
        "44332211R" => "Fulgencio Hermenegildo"
    ];

    $personas["99112233G"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'");

    unset($personas[0]);

    echo "<ul>";
    foreach($personas as $dni => $nombre) {
        echo "<li>$dni, $nombre</li>";
    }
    echo "</ul>";

    //echo "<p>" . $personas["22331133G"] . "</p>";

    $tamano = count($personas);
    echo "<h3>$tamano</h3>";


    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td>";
                echo "<td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br><br><br>
    <h1>Tabla buena</h1>
    <?php
    $personas["00112211A"] = "Paquito de la Torre";
    $personas["22110044B"] = "Paco Fiesta";
    //sort($personas);
    //rsort($personas);
    //asort($personas);
    //arsort($personas);
    //ksort($personas);
    krsort($personas);
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personas as $dni => $nombre) { ?>
                <tr>
                    <td><?php echo $dni ?></td>
                    <td><?php echo $nombre ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!--
                Desarrollo web servidor => Alejandra
                Desarrollo web cliente => Jaime
                Diseño de interfaces => José
                Despliegue de aplicaciones web => Alejandro
                Empresa e inciativa emprendedora => Gloria
                Inglés => Virginia

                MOSTRAR EN UNA TABLA LAS ASIGNATURAS Y SUS RESPECTIVOS PROFESORES

                LUEGO:

                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABETICO

                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN
                ALFABETICO INVERSO
    -->
</body>
</html>