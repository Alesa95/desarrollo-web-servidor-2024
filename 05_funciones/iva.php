<?php
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);

    function calcularPVP($precio, $iva) {
        $pvp = match($iva) {
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
        return $pvp;
    }
?>