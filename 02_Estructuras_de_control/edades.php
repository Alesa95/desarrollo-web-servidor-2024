<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php
    $edad = rand(-10,140);

    /*
        CON IF Y CON MATCH:
        - Si la persona tiene entre 0 y 4 años, es un BEBÉ
        - Si la persona tiene entre 5 y 17 años, es MENOR DE EDAD
        - Si la persona tiene entre 18 y 65 años, es ADULTO
        - Si la persona tiene entre 66 y 120 años, es JUBILADO
        - Si la edad está fuera de rango, es ERROR
    */

    #   Forma 1
    if($edad >= 0 and $edad <= 4) echo "EDAD: $edad - BEBÉ";
    elseif($edad >= 5 and $edad <= 17) echo "EDAD: $edad - MENOR DE EDAD";
    elseif($edad >= 18 and $edad <= 65) echo "EDAD: $edad - ADULTO";
    elseif($edad >= 66 and $edad <= 120) echo "EDAD: $edad - JUBILADO";
    else echo "EDAD: $edad - ERROR";

    #   Forma 2
    $resultado = match(true) {
        $edad >= 0 and $edad <= 4 => "EDAD: $edad - BEBÉ",
        $edad >= 5 and $edad <= 17 => "EDAD: $edad - MENOR DE EDAD",
        $edad >= 18 and $edad <= 65 => "EDAD: $edad - ADULTO",
        $edad >= 66 and $edad <= 120 => "EDAD: $edad - JUBILADO",
        default => "EDAD: $edad - ERROR"
    };

    echo "<h1>$resultado</h1>";
    ?>
</body>
</html>