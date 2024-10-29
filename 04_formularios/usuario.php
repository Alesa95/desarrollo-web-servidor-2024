<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $tmp_nombre = $_POST["nombre"];
        $tmp_apellidos = $_POST["apellidos"];
        $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];
        $tmp_dni = $_POST["dni"];

        /**
         * 8 digitos y una letra
         */
        if($tmp_dni == '') {
            $err_dni = "El DNI es obligatorio";
        } else {
            $tmp_dni = strtoupper($tmp_dni);
            $patron = "/^[0-9]{8}[A-Z]$/";
            if(!preg_match($patron,$tmp_dni)) {
                $err_dni = "El DNI tiene que tener 8 dígitos y una letra";
            } else {
                $numero_dni = (int)substr($tmp_dni,0,8);
                $letra_dni = substr($tmp_dni,8,1);
                echo "<h1>$numero_dni $letra_dni</h1>";

                $resto_dni = $numero_dni % 23;

                $letra_correcta = match($resto_dni) {
                    0 => "T",
                    1 => "R",
                    2 => "W",
                    3 => "A",
                    4 => "G",
                    5 => "M",
                    6 => "Y",
                    7 => "F",
                    8 => "P",
                    9 => "D",
                    10 => "X",
                    11 => "B",
                    12 => "N",
                    13 => "J",
                    14 => "Z",
                    15 => "S",
                    16 => "Q",
                    17 => "V",
                    18 => "H",
                    19 => "L",
                    20 => "C",
                    21 => "K",
                    22 => "E"
                };
                if($letra_dni != $letra_correcta) {
                    $err_dni = "La letra no coincide";
                } else {
                    $dni = $tmp_dni;
                }
            }
        }

        /**
         * Entre 4 y 12 caracteres
         * Letras a-z (mayus o minus), números y barrabaja
         */
        if($tmp_usuario == '') {
            $err_usuario = "El usuario es obligatorio";
        } else {
            $patron = "/^[a-zA-Z0-9_]{4,12}$/";
            if(!preg_match($patron, $tmp_usuario)) {
                $err_usuario = "El usuario debe tener 4 a 12 caracteres y 
                    contener letras, números o barrabaja";
            } else {
                $usuario = $tmp_usuario;
                echo "<h2>El usuario es $usuario</h2>";
            }
        }

        /**
         * 2-30 caracteres
         * Solo letras (con tildes) y espacio en blanco
         */
        if($tmp_nombre == '') {
            $err_nombre = "El nombre es obligatorio";
        } else {
            if(strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 30) {
                $err_nombre = "El nombre tiene que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras 
                        o espacios en blanco";
                } else {
                    $nombre = $tmp_nombre;
                    echo "<h2>El nombre es $nombre</h2>";
                }
            }
        }

        /**
         * 2-30 caracteres
         * Solo letras (con tildes) y espacio en blanco
         */
        if($tmp_apellidos == '') {
            $err_apellidos = "Los apellidos es obligatorio";
        } else {
            if(strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 30) {
                $err_apellidos = "Los apellidos tienen que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_apellidos)) {
                    $err_apellidos = "Los apellidos solo pueden contener letras 
                        o espacios en blanco";
                } else {
                    $apellidos = $tmp_apellidos;
                    echo "<h2>Los apellidos son $apellidos</h2>";
                }
            }
        }

        /**
         * No se podrá haber nacido hace más de 120 años
         */

        //echo "<h1>$tmp_fecha_nacimiento</h1>";
        //  [0-9]{4}\-[0-9]{2}\-[0-9]{2}
        if($tmp_fecha_nacimiento == '') {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_nacimiento)) {
                $err_fecha_nacimiento = "El formato de la fecha es incorrecto";
            } else {
                $fecha_actual = date("Y-m-d");  //  2024 25 10
                list($anno_actual,$mes_actual,$dia_actual) = 
                    explode('-',$fecha_actual);
                list($anno_nacimiento,$mes_nacimiento,$dia_nacimiento) = 
                    explode('-',$tmp_fecha_nacimiento);
                
                if($anno_actual - $anno_nacimiento <= 120 
                        and $anno_actual - $anno_nacimiento > 0) {
                    //  la persona tiene menos de 120 años  VALIDA
                    $fecha_nacimiento = $tmp_fecha_nacimiento;
                } elseif($anno_actual - $anno_nacimiento > 121) {
                    //  la persona tiene mas de 120 años    NO VALIDA
                    $err_fecha_nacimiento = "No puedes tener más de 120 años";
                    echo "<h1>AAAAA</h1>";
                } elseif($anno_actual - $anno_nacimiento < 0) {
                    $err_fecha_nacimiento = "No puedes tener menos de 0 años";
                    echo "<h1>DDDDD</h1>";
                } elseif($anno_actual - $anno_nacimiento == 121) {
                    if($mes_actual - $mes_nacimiento < 0) {
                        //  la persona aun no ha cumplido 121
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } elseif($mes_actual - $mes_nacimiento > 0) {
                        //  la persona ya ha cumplido 121
                        $err_fecha_nacimiento = "No puedes tener más de 120 años";
                        echo "<h1>BBBBB</h1>";
                    } elseif($mes_actual - $mes_nacimiento == 0) {
                        if($dia_actual - $dia_nacimiento < 0) {
                            //  la persona aun no ha cumplido 121
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        } elseif($dia_actual - $dia_nacimiento >= 0) {
                            //  la persona ya ha cumplido 121
                            $err_fecha_nacimiento = "No puedes tener más de 120 años";
                            echo "<h1>CCCCC</h1>";
                        }
                    }
                } elseif($anno_actual - $anno_nacimiento == 0) {
                    if($mes_actual - $mes_nacimiento < 0) {
                        //  la persona aun no nacido
                        $err_fecha_nacimiento = "La persona aún no ha nacido";
                        echo "<h1>AAAAA</h1>";
                    } elseif($mes_actual - $mes_nacimiento < 0) {
                        //  la persona ya ha nacido
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } elseif($mes_actual - $mes_nacimiento == 0) {
                        if($dia_actual - $dia_nacimiento < 0) {
                            //  la persona ya ha nacido
                            $err_fecha_nacimiento = "La persona aún no ha nacido";
                            echo "<h1>BBBBB</h1>";
                        } elseif($dia_actual - $dia_nacimiento >= 0) {
                            //  la persona ya ha cumplido 121
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        }
                    }
                }

            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="text" name="dni" placeholder="DNI">
        <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>"; ?>
        <br><br>
        <input type="text" name="usuario" placeholder="Usuario">
        <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
        <br><br>
        <input type="text" name="nombre" placeholder="Nombre">
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        <br><br>
        <input type="text" name="apellidos" placeholder="Apellidos">
        <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>"; ?>
        <br><br>
        <label>Fecha de nacimiento</label><br>
        <input type="date" name="fecha_nacimiento" placeholder>
        <?php if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>"; ?>
        <br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>