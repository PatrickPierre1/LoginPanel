<?php
    require "config.php";
    session_start();

    $login = $_SESSION["login"] ?? NULL;
    $senha = $_SESSION["senha"] ?? NULL;

    if(!isset($_SESSION["login"]) || !isset($_SESSION["senha"]))
    {
    // Usuário não logado! Redireciona para a página de login
        echo "<script>window.location.href='form.php'</script>";
        exit;
    }

    //TODO Escrever validação, caso venha vazia redirecionar o usuário para o form
    //TODO Escrever uma mensagem de erro na sessão para apresentar no formulário
    //alexmpereiradev@gmail.com
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    <h1>login: <?=$login?></h1>
    <h2>Senha: <?=$senha?></h2>
</body>
</html>