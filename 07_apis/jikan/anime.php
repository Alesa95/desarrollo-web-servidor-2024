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
    if(!isset($_GET["id"])) {
        header("location: top_anime.php"); 
    }
    $id = $_GET["id"];
    $url = "https://api.jikan.moe/v4/anime/$id/full";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $anime = $datos["data"];
    ?>
    <h1>
        <?php echo $anime["title"] ?>
    </h1>

    <img width="200px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">

    <h2>Sinopsis</h2>
    <p>
        <?php echo $anime["synopsis"] ?>
    </p>

    <h2>Tráiler</h2>
    <iframe src="<?php echo $anime["trailer"]["embed_url"] ?>"></iframe>
</body>
</html>