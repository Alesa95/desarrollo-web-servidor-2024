<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        $tmp_peso = $_POST["peso"];
        
        $tmp_genero = $_POST["genero"] ?? ''; // operador coalesce
        /*if(isset($_POST["genero"])) $tmp_genero = $_POST["genero"];
        else $tmp_genero = "";*/

        $tmp_tipo = $_POST["tipo"] ?? '';
        $tmp_fecha_captura = $_POST["fecha_captura"];
        $tmp_descripcion = $_POST["descripcion"];

        if($tmp_nombre == '') {
            $err_nombre = "El nombre es obligatorio";
        } else {
            if(strlen($tmp_nombre) > 30 || strlen($tmp_nombre) < 3 ) {
                $err_nombre = "El nombre debe tener entre 3 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener 
                        letras (con o sin tilde) y ñ";
                } else {
                    $nombre = $tmp_nombre;
                }
            }
        }

        if($tmp_peso == '') {
            $err_peso = "El peso es obligatorio";
        } else {
            if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT) === FALSE) {
                $err_peso = "El peso debe ser un número";
            } else {
                if($tmp_peso < 0.1 || $tmp_peso > 999.99) {
                    $err_peso = "El peso debe estar entre 0.1 y 999.99";
                } else {
                    $peso = $tmp_peso;
                }
            }
        }

        if($tmp_genero == '') {
            $genero = "Desconocido";
        } else {
            $generos_validos = ["hembra","macho"];
            if(!in_array($tmp_genero, $generos_validos)) {
                $err_genero = "Elige un género válido";
            } else {
                $genero = $tmp_genero;
            }
        }

        if($tmp_tipo == '') {
            $err_tipo = "El tipo es obligatorio";
        } else {
            $tipos_validos = ["Agua","Fuego","Planta","Eléctrico","Volador"];
            if(!in_array($tmp_tipo, $tipos_validos)) {
                $err_tipo = "Elige un tipo válido";
            } else {
                $tipo = $tmp_tipo;
            }
        }

        if($tmp_fecha_captura == '') {
            $err_fecha_captura = "La fecha de captura es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_captura)) {
                $err_fecha_nacimiento = "El formato de la fecha es incorrecto";
            } else {
                $fecha_actual = date("Y-m-d");  //  2024 25 10
                list($anno_actual,$mes_actual,$dia_actual) = 
                    explode('-',$fecha_actual);
                list($anno_captura,$mes_captura,$dia_captura) = 
                    explode('-',$tmp_fecha_captura);
                
                if($anno_actual - $anno_captura < 30 
                        and $anno_actual - $anno_captura > 0) {
                    $fecha_captura = $tmp_fecha_captura;
                } elseif($anno_actual - $anno_captura > 30) {
                    $err_fecha_captura = "No puedes capturar un pokemon hace
                     más de 30 años";
                } elseif($anno_actual - $anno_captura < 0) {
                    $err_fecha_captura = "No puedes capturar un pokemon en el futuro";
                } elseif($anno_actual - $anno_captura == 31) {
                    if($mes_actual - $mes_captura < 0) {
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } elseif($mes_actual - $mes_captura > 0) {
                        $err_fecha_captura = "No puedes capturar un pokemon en el futuro";
                    } elseif($mes_actual - $mes_captura == 0) {
                        if($dia_actual - $dia_captura < 0) {
                            $fecha_captura = $tmp_captura;
                        } elseif($dia_captura - $dia_captura >= 0) {
                            $err_fecha_captura = "No puedes capturar un pokemon hace
                     más de 30 años";
                        }
                    }
                } elseif($anno_actual - $anno_captura == 0) {
                    if($mes_actual - $mes_captura < 0) {
                        $err_fecha_captura = "No puedes capturar un pokemon en el futuro";
                    } elseif($mes_actual - $mes_captura < 0) {
                        $fecha_captura = $tmp_fecha_captura;
                    } elseif($mes_actual - $mes_captura == 0) {
                        if($dia_actual - $dia_captura < 0) {
                            $err_fecha_captura = "No puedes capturar un pokemon en el futuro";
                        } elseif($dia_actual - $dia_captura >= 0) {
                            $fecha_captura = $tmp_fecha_captura;
                        }
                    }
                }

            }
        }

        if(strlen($tmp_descripcion) > 200) {
            $err_descripcion = "La descripción no puede tener más de 200 caracteres";
        } else {
            $patron = "/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
            if(!preg_match($patron, $tmp_descripcion)) {
                $err_descripcion = "La descripción solo puede contener 
                    letrasy espacios en blanco";
            } else {
                $descripcion = $tmp_descripcion;
            }
        }


    }
    ?>
    <form action="" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre">
        <?php if(isset($err_nombre)) echo $err_nombre ?>
        <br><br>
        <label>Peso</label>
        <input type="text" name="peso">
        <?php if(isset($err_peso)) echo $err_peso ?>
        <br><br>
        <label>Género</label>
        <input type="radio" name="genero" value="hembra">Hembra
        <input type="radio" name="genero" value="macho">Macho
        <?php if(isset($err_genero)) echo $err_genero ?>
        <br><br>
        <label>Tipo</label>
        <select name="tipo">
            <option selected disabled hidden>--- Elige el tipo ---</option>
            <option value="Agua">Agua</option>
            <option value="Fuego">Fuego</option>
            <option value="Volador">Volador</option>
            <option value="Planta">Planta</option>
            <option value="Eléctrico">Eléctrico</option>
        </select>
        <?php if(isset($err_tipo)) echo $err_tipo ?>
        <br><br>
        <label>Fecha de captura</label>
        <input type="date" name="fecha_captura">
        <?php if(isset($err_fecha_captura)) echo $err_fecha_captura ?>
        <br><br>
        <textarea name="descripcion"></textarea>
        <?php if(isset($err_descripcion)) echo $err_descripcion ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>