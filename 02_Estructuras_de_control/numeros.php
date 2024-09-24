<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    $numero = -3;

    /*
    if($numero > 0) {
        echo "<p>El número es positivo</p>";
    }

    if($numero > 0) echo "<p>El número es positivo</p>";

    if($numero > 0):
        echo "<p>El número es positivo</p>";
    endif;
    */

    /*
    if($numero > 0) {
        echo "<p>1 El número es positivo</p>";
    } else {
        echo "<p>1 El número no es positivo</p>";
    }

    if($numero > 0) echo "<p> 2El número es positivo</p>";
    else echo "<p>2 El número no es positivo</p>";

    if($numero > 0):
        echo "<p>3 El número es positivo</p>";
    else:
        echo "<p>3 El número no es positivo</p>";
    endif;
    */

    /*
    $numero = 0;

    if($numero > 0) {
        echo "<p>1 El número es positivo</p>";
    } elseif($numero == 0) {
        echo "<p>1 El número es cero</p>";
    } else {
        echo "<p>1 El número no es positivo</p>";
    }

    if($numero > 0) echo "<p> 2El número es positivo</p>";
    elseif($numero == 0) echo "<p>El número es cero</p>";
    else echo "<p>2 El número no es positivo</p>";

    if($numero > 0):
        echo "<p>3 El número es positivo</p>";
    elseif($numero == 0): 
        echo "<p>3 El número no es positivo</p>";
    else:
        echo "<p>3 El número no es positivo</p>";
    endif;
    */

    $numero = 3;

    #   Rangos: [-10,0),[0,10],(10,20]

    /*
    if($numero >= -10 && $numero < 0) {
        echo "El número $numero está en el rango [-10,0)";
    } elseif($numero >= 0 and $numero <= 10) {
        echo "El número $numero está en el rango [0,10]";
    } elseif($numero > 10 and $numero <= 20) {
        echo "El número $numero está en el rango (10,20]";
    } else {
        echo "El número no está en ninguno de los rangos";
    }

    if($numero >= -10 && $numero < 0):
        echo "El número $numero está en el rango [-10,0)";
    elseif($numero >= 0 and $numero <= 10):
        echo "El número $numero está en el rango [0,10]";
    elseif($numero > 10 and $numero <= 20):
        echo "El número $numero está en el rango (10,20]";
    else:
        echo "El número no está en ninguno de los rangos";
    endif;
    */

    /*
    $numero1 = 3
    $numero2 = 4;

    ESCRIBIR UN IF QUE DECIDA CUAL DE LOS NUMEROS ES MAYOR, O SI SON IGUALES

    HACERLO DE DOS FORMAS DIFERENTES
    */

    /*
    $numero1 = 3;
    $numero2 = 4;

    if($numero1 > $numero2) {
        echo "<p>$numero1 es mayor que $numero2</p>";
    } elseif($numero2 > $numero1) {
        echo "<p>$numero2 es mayor que $numero1</p>"; 
    } else {
        echo "<p>$numero1 y $numero2 son iguales</p>";
    }

    if($numero1 > $numero2)  echo "<p>$numero1 es mayor que $numero2</p>";
    elseif($numero2 > $numero1)  echo "<p>$numero2 es mayor que $numero1</p>"; 
    else  echo "<p>$numero1 y $numero2 son iguales</p>";
    

    if($numero1 > $numero2):
        echo "<p>$numero1 es mayor que $numero2</p>";
    elseif($numero2 > $numero1):
        echo "<p>$numero2 es mayor que $numero1</p>"; 
    else:
        echo "<p>$numero1 y $numero2 son iguales</p>";
    endif;
    */

    #   Rangos: [-10,0),[0,10],(10,20]

    $numero = rand(-10,20);
    $resultado = match(true) {
        $numero >= -10 && $numero < 0 => "El número $numero está en el rango [-10,0)",
        $numero >= 0 && $numero <= 10 => "El número $numero está en el rango [0,10]",
        $numero > 10 && $numero <= 20 => "El número $numero está en el rango (10,20]"
    };

    echo $resultado;
    ?>
</body>
</html>