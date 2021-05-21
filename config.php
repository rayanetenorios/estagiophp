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
        echo 'Resultado da Pesquisa: '.$pesquisa.'</br>';

    $ch = curl_init(); //inicia a curl
    //parâmetros
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/search/users?q=".$pesquisa);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github.v3+json",
        "Content-Type: text/plain",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    //$response = curl_exec($ch);
    $response = json_decode(curl_exec($ch));
    curl_close($ch); //finaliza a curl

    //var_dump ($response); //exibição

    foreach ($response->items as $usuario) {
        echo "</br>Nome: " . $usuario->login;
        echo "</br>GitHub: " . $usuario->html_url . "</br>";
    };



/*
    $pesquisa= $_POST['pesquisa'];
        echo 'Resultado da Pesquisa: '.$pesquisa.'</br>';

    $ch = curl_init();
    curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/search/users?q=".$pesquisa,
    CURLOPT_HTTPHEADER => [
        "Accept: application/vnd.github.v3+json",
        "Content-Type: text/plain",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    ]);

    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    var_dump ($response);


    //header('Location: https://api.github.com/search/users?q='.$pesquisa);
    //exit;

    // Cria o cURL
  /*  $url= header('Location: https://api.github.com/search/users?q='.$pesquisa);
    $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
    $resultado= json_decode(curl_exec($ch));
    curl_close($ch); // Fecha a requisição e limpa a memória

    var_dump ($resultado);
    
    // UM MONTE DE CÓDIGO INÚTIL LOGO ABAIXO //

    /*const AUTH_CLIENT_ID = 'client_id_header';
    const AUTH_ACCESS_TOKEN = 'access_token_header';
    const AUTH_JWT = 'jwt';

    //$host  = $_SERVER['https://api.github.com/search/users?q='];
    //$uri   = rtrim(dirname($_SERVER[$pesquisa]), '/\\');
    //$extra = 'mypage.php';
    
    /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/search/users?q='.$pesquisa);
    
    $resultado= curl_exec($ch);

    print_r(curl_exec($ch));exit;*/

    /*Armazena o texto da pesqusia
    $pesquisa= $_POST['pesquisa'];
        echo 'Resultado da Pesquisa: '.$pesquisa.'</br>';

    // Cria o cURL
    $url= 'https://api.github.com/search/users?q='.$pesquisa;
    $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
    $resultado= json_decode(curl_exec($ch));
    //curl_close($ch); // Fecha a requisição e limpa a memória

    var_dump ($resultado);*/
?>

</body>

</html>