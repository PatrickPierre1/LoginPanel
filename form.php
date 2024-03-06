<?php
    require "config.php";
    $login = $_POST["login"] ?? NULL;
    $senha = $_POST["password"] ?? NULL;

    $loginNaoEhVazio = !empty($login);
    $senhaNaoEhVazia = !empty($senha);

    if ($loginNaoEhVazio && $senhaNaoEhVazia) {
        
        //buscar no banco de dados
    try {
        $sql = "SELECT * FROM `login` WHERE `nome` = '$login' AND `senha` = $senha";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);        

        if($dados) {

            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["senha"] = $senha;
            
            echo "<script>window.location.href='panel.php'</script>";

        }else {
            echo "<script>alert('Usuario ou senha incorretos! Tente novamente.')</script>";
            $_SESSION["login"] = NULL;
            $_SESSION["senha"] = NULL;
            
        }
    }catch (PDOException $e) {
        echo "<script>alert('Usuario ou senha incorretos! Tente novamente.')</script>";
    }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form method="POST" class="form" action="form.php">
       <p class="form-title">Faça seu login</p>
        <div class="input-container">
          <input placeholder="Digite o usuário" type="text" name="login">
          <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span>
      </div>
      <div class="input-container">
          <input placeholder="Digite a senha" type="password" name="password">

          <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span>
        </div>
         <button class="submit" type="submit">
        Enviar
      </button>
   </form>
</body>
</html>