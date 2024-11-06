<?php
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);

    function calcularPVP(int|float $precio, string $iva) : float {
        $pvp = match($iva) {
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
        return $pvp;
    }

    function example(int $entrada) : int|bool {
        if($entrada >= 0) {
            return $entrada;
        } else {
            return false;
        }
    }
?>