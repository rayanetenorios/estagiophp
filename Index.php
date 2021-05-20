<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Desenvolvedores GitHub</title>
    </head>

    <body>
        <?php

        $url = "https://developer.github.com/v3/";
        $ch = curl_init ($url);
        $resultado = json_decode (curl_exec($ch));
        

        ?>

