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
    ?>
</body>
</html>