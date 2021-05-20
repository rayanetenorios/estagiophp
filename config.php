<?php
    $url = "https://developer.github.com/v3/";
    $ch = curl_init ($url);
    $resultado = json_decode (curl_exec($ch));
?>