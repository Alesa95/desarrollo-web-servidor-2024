<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperaturas</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="temperatura" placeholder="temperatura"><br><br>
        <label>Unidad inicial: </label>
        <select name="unidad_inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <label>Unidad final: </label>
        <select name="unidad_final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <input type="submit" value="Convertir">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperatura = $_POST["temperatura"];
        $unidad_inicial = $_POST["unidad_inicial"];
        $unidad_final = $_POST["unidad_final"];

        $temperatura_final = $temperatura;

        if($unidad_inicial == "C") {
            if($unidad_final == "K") {
                $temperatura_final = $temperatura + 273.15;
            } elseif($unidad_final == "F") {
                $temperatura_final = ($temperatura * 9/5) + 32;
            }
        } elseif($unidad_inicial == "K") {
            
        }
    }
    ?>
</body>
</html>