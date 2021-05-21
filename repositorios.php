<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link href= "style.css" rel= "stylesheet">
        <title>Repositórios do Desenvolvedor</title>
    </head>

<body>
    <?php

    $usuario= $_GET['login'];
        echo 'Repositórios de: '. $usuario .'</br>'; 

    $ch = curl_init(); //inicia a curl
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/". $usuario ."/repos");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/vnd.github.v3+json",
        "Content-Type: text/plain",
        "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 YaBrowser/16.3.0.7146 Yowser/2.5 Safari/537.36"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $repositorios = json_decode(curl_exec($ch)); //exibe organizado
    curl_close($ch); //finaliza a curl

    //var_dump ($repositorios); //exibição primária

    foreach ($repositorios as $repos_user) {
        echo "</br>Nome do Repositório: " . $repos_user->name;
        echo "</br>Endereço no GitHub: " . "<a href= '{$repos_user->html_url}'>" . $repos_user->html_url . "</a>";
        echo "</br>Linguagem: " . $repos_user->language . "</br>";
    };

    ?>
</body>

</html>