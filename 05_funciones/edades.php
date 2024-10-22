<?php
    function comprobarEdad($nombre, $edad) {
        if($nombre != '' && $edad != '') {
            echo "<h2>$nombre tiene $edad años</h2>";
        } else {
            echo "<p>Por favor, introduce el nombre y la edad</p>";
        }
    }
?>