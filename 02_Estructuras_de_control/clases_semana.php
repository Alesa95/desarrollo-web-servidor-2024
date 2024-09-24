<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la semana</title>
</head>
<body>
    <?php
    $dia = date("l");
    echo "<h1>Hoy es $dia</h1>";

    /*
        HACER UN SWITCH QUE MUESTRE POR PANTALLA SI HOY HAY CLASES
        DE WEB SERVIDOR

        Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday
    */

    #   Forma 1 de hacerlo
    /*
    switch($dia) {
        case "Monday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
        case "Tuesday":
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Wednesday":
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Thursday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
        case "Friday": 
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Saturday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
        case "Sunday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
    }
    */

    #   Forma 2 de hacerlo
    /*
    switch($dia) {
        case "Monday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
        case "Tuesday":
        case "Wednesday":
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Thursday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
        case "Friday": 
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Saturday":
        case "Sunday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
    }
    */

    #   Forma 3 de hacerlo
    /*
    switch($dia) {
        case "Tuesday":
        case "Wednesday":
        case "Friday": 
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        case "Monday":
        case "Thursday":
        case "Saturday":
        case "Sunday":
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
    }
    */

    #   Forma 4 de hacerlo
    
    /*
    switch($dia) {
        case "Tuesday":
        case "Wednesday":
        case "Friday": 
            echo "<p>Hoy $dia sí hay clases de web servidor</p>";
            break;
        default:
            echo "<p>Hoy $dia no hay clases de web servidor</p>";
            break;
    }
    */

    /*
        1 - CREAR UN SWITCH QUE SEGÚN EL DÍA EN QUE ESTEMOS, ALMACENE EN
            UNA VARIABLE EL DÍA EN ESPAÑOL

        2 - REESCRIBIR EL SWITCH DE LA ASIGNATURA CON LOS DÍAS EN 
            ESPAÑOL
    */

    $dia_espanol = null;

    switch($dia) {
        case "Monday":
            $dia_espanol = "Lunes";
            break;
        case "Tuesday":
            $dia_espanol = "Martes";
            break;
        case "Wednesday":
            $dia_espanol = "Miércoles";
            break;
        case "Thursday":
            $dia_espanol = "Jueves";
            break;
        case "Friday":
            $dia_espanol = "Viernes";
            break;
        case "Saturday":
            $dia_espanol = "Sábado";
            break;
        case "Sunday":
            $dia_espanol = "Domingo";
            break;
    }

    /*
    switch($dia_espanol) {
        case "Martes":
        case "Miércoles":
        case "Viernes":
            echo "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>";
            break;
        default:
            echo "<p>Hoy $dia_espanol no tenemos clase de web servidor</p>";
        }
    */

    //  ESTRUCTURA MATCH PHP >= 8.0

    /*
    $resultado = match($dia_espanol) {
        "Martes" => "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>",
        "Miércoles" => "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>",
        "Viernes" => "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>",
        default => "<p>Hoy $dia_espanol no tenemos clase de web servidor</p>"
    };
    */

    $resultado = match($dia_espanol) {
        "Martes",
        "Miércoles",
        "Jueves" => "<p>Hoy $dia_espanol sí tenemos clase de web servidor</p>",
        default => "<p>Hoy $dia_espanol no tenemos clase de web servidor</p>"
    };

    echo $resultado;
    ?>
</body>
</html>