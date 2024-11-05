<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            if(isset($_POST["consola"])) $tmp_consola = $_POST["consola"];
            else $tmp_consola = "";
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            if($tmp_titulo == '') {
                $err_titulo = "El título es obligatorio";
            }

            if($tmp_consola == '') {
                $err_consola = "La consola es obligatoria";
            }

            if($tmp_fecha_lanzamiento == '') {
                $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
            }
        }
        ?>
        <h1>Formulario de videojuegos</h1>
        <form class="col-4" action = "" method="post">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Consola</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps4">
                    <label class="form-check-label">Playstation 4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps5">
                    <label class="form-check-label">Playstation 5</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="switch">
                    <label class="form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="xboxsx">
                    <label class="form-check-label">XBox Series X/S</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="pc">
                    <label class="form-check-label">PC</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de lanzamiento</label>
                <input class="form-control" name="fecha_lanzamiento" type="date">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>