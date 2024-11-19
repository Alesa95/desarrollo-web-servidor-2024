<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $titulo = $_POST["titulo"];
                $nombre_estudio = $_POST["nombre_estudio"];
                $anno_estreno = $_POST["anno_estreno"];
                $num_temporadas = $_POST["num_temporadas"];
                // $_FILES, QUE ES UN ARRAY DOBLE!!!

                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen");

                $sql = "INSERT INTO animes 
                    (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                    VALUES
                    ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, 
                        './imagenes/$nombre_imagen')
                ";

                $_conexion -> query($sql);

                /**
                 * INSERT INTO animes
                 *  (titulo, nombre_estudio, anno_estreno, num_temporadas)
                 * VALUES
                 *  ('Doraemon', 'Toei Animation', 1979, 1);
                 * 
                 */

                
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" name="titulo" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <input class="form-control" name="nombre_estudio" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" name="anno_estreno" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Número temporadas</label>
                <input class="form-control" name="num_temporadas" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>