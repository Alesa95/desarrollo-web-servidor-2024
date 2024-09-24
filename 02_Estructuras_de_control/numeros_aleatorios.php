<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(1,3);

    #   Forma 1
    /*
    switch($n) {
        case 1: 
            echo "<p>El número aleatorio es $n</p>";
            break;
        case 2: 
            echo "<p>El número aleatorio es $n</p>";
            break;
        default: 
            echo "<p>El número aleatorio es $n</p>";
            break;
    }
    */

    #   Forma 2
    $n = rand(1,3);
    $resultado = match($n) {
        1 => "<p>El número aleatorio es 1</p>",
        2 => "<p>El número aleatorio es 2</p>",
        3 => "<p>El número aleatorio es 3</p>"
    };

    echo $resultado;


    /*
    COMPROBRAR CON UN SWITCH SI UN NÚMERO ALEATORIO DEL 1 AL 10 ES PAR O IMPAR
    */

    $n = rand(1,10);
    $resto = $n % 2;

    #   Forma 1
    /*
    switch($resto) {
        case 0: 
            echo "<p>El número $n es par</p>";
            break;
        case 1:
            echo "<p>El número $n es impar</p>";
            break;
    }
    */

    #   Forma 2
    $n = rand(1,10);
    $resto = $n % 2;

    $resultado = match($resto) {
        0 => "<p>El número $n es par</p>",
        1 => "<p>El número $n es impar</p>"
    };

    echo $resultado;
    ?>
</body>
</html>