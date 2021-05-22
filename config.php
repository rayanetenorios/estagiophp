<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link href= "style.css" rel= "stylesheet">
        <title>Resultado da Pesquisa</title>
    </head>

<body>
    <?php

    $pesquisa= $_POST['pesquisa'];
        echo '<h1>Você pesquisou por: '.$pesquisa.'</h1></br>';

    $ch = curl_init(); //inicia a curl
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/search/users?q=".$pesquisa);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github.v3+json",
        "Content-Type: text/plain",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = json_decode(curl_exec($ch)); //exibe organizado
    curl_close($ch); //finaliza a curl

    //var_dump ($response); //exibição primária
    foreach ($response->items as $usuario) {
        echo "</br><h4>Nome: <a href= 'repositorios.php?login={$usuario->login}'>" . $usuario->login . "</a>";
        echo "</br>GitHub: " . $usuario->html_url . "</h4></br>";
    };

    ?>
</body>

</html>