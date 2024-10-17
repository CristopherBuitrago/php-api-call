<?php

const API_URL = "https://www.whenisthenextmcufilm.com/api";

# iniciar una nueva instancia de curl
$ch = curl_init(API_URL);

# recibir resultado y no imprimirlo
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# ejecutar la peticion y guardar el resultado
$result = curl_exec($ch);

# transformar el resultado en json
$data = json_decode($result, true);

# cerrar el curl
curl_close($ch);

?>

<head>
    <title>La proxima pelicula de Marvel</title>
    <meta charset="UTF-8">
    <meta name="description" content="Next marvel movie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <section>
        <img src="<?= $data['poster_url']; ?>" 
        width="300px"
        alt="poster de <?= $data['title'] ?>"
        style="border-radius: 10px">
    </section>

    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h2>
        <p>Fecha de estreno <?= $data["release_date"]; ?></p>
        <p>La siguiente peli es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    *{
        margin: 0;
        padding: 0;
        ;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;

    }
</style>