<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primos rango</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="desde" placeholder="Desde"><br><br>
        <input type="text" name="hasta" placeholder="Hasta"><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $desde = $_POST["desde"];
        $hasta = $_POST["hasta"];
    
        echo "<ul>";
        for($i = $desde; $i <= $hasta; $i++) {
            $esPrimo = TRUE;
            for($j = 2; $j < $i; $j++) {
                if($i % $j == 0) {
                    $esPrimo = FALSE;
                    break;
                }
            }
            if($esPrimo) {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";    
    }
    ?>
</body>
</html>